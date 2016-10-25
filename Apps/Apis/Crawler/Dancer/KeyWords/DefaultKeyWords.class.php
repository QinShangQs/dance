<?php

namespace Apis\Crawler\Dancer\KeyWords;

use Apis\Crawler\HttpHelper;

/**
 * 抓取热门关键字
 * 
 * @author zq
 *         来自99广场舞舞曲推荐
 */
class DefaultKeyWords implements IKeyWords {
	public function suggest() {
		$html = HttpHelper::file_get ( 'http://www.999d.com/' );
		
		$recs = preg_match_all ( '/class="mini" style="display:[\S\s]+?class="song">(\W+)<\/a>/i', $html, $outs );
		if ($recs) {
			return $outs [1];
		}
		return null;
	}
	public function hot() {
		$html = HttpHelper::file_get ( 'http://www.999d.com/' );
		
		$recs = preg_match_all ( '/class="mini">\s+<a target=".blank" href="\S+" class="song">(\W+)<\/a>/i', $html, $outs );
		if ($recs) {
			return $outs [1];
		}
		return null;
	}
	public function last() {
		$html = HttpHelper::file_get ( 'http://www.999d.com/' );
		
		$recs = preg_match_all ( '/<\/i>\s+<a target=".blank" href="\S+" class="song">(\S+)<\/a>/i', $html, $outs );
		if ($recs) {
			return $outs [1];
		}
		return null;
	}
}