<?php
namespace Dancer\Controller;
use Think\Controller;
use Dancer\Service\WuquService;
use Dancer\Service\AlbumService;
class AlbumController extends BaseController {
    private $_service = null;
    public function __construct(){
        parent::__construct();
        $this->_service = new AlbumService();
    }
   
    public function index($keyword=''){
        $datas = array();
        if(!empty($keyword)){
            $datas = $this->_service->find($keyword);
        }
        $this->assign('keyword',$keyword);
        $this->assign('datas', $datas);        
        $this->display();
    }
}