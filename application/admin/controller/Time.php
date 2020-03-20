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
  /*
    * 公共删除(学生/老师/各部门)
    */
  public function timedel(){
    if (request()->isAjax()){
      $data = input();
      $ret = model('time')->timedel($data);
      if ($ret ==null){//code
        $this->success('删除成功');
      }
      $this->error('删除失败');
    }
  }
}