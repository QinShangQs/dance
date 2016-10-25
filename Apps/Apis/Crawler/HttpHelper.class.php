<?php
namespace Apis\Crawler;

class HttpHelper{
	const ANDROID_USER_AGENT = "Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30";
	const PC_CHROME_USER_AGNET = "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36";
	/**
	 * 
	 * @param unknown $url
	 * @param string $agent 默认android
	 * @param number $second
	 * @return mixed
	 */
	public static function get_curl_contents($url, $agent='', $second = 15,$referer=null) {
		if (! function_exists ( 'curl_init' ))
			die ( 'php.ini未开启php_curl.dll' );
		$c = curl_init ();
		curl_setopt ( $c, CURLOPT_URL, $url );
		$UserAgent = static::ANDROID_USER_AGENT;
		if(!empty($agent)){
			$UserAgent = $agent;
		}		
		curl_setopt ( $c, CURLOPT_USERAGENT, $UserAgent );
		curl_setopt ( $c, CURLOPT_HEADER, 0 );
		if(!empty($referer)){
			curl_setopt ( $c, CURLOPT_REFERER, $referer );
		}
		curl_setopt ( $c, CURLOPT_TIMEOUT, $second );
		curl_setopt ( $c, CURLOPT_RETURNTRANSFER, true );
		$cnt = curl_exec ( $c );
		curl_close ( $c );
		return $cnt;
	}
	
	public static function file_get($url = '') {
		if (! $url)
			return false;
		$html = file_get_contents ( $url );
		return $html;
	}
}