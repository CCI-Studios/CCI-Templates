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
		$date = $post->selected_date;

		if ($date === null) {
			$this->setRedirect('view=donate', 'Please select a day', 'error');
			return;
		}
		
		$model = KFactory::tmp('site::com.calendar.model.days')
					->set('date', $date);

		// if user selects existing date
		if (count($model->getlist()) > 0) {
			$this->setRedirect('view=donate', 'That date is already taken.', 'notice');
			return;
		}
		
		
		// create new row
		$new_date = KFactory::tmp('site::com.calendar.database.row.day');
		$new_date->user_id		= KFactory::get('lib.koowa.user')->id;
		$new_date->locked_at	= date('Y-m-d H:i:s');
		$new_date->date			= $date;
		$new_date->status		= 0; // locked
		
		if (!$new_date->save()) {
			$this->setRedirect('view=donate', JText::_('Failed to add date to your cart', 'error'));
		}
		
		// add to session
		$dates = KRequest::get('session.com.calendar.days.selected', 'raw', array());
		$dates[] = $new_date->id;
		KRequest::set('session.com.calendar.days.selected', $dates);
		
		if ($post->submit === 'Continue') {
			$this->setRedirect('view=datesetting');
		} else { // selects date and wants more
			$this->setRedirect('view=donate', JText::_('Date added to your cart'));
		}
	}
}