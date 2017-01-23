<?php
namespace Dancer\Service;


use Apis\Logic\VideosInfoLogic;
/**
 * 搜索业务逻辑类
 * @author liziqiang
 *
 */
class SearchService  {
    private $_video_logic = null;
    public function __construct(){
        $this->_video_logic = new VideosInfoLogic();
    }
   
    /**
     * 根据关键词查找专辑
     * @param unknown $keyword
     */
    public function findAlbum($keyword){
        $conditions = array();
        $conditions['keyword'] = array('eq', $keyword);
        $results = $this->_video_logic->findAll($conditions,'id desc');
        return $results;
    }
    
    /**
     * 根据关键词查找所有视频
     * @param unknown $keyword
     */
    public function findList($keyword){
        $conditions = array();
        $conditions['video_name'] = array('like','%'.$keyword.'%');
        $results = $this->_video_logic->findAll($conditions,'id desc');
        return $results;
    }
}