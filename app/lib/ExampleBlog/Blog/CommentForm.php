<?php
namespace Blog;
use Blog\DB\Post;

use HTML\Form\Builder\FormInstance;

class CommentForm extends FormInstance {
	function __construct(Post $post){
		parent::__construct();
		$this->text('name');
		$this->text('title');
		$this->email('email');
		$this->textbox('body');
	}
}