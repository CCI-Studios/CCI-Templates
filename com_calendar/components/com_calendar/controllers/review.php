<?php
defined('KOOWA') or die;

class ComCalendarControllerReview extends ComDefaultControllerDefault {
	
	public function _actionCheckout(KCommandContext $context) {
		$post = $context->data;
		$user = KFactory::get('lib.koowa.user');
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('user_id', $user->id)
					->set('status', 1)
					->getList();
		
		$ids = array();
		foreach($days as $day) $ids[] = $day->id;
		$ids = implode(', ', $ids);
		
		$transaction = KFactory::tmp('site::com.calendar.database.row.transactions');
		$transaction->user_id	= $user->id;
		$transaction->date		= date('Y-m-d H:i:s');
		$transaction->status	= 0; // pending
		$transaction->ids		= $ids;
		$transaction->save();
		
		$data = array(
			'VERSION' 		=> '56.0',
			'SIGNATURE'		=> $params->get('paypal_sig'),
			'USER'			=> $params->get('paypal_user'),
			'PWD'			=> $params->get('paypal_pass'),
			
			'METHOD'		=> 'DoDirectPayment',
			'CURRENCYCODE'	=> 'CAD',
			'PAYMENTACTION'	=> 'Sale',
			'IPADDRESS'		=> $_SERVER['REMOTE_ADDR'], //KRequest::get('server.remote_addr', 'raw'),
			'AMT'			=> sprintf("%.2f", count($days)*100),
			'CREDITCARDTYPE'=> $post->cardtype,
			'ACCT'			=> $post->acct,
			'EXPDATE'		=> $post->exp1.$post->exp2,
			'CVV2'			=> $post->csc,
			
			'FIRSTNAME'		=> $post->firstname,
			'LASTNAME'		=> $post->lastname,
			'STREET1'		=> $post->street1,
			'STREET2'		=> $post->street2,
			'CITY'			=> $post->city,
			'STATE'			=> $post->state,
			'ZIP'			=> $post->province,
			'COUNTRYCODE'	=> 'CA',
			
			'ORDERID'		=> $transaction->id,
		);
		
		
		if ($params->get('paypal_sandbox') === '1') {
			$address = 'https://api-3t.sandbox.paypal.com/nvp';
		} else {
			$address = 'https://api-3t.paypal.com/nvp'; // TODO Check this
		}
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $address);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$r = array();
		parse_str($response, $r);
		
		$transaction->timestamp = $r['TIMESTAMP'];
		$transaction->correlationid = $r['CORRELATIONID'];
		$transaction->ack = $r['ACK'];
		$transaction->version = $r['VERSION'];
		$transaction->build = $r['BUILD'];
		$transaction->amt = $r['AMT'];
		$transaction->currencycode = $r['CURRENCYCODE'];
		$transaction->avscode = $r['AVSCODE'];
		$transaction->cvv2 = $r['CVV2MATCH'];
		$transaction->transactionid = $r['TRANSACTIONID'];
		
		if ($transaction->ack === 'Success') {
			$this->setRedirect('view=thankyou');
			$transaction->status = 1;
			
			foreach($days as $day) {
				$day->status = 2;
				$day->save();
			}
			
		} else {
			$this->setRedirect('view=error', $r['L_LONGMESSAGE0']);
			$transaction->status = 2;
			
			foreach($days as $day) {
				$day->delete();
			}
		}
		
		KRequest::set('session.com.calendar.days.selected', null);
		
		$transaction->save();
	}
}