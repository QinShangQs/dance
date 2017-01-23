<?php
namespace Apis\Service;

use Apis\Crawler\Dancer\KeyWords\KeyWordsWorkFactory;
use Apis\Logic\KeywordsLogic;
use Apis\Crawler\Dancer\Videos\VideosWorkFactory;
use Apis\Logic\VideosInfoLogic;
class DancerService {
    private $_keywordsLogic = null;
    private $_videosLogic = null;
    
    public function __construct(){
        $this->_keywordsLogic = new KeywordsLogic();
        $this->_videosLogic = new VideosInfoLogic();
    }
    
	public function keywords(){	    	    
		$instance = KeyWordsWorkFactory::create();
		$arrs = $instance->doing();
		$hotCount = 0;
		foreach ($arrs['hot'] as $hk => $hv){
    	    $insts = $this->_keywordsLogic->getByProperty('keyword', $hv);
    	    if(!empty($insts)){   	        
    	        $std = new \stdClass();
    	        $std->id = $insts['id'];
    	        $std->is_hot = 1;
    	        $std->last_time = date_ymhHis();
    	        $this->_keywordsLogic->update($std);
    	        $hotCount++;
    	    }
		}
		
		$lastCount = 0;
		foreach ($arrs['last'] as $lk => $lv){
		    $insts = $this->_keywordsLogic->getByProperty('keyword', $lv);
		    if(!empty($insts)){
		        $std = new \stdClass();
		        $std->id = $insts['id'];
		        $std->is_last = 1;
		        $std->last_time = date_ymhHis();
		        $this->_keywordsLogic->update($std);
		        $lastCount++;
		    }
		}
		
		echo '热门更新:'.$hotCount.'条<br/>';
		echo '最新更新:'.$lastCount.'条<br/>';
	}

	public function videos(){
		$instance = VideosWorkFactory::create();
		$res = $instance->doing();
		
		$newCount = 0;
		foreach ($res as $k => $v){
		    $inst = $this->_videosLogic->getByProperty('uid', $v['uid']);
		    if(empty($inst)){
		        $std = array2object($v);
		        $this->_videosLogic->add($std);
		        $newCount++;
		    }
		}	
		
		echo '新增:'.$newCount.'条<br/>';
	}
} 