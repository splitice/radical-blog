<?php
namespace Blog\DB;

use Database\Model\Table;

/**
 * User model
 * 
 * @author SplitIce
 *
 */
class User extends Table {
	const TABLE_PREFIX = 'user_';
	const TABLE = 'user';
	
	protected $id;
	protected $username;
	protected $password;
	
	function __toString(){
		return $this->username;
	}
}