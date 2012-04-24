<?php
namespace Blog;
use Blog\DB\Post;
use HTML\Form\Builder\EventFormInstance;

class CommentForm extends EventFormInstance {
	function __construct(Post $post,$event){
		parent::__construct($event[0],$event[1]);
		$this->label('Name: ',$this->text('name'));
		$this->label('Title: ',$this->text('title'));
		$this->label('Email: ',$this->email('email'));
		$this->label('Message: ',$this->textbox('body'));
		$this->submit('Post Comment');
	}
}