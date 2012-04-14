<?php
namespace Blog\DB;
use Basic\String\Truncate;

use Database\Model\Table;

/**
 * Post model
 * 
 * @author SplitIce
 *
 */
class Post extends Table {
	const TABLE_PREFIX = 'post_';
	const TABLE = 'post';
	
	protected $id;
	protected $title;
	protected $content;
	
	/**
	 * Date field, althout the DynamicType class would be applied
	 * automatically we specify it manually in this example code.
	 * 
	 * @var DateTime
	 */
	protected $date;
	
	/**
	 * The URL Stub used to access a post.
	 * 
	 * @var Stub
	 */
	protected $stub;
	
	protected $category;
	
	/**
	 * Get a Truncated version of the Content.
	 * Truncation occurs at <!-- more --> if its found, otherwise at 300 characters
	 * 
	 * @return string
	 */
	function getContentShort(){
		$pos = strpos($this->content,'<!-- more -->');
		if($pos === false){
			return Truncate::Trim($this->content, 300, true);
		}

		return substr($this->content,0,$pos);
	}
	
	function toURL(){
		return '/p/'.$this->stub;
	}
	
	static function fromStub($stub){
		return static::fromFields(array('*stub'=>$stub));
	}
}