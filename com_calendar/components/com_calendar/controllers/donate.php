<?php
defined('KOOWA') or die;

class ComCalendarControllerDonate extends ComDefaultControllerDefault
{	
	public function _actionPick_day(KCommandContext $context)
	{
		$post = $context->data;
		$post->append(array(
			'selected_date'	=> null
		));
		
		if ($post->submit) {
			$this->setRedirect('index.php?option=com_calendar&view=summary');
			return;
		}
		
		if ($post->trash) {
			$this->trash($post->trash);
			$this->setRedirect('index.php?option=com_calendar&view=donate');
			return;
		}

		$date = $post->selected_date;
		
		$model = KFactory::tmp('site::com.calendar.model.days')
					->set('date', $date);

		// if user selects existing date
		if (count($model->getlist()) > 0) {
			$this->setRedirect('index.php?option=com_calendar&view=donate');
			return;
		}
		
		
		// create new row
		$new_date = KFactory::tmp('site::com.calendar.database.row.day');
		$new_date->user_id		= 0;
		$new_date->locked_at	= date('Y-m-d H:i:s');
		$new_date->date			= $date;
		$new_date->status		= 0; // locked
		
		if (!$new_date->save()) {
			$this->setRedirect('index.php?option=com_calendar&view=donate');
		}
		
		// add to session
		$dates = KRequest::get('session.com.calendar.days.selected', 'raw', array());
		$dates[] = $new_date->id;
		KRequest::set('session.com.calendar.days.selected', null);
		KRequest::set('session.com.calendar.days.selected', $dates);
		
		$this->setRedirect('index.php?option=com_calendar&view=donate');
	}
	
	protected function trash($date) {
		$day = KFactory::tmp('site::com.calendar.model.days')
				->set('date', $date)
				->getList()->current();
		
		$id = $day->id;
		
		$ids = KRequest::get('session.com.calendar.days.selected', 'raw', array());
		$index = array_search($id, $ids);
		
		if ($index) {
			$day->delete();
		}
		unset($ids[$index]);
	}
}