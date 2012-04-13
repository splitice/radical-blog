<?php
namespace Blog\DB;
use Basic\String\Truncate;

use Database\Model\Table;

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
	
	protected $post;
}