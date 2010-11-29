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

		$day = KFactory::tmp('site::com.calendar.model.days')
				->set('id', $pending_dates[0])
				->getList()->current();
		
		$day->file_upload = $post->file_upload;
		$day->title 		= $post->title;
		$day->description	= $post->description;
		$day->dedication	= $post->dedication;
		$day->link          = $post->link;
		$day->status		= 1; // pending
		$day->locked_at		= date('Y-m-d H:i:s');
		
		$day->save();

		$pending_dates =  array_slice($pending_dates, 1);
		KRequest::set('session.com.calendar.days.selected', null);
		KRequest::set('session.com.calendar.days.selected', $pending_dates);
		
		if (count($pending_dates) > 0) {
			$this->setRedirect('view=datesetting');
		} else {
			$this->setRedirect('view=review');
		}
		return $day;
	}
}