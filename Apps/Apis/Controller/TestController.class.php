<?php
namespace Apis\Controller;
use Think\Controller;
use Apis\Crawler\Dancer\KeyWords\KeyWordsWorkFactory;
use Apis\Crawler\Dancer\Videos\VideosWorkFactory;
class TestController extends Controller {
	public function __construct(){
		//echo '<meta charset="UTF-8">';
	}
	
	public function keywords(){
		$worker = KeyWordsWorkFactory::create();
		$result = $worker->doing();
		$this->ajaxReturn($result);
	}
	
	public function videos(){
		$worker = VideosWorkFactory::create();
		$result = $worker->doing();
		//pre($result);
		$this->ajaxReturn($result);
	}
}