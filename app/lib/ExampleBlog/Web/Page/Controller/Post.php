<?php
namespace Web\Page\Controller;

use Web\Page\Handler\EventPageBase;
use Blog\DB\Comment;
use Web\Templates\ContainerTemplate;
use Database\Model\TableReference;
use Web\Template;
use Web\PageHandler;
use Blog\DB;
use Exception;

class Post extends EventPageBase {
	protected $post;
	function __construct($data = array()){
		if(isset($data['post'])){
			$this->post = DB\Post::fromStub($data['post']);
		}else{
			throw new Exception('No Post Stub given to controller');
		}
	}
	function eventPostComment($data){
		$comment = new Comment($data);
		$comment->setPost($this->post);
		$comment->Insert();
	}
	function GET() {
		if(!$this->post){
			return new Special\FileNotFound();
		}
		
		$VARS = array();
		$VARS['post'] = $this->post;
		$VARS['comment_form'] = $this->post->getCommentFormBuilder(array($this,'eventPostComment'));
		return new ContainerTemplate('post',$VARS);
	}
}