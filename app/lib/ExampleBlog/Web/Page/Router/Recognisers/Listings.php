<?php
namespace Web\Page\Router\Recognisers;

class Listings extends Templates\Standard {
	static $match = array(
		'/archive/%(month)d/%(year)d'=>'Listing',
		'/archive/%(month)d/%(year)d/page/%(page)d'=>'Listing',
		'/category/%(category)s'=>'Listing',
		'/category/%(category)s/page/%(page)d'=>'Listing',
		'/tag/%(tag)s'=>'Listing',
		'/tag/%(tag)s/page/%(page)d'=>'Listing',
		'/tags/'=>'TagList',
		'/tags/page/%(page)d'=>'TagList',
		'/tags/%(letter)s'=>'TagList',
		'/tags/%(letter)s/page/%(page)d'=>'TagList',
		'/page/%(page)d'=>'Listing',
		'/' => 'Listing'
	);
}