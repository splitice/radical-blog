<?php
namespace Web\Page\Controller;

use Model\Database\Model\Pagination\Paginator;

use Model\Database\Model\Pagination\AlphaPaginator;

use Web\Page\Handler\HTMLPageBase;
use Basic\DateTime\Date;
use Model\Database\SQL\SelectStatement;
use Model\Database\SQL\Parts\Where;
use Model\Database\Search\Adapter\MysqlFulltextTable;
use Web\Templates\ContainerTemplate;
use Model\Database\Model\TableReference;
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
class TagList extends HTMLPageBase {
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
		
		$alphaPagination = new AlphaPaginator($source,'tag_name',$this->letter);
		die(var_dump($alphaPagination));
		$VARS = array();
		$VARS['header'] = $this->header();
		$VARS['list'] = new Paginator($source);
		return new ContainerTemplate('index',$VARS);
	}
}