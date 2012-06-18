<?php
namespace Web\Page\Controller;

use Model\Database\Model\Pagination\Paginator;
use Web\Page\Handler\HTMLPageBase;
use Basic\DateTime\Date;
use Model\Database\SQL\SelectStatement;
use Model\Database\SQL\Parts\Where;
use Model\Database\Search\Adapter\MysqlFulltextTable;
use Web\Templates\ContainerTemplate;
use Model\Database\Model\TableReference;
use Web\Template;
use Blog\DB;

class Listing extends HTMLPageBase {
	protected $search;
	protected $page = 1;
	protected $category;
	protected $tag;
	protected $archive;
	
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
		if(isset($data['month']) && isset($data['year'])){
			$this->archive = new \Blog\PostArchive(Date::fromRaw($data['year'], $data['month']));
		}
		if(isset($_GET['s'])){
			$this->search = $_GET['s'];
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
		if($this->archive){
			$this->archive->Filter($where);
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
			$ret .= 'Search Results for: '.$this->search;
		}
		if($this->archive){
			$ret = 'Archive for '.$this->archive;
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
		$VARS['list'] = new Paginator($source);
		return new ContainerTemplate('index',$VARS);
	}
}