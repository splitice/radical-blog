<?php
namespace Web\PageRecogniser\Recognisers;

class APost extends Templates\Standard {
	static $match = array(
		'/p/%(post)s/'=>'\\Web\\Pages\\Post',
		'/p/%(post)s'=>'\\Web\\Pages\\Post',
	);
}