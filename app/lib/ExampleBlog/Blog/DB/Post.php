<?php
namespace Blog\DB;

use Blog\CommentForm;
use Basic\Arr;
use Basic\String\Truncate;
use Model\Database\Model\Table;

/**
 * Post model
 * 
 * @author SplitIce
 *
 */
class Post extends Table {
	const TABLE_PREFIX = 'post_';
	const TABLE = 'post';
	
	/* Database Fields */
	protected $id;//post_id
	protected $title;//post_title
	
	/**
	 * The post body
	 */
	protected $content;//post_content
	
	/**
	 * The user who posted the post. aka the poster.
	 */
	protected $user;//user_id (Foreign Key to users table)
	
	/**
	 * Date field, althout the DynamicType class would be applied
	 * automatically we specify it manually in this example code.
	 * 
	 * @var DateTime
	 */
	protected $date;//post_date
	
	/**
	 * The URL Stub used to access a post.
	 * 
	 * @var Stub
	 */
	protected $stub;//post_stub
	
	protected $category;//category_id (A Foreign key to the category table)
	
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
	
	/* An optional user defined function */
	function getTags(){
		return Arr::map(function(PostTag $pt){
			return $pt->getTag();
		}, $this->getPostTags());
	}
	
	/* Optional: The URL to the models main page */
	function toURL(){
		return 'p/'.$this->stub;
	}
	
	/* Optional: A form directly related to the model */
	function getCommentFormBuilder($event){
		return new CommentForm($this,$event);
	}
	
	/* Optional: Specialized selector */
	static function fromStub($stub){
		return static::fromFields(array('*stub'=>$stub));
	}
}