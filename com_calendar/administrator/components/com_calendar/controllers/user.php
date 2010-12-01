<?php
defined('KOOWA') or die;

class ComCalendarControllerUser extends ComDefaultControllerDefault {

	public function _actionSave(KCommandContext $context) {
		$post = $context->data;
		
		if (!$this->RegisterNewUser($post->email, 'asdf', $post->name, $post->email)) {
			$this->setMessage('Failure to create user.', 'error');
		}
	}
	
	//------------------------------------------------------------------------------
	function RegisterNewUser($username, $password, $name, $email) {
	//------------------------------------------------------------------------------
	   // Check that username is not greater than 150 characters
	   // Check that password is not greater than 100 characters

	   jimport('joomla.user.helper');
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
	   return $user->save(); // true on success, false otherwise
	}

}