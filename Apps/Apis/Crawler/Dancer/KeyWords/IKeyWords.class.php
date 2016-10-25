<?php
namespace Apis\Crawler\Dancer\KeyWords;
/**
 * 抓取关键词列表
 * @author zq
 *
 */
interface IKeyWords{
	function suggest();
	
	function hot();
	
	function last();
}