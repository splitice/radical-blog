<!DOCTYPE html>
<html lang="en">
<? $_->incl('Common/html_head','framework'); ?>
<body>
	<div id="header" class="clearfix">
		<div id="logo">
			<a href="http://themes.koch-werkstatt.de"><img
				src="http://themes.koch-werkstatt.de/wp-content/themes/nameless/images/header.gif"
				alt="Themes" title="Themes" height="150" /></a>
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

			<a href="#">Top</a>
			<div>&nbsp;</div>
			<a href="http://themes.koch-werkstatt.de">Themes</a> is powered by <a
				href="http://www.wordpress-deutschland.org">WordPress 3.2.1</a> and
			Theme <a
				href="http://koch-werkstatt.de/2010/03/21/wordpress-theme-nameless/">Nameless</a>.

		</div>
	</div>
</body>
</html>