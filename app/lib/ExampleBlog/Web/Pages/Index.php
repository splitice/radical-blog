<?php
namespace Web\Pages;
use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;

class Index extends PageHandler\HTMLPageBase {
	private $page = 1;
	function __construct($data = array()){
		if(isset($data['page'])){
			$this->page = $data['page'];
		}
	}
	function GET() {
		$table = TableReference::getByTableClass('Post');
		$VARS = array();
		$VARS['list'] = new \Database\Model\Pagination\Paginator($table);
		return new Template('index',$VARS);
	}
}