<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 17:24
 */

namespace app\admin\controller;


use think\Controller;

class Achievement extends Controller
{
  public function index(){
    $time = model('achievement')->timelist();
//    dump($time);die;
    $this->assign([
      'time'=>$time
    ]);
    return $this->fetch('teacher/time');
  }

  //显示出月份对应的老师调查分类数据
  public function teacher(){
    if (request()->isGet()){
      $data = input();
      $list = model('achievement')->indexlist($data);
      $this->assign([
        'data'=>$data,
        'list'=>$list
      ]);
    }
    if ($data['personnel_id'] ==3){
      return view('time/position');
    }
    return view('time/sort');
  }

  //学生满意度调查对应的各部门评分
  public function company(){
    $list = model('achievement')->company();
    $this->assign([
      'list'=>$list
    ]);
    return $this->fetch('achievement/company');
  }

  //显示班级对应的题目平均分
  public function sort(){
    if (request()->isGet()){
      $id = input();
//            $download = model('');
//            dump($id);die;
      $list = model('achievement')->Summation($id);

      $this->assign([
        'id' => $id,
        'list'=>$list
      ]);
      return $this->fetch('achievement/copic');
    }
  }

//  单个删除分数
  public function commondel(){
    if (request()->isAjax()){
      $data = input();
      $ret = model('Achievement')->commondel($data);
      if ($ret ==null){
        $this->success('删除成功', 'index/index');
      }
      $this->error('删除失败');
    }
  }
}