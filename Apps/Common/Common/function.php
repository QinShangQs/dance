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
function pre($content)
{
    echo '<meta charset="UTF-8">';
    echo "<pre>";
    print_r($content);
    echo "</pre>";
}

function video_play($url)
{
    echo '<video controls="" autoplay="" name="media"><source src="' . $url . '" type="video/mp4"></video>';
}

/**
 *
 * @return Y-m-d H:i:s 格式日期
 */
function date_ymhHis()
{
    return date("Y-m-d H:i:s", time());
}

/**
 * 验证验证码
 *
 * @param
 *            $code
 * @param string $id            
 * @return bool
 */
function check_verify($code, $id = '')
{
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function array2object($array)
{
    if (is_array($array)) {
        $obj = new \stdClass();
        foreach ($array as $key => $val) {
            $obj->$key = $val;
        }
    } else {
        $obj = $array;
    }
    return $obj;
}

function object2array($object)
{
    if (is_object($object)) {
        foreach ($object as $key => $value) {
            $array[$key] = $value;
        }
    } else {
        $array = $object;
    }
    return $array;
}