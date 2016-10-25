<?php
namespace Broker\Controller;
use Think\Controller;
use Broker\Service\BrokerFactory;
class TestController extends Controller {
    public function factory($url, $subid = 0){
        $result = BrokerFactory::doDataResult($url, $subid);
        
        pre($result);
    }
}