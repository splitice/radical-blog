<?php
namespace Web\PageRecogniser\Recognisers;

class Listings extends Templates\Standard {
	static $match = array(
		'/page/%(page)d'=>'\\Web\\Pages\\Index',
		'/' => '\\Web\\Pages\\Index'
	);
}