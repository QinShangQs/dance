<?php

namespace Broker\Service;

class D999Broker extends BaseBroker implements IBroker {
	//http://www.999d.com/video/132231.html
	
	public function doing($url, $subid = 0) {
		$html = HttpHelper::file_get($url);
		$rc = preg_match("/webkit_playlist = \['(\S+)'\];/i", $html, $out);
		if($rc > 0){
			$url = $out[1];
			$size = HttpHelper::getContentLength($url);
			$name = 'unknown';
			
			$rcName = preg_match('/title: "(.+?)",/i', $html, $outName);
			if($rcName){
				$name = $outName[1];
			}
			
			parent::createItem(1, $name, 0, $size, $url);
		}else{
			parent::createErrorMsg('解析失败！');
		}
		
		return parent::getItems();
	}
	
	//http://www.999d.com/video/49906.html
	//http://vxml.56.com/json/MTA3Nzk5OTk0/?src=site&ref=www.56.com&t=0.5398993771523237
}