<?php 
if(!isset($_)) { $_ = new \Exception('Template Error'); throw $_; } //Dewarn
?>
<h1>Example Blog</h1>
<?php 
foreach ($_->vars['list'] as $post){
	echo '<h2>','<a href="',$_->U($post),'">',$post->getTitle(),'</a>','</h2>';
	
	echo '<p>',$post->getContent(),'</p>';
}

echo '<div class="pagination">';
$url = function($page){
	if($page == 1){
		return '/';
	}else{
		return '/page/'.$page;
	}
};
echo $_->vars['list']->OutputLinks(new Net\URL\Pagination\CallbackMethod($url),new Net\URL\Pagination\Template\Standard());
echo '</div>';
?>
