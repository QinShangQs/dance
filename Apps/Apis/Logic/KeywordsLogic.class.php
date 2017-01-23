<?php

namespace Apis\Logic;

use Think\Model;
use Apis\Model\KeywordsModel;
class KeywordsLogic extends BaseLogic {
	public function  __construct(){
		$this->_repository = new KeywordsModel() ;
	}
	
	/**
	 * 获取去重复后的tag列表
	 */
	public function getTags(){
	    return $this->_repository->distinct(true)->field('tag')->order('tag asc')->select();
	}
}
