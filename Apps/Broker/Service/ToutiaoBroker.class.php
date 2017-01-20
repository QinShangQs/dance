<?php

namespace Broker\Service;

class ToutiaoBroker extends BaseBroker implements IBroker{
	public function doing($url, $subid = 0){
		$rc = preg_match('/m\.toutiao\.com\/(\S+)/i', $url, $out);
		if(empty($rc)){
			parent::createErrorMsg('toutiao没有找到VID'); 
		}else{
			$api = "http://m.toutiao.com/{$out[1]}/info/";
			$jsonStr = HttpHelper::file_get($api);
			$json = HttpHelper::parseJson($jsonStr);
			if(empty($json) || empty($json['success'])){
				parent::createErrorMsg('toutiao解析失败！');
			}
			
			$no = 1;
			$name = $json['data']['title'];
			$seconds = 0;
			$uri = HttpHelper::getJumpUrl($json['data']['url'], $url)  ;
			$uri = substr($uri,0, strpos($uri, '?'));
			$size = 0;
			parent::createItem($no, $name, $seconds, $size, $uri);
			
		}
		return parent::getItems();
	}
}