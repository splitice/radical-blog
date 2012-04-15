<?php
namespace Web\PageRecogniser\Recognisers;

class Listings extends Templates\Standard {
	static $match = array(
		'/category/%(category)s'=>'\\Web\\Pages\\Listing',
		'/category/%(category)s/page/%(page)d'=>'\\Web\\Pages\\Listing',
		'/tag/%(tag)s'=>'\\Web\\Pages\\Listing',
		'/tag/%(tag)s/page/%(page)d'=>'\\Web\\Pages\\Listing',
		'/page/%(page)d'=>'\\Web\\Pages\\Listing',
		'/' => '\\Web\\Pages\\Listig'
	);
}