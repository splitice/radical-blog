<?php
namespace Web\Pages;
use Database\Search\Adapter\MysqlFulltextTable;

use Web\Templates\ContainerTemplate;

use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;

class Listing extends PageHandler\HTMLPageBase {
	protected $search;
	protected $page = 1;
	function __construct($data = array()){
		if(isset($data['page'])){
			$this->page = $data['page'];
		}
		if(isset($_GET['search'])){
			$this->search = $_GET['search'];
		}
	}
	private function where(){
		
	}
	function GET() {
		$table = TableReference::getByTableClass('Post');
		
		$source = $table->getAll($this->where());
		if($this->search){
			$source = $source->Search($this->search, new MysqlFulltextTable(array('post_title','post_content')));
		}
		
		$VARS = array();
		$VARS['list'] = new \Database\Model\Pagination\Paginator($source);
		return new ContainerTemplate('index',$VARS);
	}
}