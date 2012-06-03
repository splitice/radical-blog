<?php
namespace Blog\DB;

use Model\Database\Model\Table;

/**
 * Category model
 * 
 * @author SplitIce
 *
 */
class Category extends Table {
	const TABLE_PREFIX = 'category_';
	const TABLE = 'category';
	
	protected $id;
	protected $title;
	protected $stub;
	
	function toURL(){
		return '/category/'.$this->stub;
	}
	
	function __toString(){
		return $this->title;
	}
	
	static function fromStub($stub){
		return static::fromFields(array('*stub'=>$stub));
	}
}