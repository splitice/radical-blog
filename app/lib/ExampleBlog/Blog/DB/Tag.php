<?php
namespace Blog\DB;

use Database\Model\Table;

/**
 * Tag model
 * 
 * @author SplitIce
 *
 */
class Tag extends Table {
	const TABLE_PREFIX = 'tag_';
	const TABLE = 'tag';
	
	protected $id;
	protected $title;
	protected $stub;
	
	function toURL(){
		return '/tag/'.$this->stub;
	}
	
	function __toString(){
		return $this->title;
	}
	
	static function fromStub($stub){
		return static::fromFields(array('*stub'=>$stub));
	}
}