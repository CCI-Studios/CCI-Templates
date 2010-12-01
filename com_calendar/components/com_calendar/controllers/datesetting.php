<?php
defined('KOOWA') or die;

class ComCalendarControllerDatesetting extends ComDefaultControllerDefault {
	
	public function _actionSavesettings(KCommandContext $context) {
		$pending_dates = KRequest::get('session.com.calendar.days.selected', 'raw');
		if (count($pending_dates) === 0)
			return;
			
		$post = $context->data;
		$post->append(array(
			'date'	=> null
		));

		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');

		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('ids', $pending)
					->set('status', 0)
					->sort('date')
					->getList();
		$day = $days->current();
		
		$day->file_upload = $post->file_upload;
		$day->title 		= $post->title;
		$day->description	= $post->description;
		$day->dedication	= $post->dedication;
		$day->link          = $post->link;
		$day->status		= 1; // pending
		$day->locked_at		= date('Y-m-d H:i:s');
		$day->save();
		
		
		if (count($days) > 1) {
			$this->setRedirect('view=datesetting');
		} else {
			if (KFactory::get('lib.koowa.user')->gid >= 19) {
				$this->setRedirect('view=method');
			} else {
				$this->setRedirect('view=review');
			}
			
			$day->user_id = $user_id;
		}
		
		return $day;
	}
}