<h1><?=$_->vars['post']->getTitle()?></h1>

<p class="content">
	<?=$_->vars['post']->getContent()?>
</p>

<div class="comments">
	<h2>Comments</h2>
	<ol class="commentlist">
	<?
	foreach ($_->vars['post']->getComments() as $k=>$comment){
		echo '<li class="',$_->even($k,'alt '),'item">';
		echo '<div class="comment_text">';
		echo '#',$k,' &bull; <strong>';
		$commenter = $comment->getName();
		if($commenter === null){
			$commenter = '<i>Anonymous</i>';
		}
		echo $commenter;
		echo '</strong> said <strong>',$comment->getTitle(),'</strong> on ';
		echo $comment->getDate()->toFormat('F j, Y g:i a'),'</a>: ';
		echo '<div></div>';
		echo '<p>',$comment->getBody(),'</p>','</div>';
		echo '<div class="clear"></div></li>';
	}
	?>
	</ol>
	<h2>Post your Comment</h2>
	<?
		echo $_->vars['post']->getCommentFormBuilder();
	?>
</div>