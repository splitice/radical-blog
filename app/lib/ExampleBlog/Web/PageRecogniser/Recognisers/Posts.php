<?php
namespace Web\PageRecogniser\Recognisers;

class Posts extends Templates\Standard {
	static $match = array(
		'/page/%(page)d'=>'\\Web\\Pages\\Index',
		'/' => '\\Web\\Pages\\Index'
	);
}