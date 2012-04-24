<?php
namespace Blog\DB;

use Web\Session\User\IUserAdmin;

use Database\Model\Table;

/**
 * User model
 * 
 * @author SplitIce
 *
 */
class User extends Table implements IUserAdmin {
	const TABLE_PREFIX = 'user_';
	const TABLE = 'user';
	
	protected $id;
	protected $username;
	/**
	 * The users password
	 * 
	 * @var \Database\DynamicTypes\Password Raw
	 */
	protected $password;
	
	/**
	 * Is the user an admin?
	 * 
	 * @var \Database\DynamicTypes\Boolean yes no
	 */
	protected $admin;
	
	function __toString(){
		return $this->username;
	}
	
	function getUsername(){
		return $this->__call(__FUNCTION__, func_get_args());
	}
	
	function getPassword(){
		return $this->__call(__FUNCTION__, func_get_args());
	}
	
	function isAdmin(){
		return $this->admin->true();
	}
}