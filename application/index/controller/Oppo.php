<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Oppo extends Controller
{
   public function index(){
       $data = array(
           'id','name','time'
       );
       $data1 = array(
           2,'name',time()
       );
       $data2 = array(
          ['id'=>1],
          ['id'=>2],
          ['id'=>3],
          ['id'=>4]
       );
       dump(array_combine($data,$data1));//合并数组
       dump('-------------------');
       dump(array_diff($data1,$data));//返回两个数组不相同的数据
       dump('-------------------');
       dump(array_chunk($data,2));
       dump('-------------------');
       dump(array_slice($data2,0,2));//去除某一数组
       dump('-------------------');
      // dump(array_unique($data,$data1));
       $files = fopen("E:\phpstudy_pro\WWW\invest\application\index\controller\ind.html","r");//mode规定您请求到该文件/流的访问类型
       $url ="https://www.baidu.com";
       $str=file_get_contents($url);
       $time1 = '2007-2-5';
       $time2 = '2007-3-6';
       $time1 = strtotime($time1);
       $time2 = strtotime($time2);
       dump(($time2-$time1)/86400);die;
       fread("E:\phpstudy_pro\WWW\invest\application\index\controller\ind.html");
      $kk =  file_get_contents("E:\phpstudy_pro\WWW\invest\application\index\controller\ind.html");//读取文件

   }
   public function __call(){
       dump(1111);die;
   }
   public function add(){
       $this->laravel(111);
   }
}
