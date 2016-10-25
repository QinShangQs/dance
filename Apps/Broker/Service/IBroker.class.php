<?php
namespace Broker\Service;

interface IBroker {
	public function doing($url, $subid = 0);
}