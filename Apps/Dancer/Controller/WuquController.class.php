<?php
namespace Dancer\Controller;
use Think\Controller;
use Dancer\Service\WuquService;
class WuquController extends BaseController {
    private $_service = null;
    public function __construct(){
        parent::__construct();
        $this->_service = new WuquService();
    }
   
    public function index(){
        $letters = $this->_service->getAllLetterKeywords();
        $this->assign('letters', $letters);        
        $this->display();
    }
}