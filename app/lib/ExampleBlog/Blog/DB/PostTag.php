<?php
namespace Blog\DB;

use Model\Database\Model\Table;

/**
 * PostTag model
 * 
 * @author SplitIce
 *
 */
class PostTag extends Table {
	const TABLE_PREFIX = 'pt_';
	const TABLE = 'post_tag';
	
	protected $post;
	protected $tag;
}