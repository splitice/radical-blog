<h1>Example Blog</h1>
<?php 
foreach ($_->vars['list'] as $post){
	echo '<h2>',$post->getTitle(),'</h2>';
	
	echo '<p>',$post->getBody(),'</p>';
}
?>