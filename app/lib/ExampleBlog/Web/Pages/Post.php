<?php
namespace Web\Pages;
use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;
use Blog\DB;
use Exception;

class Post extends PageHandler\HTMLPageBase {
	private $page = 1;
	function __construct($data = array()){
		if(isset($data['post'])){
			$this->post = DB\Post::fromStub($this->post);
		}else{
			throw new Exception('No Post Stub given to controller');
		}
	}
	function GET() {
		if(!$this->post){
			return new Special\FileNotFound();
		}
		
		$VARS = array();
		$VARS['post'] = $this->post;
		return new Template('post',$VARS);
	}
}