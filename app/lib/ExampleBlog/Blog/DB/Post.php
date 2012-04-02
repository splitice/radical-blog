<?php
namespace Blog\DB;
use Database\Model\Table;

class Post extends Table {
	const TABLE_PREFIX = 'post_';
	const TABLE = 'post';
	
	protected $id;
	protected $title;
	protected $body;
	
	/**
	 * Date field, althout the DynamicType class would be applied
	 * automatically we specify it manually in this example code.
	 * 
	 * @var DateTime
	 */
	protected $date;
}