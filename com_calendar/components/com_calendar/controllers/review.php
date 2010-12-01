<?php
defined('KOOWA') or die;
jimport('joomla.user.helper');

class ComCalendarControllerReview extends ComDefaultControllerDefault {
	
	public function _actionCheckoutcash(KCommandContext $context) {
		$post = $context->data;
		
		$user = KFactory::get('lib.koowa.user');
		$new_user = false;

		if ($user->guest == 1) {
			$db =& JFactory::getDBO();
			$query = 'select id from #__users where email=\''.$post->email.'\' limit 1;';
			$db->setQuery($query);
			$result = $db->loadResult();

			if ($result) {
				$user = new Juser();
				$user->load($result);
			
			} else {
				$password = JUserHelper::genRandomPassword(8);
				$new_user = true;
			
				$user = $this->RegisterNewUser($post->email, 
									$password, 
									$post->firstname.' '.$post->lastname,
									$post->email);
			}
		}	
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('ids', $pending)
					->set('status', 1)
					->sort('date')
					->getList();
					
		$this->setRedirect('view=thankyou');

		foreach($days as $day) {
			$day->user_id = $user->id;
			$day->status = 2;
			if (!$day->save()) {
				print_r($day);
				die;
			}
		}

		KRequest::set('session.com.calendar.days.selected', null);

		if ($new_user) {
			$this->newUserEmail($user->email, $password, $days);
		} else {
			$this->oldUserEmail($user->email, $days);
		}
	}
	
	public function _actionCheckout(KCommandContext $context) {
		$post = $context->data;
		
		$user = KFactory::get('lib.koowa.user');
		$new_user = false;

		if ($user->guest == 1) {
			$db =& JFactory::getDBO();
			$query = 'select id from #__users where email=\''.$post->email.'\' limit 1;';
			$db->setQuery($query);
			$result = $db->loadResult();

			if ($result) {
				$user = new Juser();
				$user->load($result);
			
			} else {
				$password = JUserHelper::genRandomPassword(8);
				$new_user = true;
			
				$user = $this->RegisterNewUser($post->email, 
									$password, 
									$post->firstname.' '.$post->lastname,
									$post->email);
			}
		}	
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('ids', $pending)
					->set('status', 1)
					->sort('date')
					->getList();				
		
		$ids = array();
		foreach($days as $day) $ids[] = $day->id;
		$ids = implode(', ', $ids);
		
		// check stuff
		if (strlen($post->exp2) == 2) {
			$post->exp2 = '20'.$post->exp2;
		}
		
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
				$day->user_id = $user->id;
				$day->status = 2;
				if (!$day->save()) {
					print_r($day);
					die;
				}
			}
			
			KRequest::set('session.com.calendar.days.selected', null);
			
			if ($new_user) {
				$this->newUserEmail($user->email, $password, $days);
			} else {
				$this->oldUserEmail($user->email, $days);
			}
		} else {
			$this->setRedirect('view=error&message='.$r['L_LONGMESSAGE0']);
			$transaction->status = 2;
		}
		$transaction->save();
	}
	
	//------------------------------------------------------------------------------
	function RegisterNewUser($username, $password, $name, $email) {
	//------------------------------------------------------------------------------
	   // Check that username is not greater than 150 characters
	   // Check that password is not greater than 100 characters
	   $authorize =& JFactory::getACL();
	   $user = new JUser(); //clone(JFactory::getUser());

	   $user->set('username', $username);
	   $user->set('password', $password);
	   $user->set('name', $name);
	   $user->set('email', $email);

	   // password encryption
	   $salt  = JUserHelper::genRandomPassword(32);
	   $crypt = JUserHelper::getCryptedPassword($user->password, $salt);
	   $user->password = "$crypt:$salt";

	   // user group/type
	   $user->set('id', 0);
	   $user->set('usertype', 'Registered');
	   $user->set('gid', $authorize->get_group_id( '', 'Registered', 'ARO' ));

	   $date =& JFactory::getDate();
	   $user->set('registerDate', $date->toMySQL());
	   $user->save(); // true on success, false otherwise
	
		return $user;
	}
	
	protected function newUserEmail($email, $password, $days) {
		$adminEmail = "noreply@whatsyourday.com";
		$adminName	= "What's Your Day";
		
		$subject = "Thanks for donating!";
		$message  = "Thank you for supporting Big Sisters.\n";
		$message .= "You can update your settings at http://www.whatsyourday.com/log-in.html?email=$email ";
		$message .= "using the password $password.\n";
		$message .= "\n";
		
		if (count($days) > 1) {
			$message .= "Your days are:\n";
		} else {
			$message .= "Your day is:\n";
		}
		
		foreach($days as $day) {
			$message .= date('F d, Y', strtotime($day->date))."\n";
		}
		$message .= "\n";
		$message .= "Total: $".(count($days)*100);
		

		JUtility::sendMail( $adminEmail, $adminName, $email, $subject, $message );
	}
	
	protected function oldUserEmail($email, $days) {
		$adminEmail = "noreply@whatsyourday.com";
		$adminName	= "What's Your Day";
		
		$subject = "Thanks for donating!";
		$message  = "Thank you for supporting Big Sisters.\n";
		$message .= "You can update your settings at http://www.whatsyourday.com/log-in.html?email=$email.\n";
		$message .= "\n";
		
		if (count($days) > 1) {
			$message .= "Your days are:\n";
		} else {
			$message .= "Your day is:\n";
		}
		
		foreach($days as $day) {
			$message .= date('F d, Y', strtotime($day->date))."\n";
		}
		$message .= "\n";
		$message .= "Total: $".(count($days)*100);

		JUtility::sendMail( $adminEmail, $adminName, $email, $subject, $message );
	}
}