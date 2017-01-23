<?php
namespace Dancer\Service;

use Apis\Logic\KeywordsLogic;
/**
 * 舞曲业务逻辑类
 * @author liziqiang
 *
 */
class WuquService  {
    private $_keywordsLogic = null;
    public function __construct(){
        $this->_keywordsLogic = new KeywordsLogic();
    }
    
    /**
     * 获取按a-z排序的，以此为键的数组，值未关键词数组
     * @example array('A'=>array('阿里山','阿哥'))
     */
    public function getAllLetterKeywords(){
        $tags = $this->_keywordsLogic->getTags();
        $words =  $this->_keywordsLogic->findAll();
        $result = array();
        foreach ($tags as $tk=> $tv){
            $result[$tv['tag']] = array();
            foreach ($words as $wk => $wv){
                if($wv['tag'] == $tv['tag']){
                    $result[$tv['tag']][] = $wv; 
                }
            }
        }
        
        return $result;
    }
}