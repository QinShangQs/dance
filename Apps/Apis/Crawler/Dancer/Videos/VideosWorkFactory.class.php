<?php
namespace Apis\Crawler\Dancer\Videos;
/**
 * 决定那个IVideosWork执行任务
 * @author zq
 *
 */
class VideosWorkFactory{
	public static function create(){
		return new DefaultVideosWork();
	}
}