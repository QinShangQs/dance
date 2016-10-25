<?php

namespace Apis\Logic;

use Think\Model;
use Apis\Model\KeywordsModel;
class KeywordsLogic extends BaseLogic {
	public function  __construct(){
		$this->_repository = new KeywordsModel() ;
	}
}
