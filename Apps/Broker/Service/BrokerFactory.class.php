<?php

namespace Broker\Service;

class BrokerFactory {
	const CHECK_URL_VALID = "/(www\.999d\.com|gcwdq\.com|m\.toutiao\.com)/";
	
	public static function doDataResult($url, $subid = 0){
		$lowerurl = strtolower ( $url );
		preg_match ( self::CHECK_URL_VALID, $lowerurl, $matches );
		if (! $matches) {
			return BaseBroker::getResult('unknown', '不支持该URL解析。');
		}
		
		$borker = null;
		$sign = '';
		switch ($matches [1]) {
			case 'www.999d.com' :
				$sign = '999d';
				$borker = new D999Broker();
				break;
			case 'gcwdq.com':
				$sign = 'gcwdq';
				$borker = new GcwdqBroker();
				break;
			case 'm.toutiao.com':
				$sign = 'toutiao';
				$borker = new ToutiaoBroker();
				break;
		}

		$items = $borker->doing($lowerurl, $subid);
		$result = BaseBroker::getResult($sign, $items);
		return $result;
	}
}