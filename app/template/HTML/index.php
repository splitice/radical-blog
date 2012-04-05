<h1>Example Blog</h1>
<?php 
foreach ($_->vars['list'] as $post){
	echo '<h2>',$post->getTitle(),'</h2>';
	
	echo '<p>',$post->getContent(),'</p>';
}

echo '<div class="pagination">';
$url = function($page){
	if($page == 1){
		return '/';
	}else{
		return '/page/'.$i;
	}
};
echo $_->vars['list']->OutputLinks(new Net\URL\Pagination\CallbackMethod($url),new Net\URL\Pagination\Template\Standard());
echo '</div>';
?>
