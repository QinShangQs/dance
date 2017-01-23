<?php

namespace Apis\Crawler\Dancer\Videos;

class DefaultVideosWork implements IVideosWork{
	public function doing(){
		$d999 = new D999Videos();
		$d999Result = $d999->run();
		
		$Gcdwq = new GcwdqVideos();
		$GcdwqResult = $Gcdwq->run();
		
		$result = array_merge($d999Result,$GcdwqResult);
        return $result;
	}
}