<?php
namespace Blog;

use Model\Database\SQL\Parts\Expression\Between;
use Model\Database\SQL\Parts\Where;
use Web\IToURL;
use Basic\DateTime\Date;
use Model\Database\Model\TableReference;
use Model\Database\DBAL;

class PostArchive implements IToURL {
	protected $date;
	function __construct(Date $date){
		$this->date = $date;
	}
	function __toString(){
		return $this->date->toFormat('F Y');
	}
	function toURL(){
		return 'archive/'.$this->date->getMonth().'/'.$this->date->getYear().'/';
	}
	function Filter(Where $where){
		$between = new Between($this->date, $this->date->add('1 month'));
		$where->Add('post_date', $between);
	}
	static function getAll(){
		$postTable = TableReference::getByTableClass('Post');
		$sql = $postTable->select('MIN(post_date) as date')
					->group('MONTH(post_date)');
		
		$res = \DB::Q($sql);
		$class = get_called_class();
		$ret = $res->FetchCallback(function($date) use($class){
			return new $class(Date::fromSQL($date));
		},DBAL\Fetch::ALL_SINGLE);
		
		return $ret;
	}
}