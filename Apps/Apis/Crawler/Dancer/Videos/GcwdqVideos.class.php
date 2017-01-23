<?php

namespace Apis\Crawler\Dancer\Videos;

use Apis\Crawler\HttpHelper;
use Think\Log;
class GcwdqVideos extends BaseVideos implements IVideos {
	const _PAGE_LIMIT = 100;
	public function run($keyword = null) {
		for($i = 0; $i < static::_PAGE_LIMIT; $i ++) {
			$api = 'http://www.gcwdq.com/gcw/new/index'.($i == 0 ? "":("_".($i+1))).'.html';
			$html = HttpHelper::file_get ( $api );
			$rcs = preg_match_all('/<a href="\/gcwdq\/(\d+).html"><img src="(\S+?)" alt="([\s\S]+?)" width="160" height="100"><\/a>/i', $html, $outs);
			//var_dump($html);
			if (empty($rcs)) {
				Log::write ( 'Gcwdq没有抓到页面数据' );
				break;
			} 
				
			$domain = "http://www.gcwdq.com";
			$ids = $outs[1];
			$logos = $outs[2];
			$names = $outs[3];

			for ($j = 0; $j < $rcs; $j ++){
				$id = $ids[$j];
				$link_url = $domain."/gcwdq/{$id}.html";
				$logo = $domain.$logos[$j];
				$name = iconv('gbk', 'utf-8', $names[$j]);
				$keyword = $name;
				$publish_date = date('Y-m-d H:i:s');
				parent::createResult($name, $name, parent::V_TYPE_VIDEOS, '广场舞大全', $keyword, $logo, $link_url, 0, '', $publish_date);
			}
				
			sleep ( 1 );
		}
	
		return parent::getResults ();
	}
}