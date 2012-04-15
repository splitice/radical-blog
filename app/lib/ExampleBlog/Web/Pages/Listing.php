<?php
namespace Web\Pages;
use Database\SQL\SelectStatement;

use Database\SQL\Parts\Where;
use Database\Search\Adapter\MysqlFulltextTable;
use Web\Templates\ContainerTemplate;
use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;
use Blog\DB;

class Listing extends PageHandler\HTMLPageBase {
	protected $search;
	protected $page = 1;
	protected $category;
	protected $tag;
	function __construct($data = array()){
		if(isset($data['page'])){
			$this->page = $data['page'];
		}
		if(isset($data['tag'])){
			$this->tag = DB\Tag::fromStub($data['tag']);
		}
		if(isset($data['category'])){
			$this->category = DB\Category::fromStub($data['category']);
		}
		if(isset($_GET['search'])){
			$this->search = $_GET['search'];
		}
	}
	function Title($part = null){
		return parent::Title($this->header());
	}
	private function where(){
		$sql = new SelectStatement('post');
		$where = new Where();
		if($this->tag){
			$sql->left_join('post_tag','pt');
			$where->Add(array('pt','tag_id'), $this->tag->getId());
		}
		if($this->category){
			$where->Add('category_id', $this->category->getId());
		}
		$sql->where($where);
		return $sql;
	}
	private function header(){
		$ret = '';
		if($this->category){
			$ret = 'Category of '.$this->category;
		}elseif($this->tag){
			$ret = 'Tagged '.$this->tag;
		}
		if($this->search){
			if($ret){
				$ret .= ' ';
			}
			$ret .= 'Search Results for: 2012';
		}
		if($this->page != 1){
			if($ret){
				$ret .= ', p';
			}else{
				$ret .= 'P';
			}
			$ret .= 'age '.$this->page;
		}
		if(!$ret){
			$ret = 'Index';
		}
		return $ret;
	}
	function GET() {
		$table = TableReference::getByTableClass('Post');
		
		$source = $table->getAll($this->where());
		if($this->search){
			$source = $source->Search($this->search, new MysqlFulltextTable(array('post_title','post_content')));
		}
		
		$VARS = array();
		$VARS['header'] = $this->header();
		$VARS['list'] = new \Database\Model\Pagination\Paginator($source);
		return new ContainerTemplate('index',$VARS);
	}
}