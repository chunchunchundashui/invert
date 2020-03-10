<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 16:58
 */

namespace app\admin\controller;


use think\Controller;

class Time extends Controller
{
    //总合调查显示首页面(调查时间)
    public function index(){

        if (request()->isGet()) {
            $personnel_id = input('id');
            $time = model('time')->indexlist($personnel_id);

          $this->assign([
                'personnel_id'=>$personnel_id,
                'time'=>$time
            ]);
        }
        return view();
    }
//    public function Timedel(){
//        if (request()->isAjax()){
//            $time =   input('time');
//            $ret = model('time')->del($time);
//            if ($ret ==null){//code
//                /*return json(['code'=>1,'msg'=>'删除成功','url'=>'index']);*/
//                return 1;
//            }
//            return 2;
//        }
//    }
}