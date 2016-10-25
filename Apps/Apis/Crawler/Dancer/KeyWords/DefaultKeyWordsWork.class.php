<?php

namespace Apis\Crawler\Dancer\KeyWords;

/**
 * 执行抓取工作，决定那些IKeyWords实现类可被抓取
 * 
 * @author zq
 *        
 */
class DefaultKeyWordsWork implements IKeyWordsWork {
	public function doing() {
		$inst = new DefaultKeyWords ();
		
		$result = array ();
		$result ['suggest'] = static::filter($inst->suggest ()) ;
		$result ['hot'] =  static::filter($inst->hot ());
		$result ['last'] =  static::filter($inst->last ());
		
		return $result;
	}
	
	private static function filter(array $lists){
		if(empty($lists)){
			return null;
		}
		foreach ($lists as $k => $v){
			$lists[$k] = trim($v);
		}
		return $lists;
	}
}