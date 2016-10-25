<?php
namespace Apis\Crawler\Dancer\KeyWords;
/**
 * 决定那个IRunningKeyWordsWork执行任务
 * @author zq
 *
 */
class KeyWordsWorkFactory{
	public static function create(){
		return new DefaultKeyWordsWork();
	}
}