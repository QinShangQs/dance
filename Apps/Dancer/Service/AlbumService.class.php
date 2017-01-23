<?php
namespace Dancer\Service;


use Apis\Logic\VideosInfoLogic;
/**
 * 专辑业务逻辑类
 * @author liziqiang
 *
 */
class AlbumService  {
    private $_video_logic = null;
    public function __construct(){
        $this->_video_logic = new VideosInfoLogic();
    }
   
    /**
     * 根据关键词查找专辑
     * @param unknown $keyword
     */
    public function find($keyword){
        $conditions = array();
        $conditions['keyword'] = array('eq', $keyword);
        $results = $this->_video_logic->findAll($conditions,'id desc');
        return $results;
    }
}