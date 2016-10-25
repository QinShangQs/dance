<?php
/**
 * +----------------------------------------------------------
 * 原样输出print_r的内容
 * +----------------------------------------------------------
 *
 * @param string $content
 *        	待print_r的内容
 *        	+----------------------------------------------------------
 */
function pre($content) {
	echo "<pre>";
	print_r ( $content );
	echo "</pre>";
}

/**
 * 验证验证码
 *
 * @param
 *        	$code
 * @param string $id
 * @return bool
 */
function check_verify($code, $id = '') {
	$verify = new \Think\Verify ();
	return $verify->check ( $code, $id );
}
