<?php

namespace Apis\Crawler\Dancer\Videos;

use Apis\Crawler\HttpHelper;
use Think\Log;

class D999Videos extends BaseVideos implements IVideos {
	const _PAGE_LIMIT = 3;
	public function run($keyword = null) {
		for($i = 0; $i < static::_PAGE_LIMIT; $i ++) {
			$api = 'http://www.999d.com/index.php?v=video&tid=0&type=new&difficulty=0&ajax=1&page=' . $i . '&_=' . time ();
			$jsonStr = HttpHelper::file_get ( $api );
			$json = json_decode ( $jsonStr, true );
			if (empty ( $json )) {
				Log::write ( '999d已无数据可抓' );
				break;
			} else if (! is_array ( $json )) {
				Log::write ( '999d数据不是数组:' . $jsonStr );
				break;
			}
			
			$domain = "http://www.999d.com";
			foreach ( $json as $k => $v ) {
				parent::createResult($v['title'], $v['alias'], parent::V_TYPE_VIDEOS, 
 						'99广场舞', $v['song_title'], $v['thumb'], $domain.$v['url'], $v['duration'], $v['team_title'], $v['updatetime']);
			}
			
			sleep ( 1 );
		}
		
		return parent::getResults ();
	}
}
