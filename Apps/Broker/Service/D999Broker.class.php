<?php

namespace Broker\Service;

class D999Broker extends BaseBroker implements IBroker {
	//http://www.999d.com/video/132231.html
	
	public function doing($url, $subid = 0) {
		$html = HttpHelper::file_get($url);
		$rc = preg_match("/webkit_playlist = \['(\S+)'\];/i", $html, $out);
		if($rc > 0){
		    $out[1] = str_replace("'", '', $out[1]);
		    $urls = explode(',', $out[1]);
			$url = $urls[1];
			$size = HttpHelper::getContentLength($url);
			$name = 'unknown';
			
			$rcName = preg_match('/title: "(.+?)",/i', $html, $outName);
			if($rcName){
				$name = $outName[1];
			}
			
			parent::createItem(1, $name, 0, $size, $url);
		}else if(preg_match("/open\_(\S+?)\.swf/i", $html, $out)){
			$api = "http://vxml.56.com/json/{$out[1]}/?src=site&ref=www.56.com&t=0.23835816606879234";

			$jsonStr = HttpHelper::file_get($api);
			$json = HttpHelper::parseJson($jsonStr);
			if(empty($json) || $json['status'] != 1){
				parent::createErrorMsg('56解析失败！');
			}else{
				$no = 1;
				$name = $json['info']['Subject'];
				$seconds = floor(intval($json['info']['rfiles'][0]['totaltime']) / 1000);
				$size = $json['info']['rfiles'][0]['filesize'];
				$url = $json['info']['rfiles'][0]['url'];
				parent::createItem($no, $name, $seconds, $size, $url);
			}
			
		}else{
			parent::createErrorMsg('解析失败！');
		}
		
		return parent::getItems();
	}
	
	//http://www.999d.com/video/49906.html
	//http://vxml.56.com/json/MTA3Nzk5OTk0/?src=site&ref=www.56.com&t=0.5398993771523237
}