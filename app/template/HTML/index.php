<?php
if (! isset ( $_ )) {
	$_ = new \Web\Templates\Scope();
	throw new \Exception ( 'Template Error' );
} // Dewarn & ZS Code Completion

echo '<h1>',$_->h($_->vars['header']),'</h1>';

//Main Listing
foreach ( $_->vars ['list'] as $post ) {
	echo '<div class="post"><div class="entry">';
	echo '<h2>', '<a href="', $_->U ( $post ), '">', $_->H ( $post->getTitle () ), '</a>', '</h2>';
	
	echo '<p>', $_->H ( $post->getContentShort () ), '</p>';
	echo '</div><div class="clear"></div></div>';
	
	//Category
	echo '<div class="postmeta">';
	echo 'Posted ',$post->getDate()->toFormat('F j, Y g:i a');
	echo ' | Filed under ';
	echo '<a href="'.$_->u($post->getCategory()).'">'.$_->H ( $post->getCategory()).'</a>';
	
	//Tags
	$tags = $post->getTags();
	if($tags){
		echo ' | Tagged: ';
		echo implode(', ',array_map(function($tag) use ($_){
			return '<a href="'.$_->u($tag).'">'.$tag.'</a>';
		},$post->getTags()));
	}
	
	echo ' | ';
	echo '<a>',$post->getComments()->getCount(),' Comments</a>';
	echo '</div>';
}

echo '<div id="postnavi_index" class="pagination">';
$url = function ($page) {
	if ($page == 1) {
		return '/';
	} else {
		return '/page/' . $page;
	}
};
echo $_->vars ['list']->OutputLinks ( new Utility\Net\URL\Pagination\CallbackMethod ( $url ), new Utility\Net\URL\Pagination\Template\Standard () );
echo '</div><div class="clear"></div>';
?>
