<?php

namespace Broker\Service;

class BaseBroker {
	const _FAIL = 1;
	const _SUCCESS = 0;
	private $_items = null;
	// private $_bills = null;
	public function __construct() {
		$this->_items = array ();
		// $this->_bills = array();
	}
	protected function createItem($no, $name, $seconds, $size, $url) {
		$data = array (
				'no' => $no,
				'name' => trim ( $name ),
				'seconds' => $seconds, // 秒
				'size' => $size, // 字节
				'url' => trim ( $url ) 
		);
		
		$this->_items [] = $data;
		return $data;
	}
	public function createErrorMsg($error) {
		$this->_items = $error;
	}
	
	public function getItems(){
		return $this->_items;
	}
	
	public static function getResult($borker, $items) {
		if (is_string ( $items )) {
			return array (
					'code' => self::_FAIL,
					'msg' => $items,
					'borker' => $borker 
			);
		} else if (is_array ( $items )) {
			return array (
					'code' => self::_SUCCESS,
					'msg' => '成功',
					'borker' => $borker,
					'datas' => $items 
			);
		}
		
		return null;
	}
}