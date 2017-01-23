<?php
namespace Dancer\Controller;
use Think\Controller;

class PlayController extends BaseController {
    private $_service = null;
    public function __construct(){
        parent::__construct();
        //$this->_service = new AlbumService();
    }
   
    public function index($id=0){
        pre($id);
        //$this->assign('datas', $datas);        
        $this->display();
    }
}