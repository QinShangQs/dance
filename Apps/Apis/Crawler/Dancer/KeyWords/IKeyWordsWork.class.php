<?php
namespace Apis\Crawler\Dancer\KeyWords;
/**
 * 执行抓取工作，决定那些IRunningKeyWords实现类可被抓取
 * @author zq
 *
 */
interface IKeyWordsWork{
	/**
	 * 返回格式为
	 * array('suggest'=>array(),'hot'=>array(),'last'=>array());
	 */
	function doing();
}