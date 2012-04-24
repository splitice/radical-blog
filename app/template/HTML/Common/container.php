<!DOCTYPE html>
<html lang="en">
<? $_->incl('Common/html_head','framework'); ?>
<body>
	<div id="header" class="clearfix">
		<div id="logo">
			<h1><a href="<?=$_->u('/')?>">Radical PHP Blog</a></h1>
		</div>
	</div>
	<div id="content" class="clearfix">
		<div class="content_left">
		<?
		$_->body ();
		?>
		</div>
		<? include('sidebar.php')?>
		<div class="clear"></div>
	</div>
	<div id="footer" class="clearfix">
		<div class="footer_text">

			<a href="#">Top</a> | <a href="http://koch-werkstatt.de/2010/03/21/wordpress-theme-nameless/">Nameless</a>.

		</div>
	</div>
	<? $_->incl('Common/footer','framework'); ?>
</body>
</html>