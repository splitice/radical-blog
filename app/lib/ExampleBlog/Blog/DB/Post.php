<?php
namespace Blog\DB;
use Blog\CommentForm;

use Basic\Arr;

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
	
	/**
	 * The post body
	 */
	protected $content;
	
	/**
	 * The user who posted the post. aka the poster.
	 */
	protected $user;
	
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
	
	function getTags(){
		return Arr::map(function(PostTag $pt){
			return $pt->getTag();
		}, $this->getPostTags());
	}
	
	function toURL(){
		return '/p/'.$this->stub;
	}
	
	function getCommentFormBuilder(){
		return new CommentForm($this);
	}
	
	static function fromStub($stub){
		return static::fromFields(array('*stub'=>$stub));
	}
}