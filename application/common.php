<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 拿值
// function position($data) {
// 	foreach ($data as $k => $v) {
// 		$string = implode('@', $v);
// 		$str = explode('@', $string);
// 		foreach ($str as $k1 => $v1) {
// 			$arr[] = array();
// 			$str1 = explode(':', $v1);
// 			foreach ($str1 as $k2 => $v2) {
// 				dump($v2);die;
// 				$arr[$str1[0]] = $v2[1];
// 			}
// 		}
// 	}
// 	return $arr;
// }

function position($data) {
	foreach ($data as $k => $v) {
			$string = implode('@', $v);
			$str = explode('@', $string);
			foreach ($str as $k1 => $v1) {
				$str1 = explode(':', $v1);
				$arr[$str1[0]] = $str1[1];
			}
	}
	return $arr;
}

// 拿名称
// function position1($data) {
// 	foreach ($data as $k => $v) {
// 		$string = implode('@', $v);
// 		$str = explode('@', $string);
// 		foreach ($str as $k1 => $v1) {
// 			$arr = array();
// 			$str1[] = explode(':', $v1);
// 			foreach ($str1 as $k2 => $v2) {
// 				$arr[] = $v2[0];
// 			}
// 		}
// 	}
// 	return $arr;
// }

// 字符串截取
function subText($text, $length) {
	if (mb_strlen($text, 'utf8') > $length) {
		return mb_substr($text,0,$length,'utf-8').'...';
	}
	return $text;
}
