<?php
namespace Web\Widgets;

use Web\Template;

use Blog\DB\Tag;

use Web\Widget;

class TagBox extends Widget {
	function render(){
		$sql = \DB::select('post_tag',array('tag_id','cnt'=>'COUNT(tag_id)'))
					->group_by('tag_id')
					->order_by('cnt DESC')
					->limit(10);
		//die((string)$sql);
		$tag_hits = array();
		foreach($sql->Execute()->FetchAll() as $r){
			$tag_hits[] = array('cnt'=>$r['cnt'],'tag'=>Tag::fromId($r['tag_id']));
		}
		
		return new Template('tagbox',array('tags'=>$tag_hits));
	}
}