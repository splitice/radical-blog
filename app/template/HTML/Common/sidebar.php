<div class="sidebar">
	<div class="sidebar_box">
		<h4>Search</h4>
		<div id="searchthis">
			<form method="get" id="searchform" action="">
				<div>
					<input type="text" value="" name="s" id="s" /> <input
						id="searchsubmit" type="image"
						src="http://themes.koch-werkstatt.de/wp-content/themes/nameless/images/search.gif"
						alt="Submit" />
				</div>
			</form>
		</div>
	</div>
	
	<div class="sidebar_box">
		<h4>Categories</h4>
		<ul>
		<?php 
			foreach(\Blog\DB\Category::getAll() as $cat){
				echo '<li>';
				echo '<a href="',$_->u($cat),'">',$cat,'</a>';
				echo '</li>';
			}
		?>
		</ul>
	</div>


	<div class="sidebar_box">
		<h4>Archive</h4>
		<ul>
			<li><a href='http://themes.koch-werkstatt.de/2010/03/'
				title='März 2010'>März 2010</a></li>
			<li><a href='http://themes.koch-werkstatt.de/2008/11/'
				title='November 2008'>November 2008</a></li>
			<li><a href='http://themes.koch-werkstatt.de/2008/09/'
				title='September 2008'>September 2008</a></li>
			<li><a href='http://themes.koch-werkstatt.de/2007/04/'
				title='April 2007'>April 2007</a></li>
		</ul>
	</div>

	<div class="sidebar_box">
		<h4>Meta</h4>
		<ul>
			<li><a href="<?=$_->u('admin')?>">Admin</a></li>
			<li>Rapid PHP</li>
		</ul>
	</div>

	<div class="sidebar_box">
		<h4>Tip</h4>
		<ul>
			<li><a href="http://www.getfirefox.com">If it looks weird in
					your browser, get a better one</a></li>
		</ul>
	</div>
</div>