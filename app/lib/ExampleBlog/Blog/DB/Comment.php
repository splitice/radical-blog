<?php
namespace Blog\DB;

use Model\Database\Model\Table;

/**
 * Comment model
 * 
 * @author SplitIce
 *
 */
class Comment extends Table {
	const TABLE_PREFIX = 'comment_';
	const TABLE = 'comment';
	
	protected $id;
	protected $name;
	protected $body;
	protected $email;
	/**
	 * Date field, althout the DynamicType class would be applied
	 * automatically we specify it manually in this example code.
	 *
	 * @var DateTime
	 */
	protected $date;
	protected $post;
}