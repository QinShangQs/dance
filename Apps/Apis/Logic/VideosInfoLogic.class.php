<?php

namespace Apis\Logic;

use Think\Model;
use Apis\Model\VideosInfoModel;
class VideosInfoLogic extends BaseLogic {
	public function  __construct(){
		$this->_repository = new VideosInfoModel() ;
	}
}
