<?php
namespace Web\Page\Router\Recognisers;

class APost extends Templates\Standard {
	static $match = array(
		'/p/%(post)s/'=>'Post',
		'/p/%(post)s'=>'Post',
	);
}