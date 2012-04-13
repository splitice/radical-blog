<?php
if (! isset ( $_ )) {
	$_ = new \Web\Templates\Scope();
	throw new \Exception ( 'Template Error' );
} // Dewarn & ZS Code Completion
?>
<h1>Example Blog</h1>
<?php
foreach ( $_->vars ['list'] as $post ) {
	echo '<div class="post"><div class="entry">';
	echo '<h2>', '<a href="', $_->U ( $post ), '">', $_->H ( $post->getTitle () ), '</a>', '</h2>';
	
	echo '<p>', $post->getContentShort (), '</p>';
	echo '</div><div class="clear"></div></div>';
	
	//Meta
	echo '<div class="postmeta">';
	echo 'Filed under <a>Allgemein</a>';
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
echo $_->vars ['list']->OutputLinks ( new Net\URL\Pagination\CallbackMethod ( $url ), new Net\URL\Pagination\Template\Standard () );
echo '</div><div class="clear></div>';
?>
