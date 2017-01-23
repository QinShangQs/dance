<?php
namespace Apis\Controller;

set_time_limit ( 0 ); // 永不超时

use Think\Controller;

use Apis\Service\DancerService;


class SeekDancerController extends Controller {
    private $_service = null;
    public function __construct(){
        $this->_service = new DancerService();
    }
    
    public function index(){
        echo '';
    }
    
    public function keywords(){
        pre('====开始====');
        $this->_service->keywords();
        pre('====结束====');
    }

    public function videos(){
        pre('====开始====');
        $this->_service->videos();
        pre('====结束====');
    }
}