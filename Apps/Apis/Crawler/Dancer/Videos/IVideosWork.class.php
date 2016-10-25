<?php
namespace Apis\Crawler\Dancer\Videos;
/**
 * 执行抓取工作，决定那些IRunningVideos实现类可被抓取
 * @author zq
 *
 */
interface IVideosWork{
	function doing();
}