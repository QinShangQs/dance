<?php

namespace Apis\Logic;

use Think\Model;
use Apis\Model\VideosOtherModel;
class VideosOtherLogic extends BaseLogic {
	public function  __construct(){
		$this->_repository = new VideosOtherModel() ;
	}
}
