<?php

namespace Apis\Service;

use Apis\Service\Dancer\KeyWordsWorkFactory;
use Apis\Service\Dancer\VideosWorkFactory;
class VideosApiServcie {
	public function keywords(){
		$instance = KeyWordsWorkFactory::create();
		$instance->doing();
	}

	public function videos(){
		$instance = VideosWorkFactory::create();
		$instance->doing();
	}
}