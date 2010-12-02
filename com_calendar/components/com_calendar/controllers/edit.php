<?php
defined('KOOWA') or die;

class ComCalendarControllerEdit extends ComDefaultControllerDefault {
	
	protected function _actionEdit(KCommandContext $context) {
		$post = $context->data;
		$day = KFactory::get('site::com.calendar.model.days')
					->set('id', $post->id)
					->getList()
					->current();
					
		if ($day->user_id === KFactory::get('lib.koowa.user')->id) {
			$day->setData(KConfig::toData($post));
			if ($day->save()) {
				$this->setRedirect('view=user');
			}
		}

		return $day;
	}
	
}