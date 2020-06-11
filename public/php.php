<?php

$arr=array(3,2,1);
/*for($i=0; $i<count($arr); $i++){
    for($j=0; $j<count($arr)-1-$i; $j++){
        If($arr[$j] > $arr[$j+1]){
            $tmp=$arr[$j];
            $arr[$j]=$arr[$j+1];
            $arr[$j+1]=$tmp;
        }
    }
}*/
var_dump(date("Y-m-d",strtotime('+2 day')));die;
var_dump(date("Y-m-d",time()));
var_dump(strtotime('2010-03-24 08:15:42'));die;



for ($i = 0; $i < count($arr) ; $i++) {
    // 第二层为从$i+1的地方循环到数组最后
    for ($j = $i+1; $j < count($arr); $j++) {
        // 比较数组中两个相邻值的大小
        if ($arr[$i] > $arr[$j]) {
            $tem = $arr[$i]; // 这里临时变量，存贮$i的值
            $arr[$i] = $arr[$j]; // 第一次更换位置
            $arr[$j] = $tem; // 完成位置互换
        }
    }
}
var_dump($arr);die;
