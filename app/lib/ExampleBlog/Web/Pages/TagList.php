<?php
namespace Web\Pages;
use Basic\DateTime\Date;

use Database\SQL\SelectStatement;
use Database\SQL\Parts\Where;
use Database\Search\Adapter\MysqlFulltextTable;
use Web\Templates\ContainerTemplate;
use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;
use Blog\DB;

/**
 * The Tag Listing controller.
 * Provides an example of pagination inside pagination and A-Z style pagination
 * 
 * @author SplitIce
 *
 */
class TagList extends PageHandler\HTMLPageBase {
	protected $letter;
	protected $page = 1;
	
	function __construct($data = array()){
		if(isset($data['letter'])){
			$this->letter = $data['letter'];
		}
		if(isset($data['page'])){
			$this->page = $data['page'];
		}
	}
	function Title($part = null){
		$ret = parent::Title($this->header());
		
		//Add page number to title
		if($this->page > 1){
			$ret .= ' Page '.$this->page;
		}
		return $ret;
	}
	private function header(){
		if($this->letter){
			return 'Tags "'.$this->letter.'"';
		}
		return 'Tags';
	}
	function GET() {
		$table = TableReference::getByTableClass('Tag');
		
		$source = $table->getAll();
		
		$alphaPagination = new \Database\Model\Pagination\AlphaPaginator($source,'tag_name',$this->letter);
		die(var_dump($alphaPagination));
		$VARS = array();
		$VARS['header'] = $this->header();
		$VARS['list'] = new \Database\Model\Pagination\Paginator($source);
		return new ContainerTemplate('index',$VARS);
	}
}