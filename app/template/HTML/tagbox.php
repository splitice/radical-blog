<div class="sidebar_box">
	<h4>Tags</h4>
	<ul>
	<?php 
		foreach($_->vars['tags'] as $tag){
			echo '<li>';
			echo '<a href="',$_->u($tag['tag']),'">',$tag['tag'],'</a>';
			echo '</li>';
		}
	?>
	</ul>
</div>