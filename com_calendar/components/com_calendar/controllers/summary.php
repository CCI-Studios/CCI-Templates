<?php
defined('KOOWA') or die;

class ComCalendarControllerSummary extends ComDefaultControllerDefault {
	
	public function _actionTrash(KCommandContext $context) {
		$post = $context->data;
		$date = $post->date;
		
		$day = KFactory::tmp('site::com.calendar.model.days')
				->set('date', $date)
				->getList()->current();
		
		$id = $day->id;
		
		$ids = KRequest::get('session.com.calendar.days.selected', 'raw', array());
		$index = array_search($id, $ids);		
		
		if ($index !== false) {
			$day->delete();
		}
		unset($ids[$index]);
	
		KRequest::set('session.com.calendar.days.selected', null);
		KRequest::set('session.com.calendar.days.selected', $ids);
		
		$this->setRedirect('index.php?option=com_calendar&view=summary');
	}
	
}