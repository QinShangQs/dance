<?php

namespace Apis\Crawler\Dancer\Videos;

class DefaultVideosWork implements IVideosWork{
	public function doing(){
// 		$d999 = new D999Videos();
// 		$d999Result = $d999->run();
// 		return $d999Result;
		
		$Gcdwq = new GcwdqVideos();
		$GcdwqResult = $Gcdwq->run();
		
		return $GcdwqResult;
	}
}