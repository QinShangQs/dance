<?php
namespace Apis\Crawler\Dancer\Videos;
/**
 * 抓取视频列表 
 * @author zq
 *
 */
interface IVideos{
	/**
	 * array(array('uid'=>'','video_name'=>'','alias_name'=>'','v_type'=> 0,'source'=>''
	 * ,'keyword'=>'','logo'=>'','link_url'=>'','seconds'=>0,'album_desc'=>'','publish_date'=>''))
	 * @param string $keyword
	 */
	function run($keyword = null);
}