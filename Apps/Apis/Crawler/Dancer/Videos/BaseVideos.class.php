<?php

namespace Apis\Crawler\Dancer\Videos;

class BaseVideos {
	private $_results = null;
	/**
	 * 视频
	 * @var int
	 */
	const V_TYPE_VIDEOS = 0;
	/**
	 * 音频
	 * @var int
	 */
	const V_TYPE_AUDIOS = 1;
	
	public function __construct(){
		$this->_results = array();
	}
	
	protected  function createResult($video_name,$alias_name, $v_type, $source, $keyword,$logo,$link_url,$seconds, $album_desc,$publish_date) {

		$data = array (
				'uid' => static::getUid($source, $v_type, $video_name),
				'video_name' => static::filter($video_name),
				'alias_name' => static::filter($alias_name),
				'v_type' => static::filter($v_type),
				'source' => static::filter($source),
				'keyword' => static::filter($keyword),
				'logo' => static::filter($logo),
				'link_url' => static::filter($link_url),
				'seconds' => static::filter($seconds),
				'album_desc' => static::filter($album_desc),
				'publish_date' => static::filter($publish_date)
		);
		$this->_results[] = $data;
		return $data;
	}
	
	protected function getResults(){
		return $this->_results;
	}
	
	protected function clearResult(){
		$this->_results = array();
	}
	
	private static function filter($str){
		return addslashes(trim($str));
	}
	
	private static function getUid($source,$v_type,$video_name){
		return sha1(static::filter($source) . "-" . static::filter($v_type) . "-" . static::filter($video_name));
	}
}