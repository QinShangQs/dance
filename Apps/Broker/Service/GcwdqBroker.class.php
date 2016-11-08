<?php

namespace Broker\Service;

class GcwdqBroker extends BaseBroker implements IBroker {
	
	public function doing($url, $subid=0){
		$rc = preg_match('/gcwdq\.com\/gcwdq\/(\d+)\.html/i', $url, $out);
	
		if($rc == 0){
			parent::createErrorMsg('获取vid失败');
		}else{
			$vid = $out[1];
			$api = "http://www.gcwdq.com/index.php?c=content&a=downjs&vid=".$vid."&t=".time();
			$html = HttpHelper::file_get($api);
			$rc = preg_match("/href='(.+?)'/", $html, $out_url);	
			if($rc == 0){
				parent::createErrorMsg('获取url失败');
			}else{
				$no = 1;
				$name = static::getName($vid);
				$seconds = 0;
				$url = $out_url[1];
				$size = HttpHelper::getContentLength($url);
				parent::createItem($no, $name, $seconds, $size, $url);
			}
		}
		
		return parent::getItems();
	}
	
	private static function getName($vid){
		$api = "http://www.gcwdq.com/index.php?c=content&a=down&vid=".$vid."&t=".time();
		$html = HttpHelper::file_get($api);
		$rc = preg_match('/f14 fb">(.+?)<\/a>/i', $html, $out);
		return $rc > 0 ? $out[1]: 'unknown';
	}

}
