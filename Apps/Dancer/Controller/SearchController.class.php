<?php
namespace Dancer\Controller;
use Think\Controller;

use Dancer\Service\SearchService;
class SearchController extends BaseController {
    private $_service = null;
    public function __construct(){
        parent::__construct();
        $this->_service = new SearchService();
    }
   
    public function index($keyword=''){
        $albums = array();
        $infos = array();
        if(!empty($keyword)){
            $albums = $this->_service->findAlbum($keyword);
            $infos = $this->_service->findList($keyword);
        }
        $this->assign('keyword',$keyword);
        $this->assign('albums', $albums);        
        $this->assign('infos', $infos);
        $this->display();
    }
}