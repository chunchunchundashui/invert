<?php

namespace app\index\model;

use think\Db;
use think\Model;

class Comp extends Base
{
  //
  public function indexdata($data){
      if ($data['pid'] == 2) {
        $list['teacher_name'] = Db::name('local')
          ->alias('a')
          ->field('a.*,b.tname')
          ->join('teacher b', 'a.teacher_id = b.id and b.main_id = 2')
          ->where('a.id',$data['tid'])->find();   //任课老师
        session('tid',$list['teacher_name']['teacher_id']);
      }else {
        $list['class_name'] = Db::name('local')
          ->alias('a')
          ->field('a.*,b.tname')
          ->join('teacher b', 'a.teacher_class = b.id and b.main_id = 1')
          ->where('a.id',$data['lid'])->find();   //班主任
        session('cid',$list['class_name']['teacher_class']);
      }

    $list['local_name'] = Db::name('Local')->field('id,name')->where('id',$data['lid'])->find();
    $list['personnel'] = Db::name('Personnel')->field('name,id')->where('id',$data['pid'])->find();
    session('lid',$list['local_name']['id']);
    session('pid',$list['personnel']['id']);
    return $list;
  }
  public function adddata($session,$data){
    if ($session['personnel_id'] == 1) {
      $session['teacher_id'] = $session['teacher_class'];
      unset($session['teacher_class']);
      $sess = Db::name('tanswer')->whereTime('time', 'month')->where($session)->select();
    }else {
      $session['teacher_id'];
      unset($session['teacher_class']);
      $sess = Db::name('tanswer')->whereTime('time', 'month')->where($session)->select();
    }
    if ($session['personnel_id'] == 1) {
//      dump(456);die;
      if (null==$sess){
//        dump(132);die;
        $this->CompAdd($session,$data);
      }else{
//        dump(789);die;
        $this->CompEdit('tanswer',$data,$session);
        //$ret = $this->CompEdit($session,$data);
      }
    }else{
//     dump(789123);die;
      //unset($session['teacher_class']);
        if (null==$sess){
//        dump(132);die;
            $this->CompAdd($session,$data);
        }else{
//        dump(789);die;
            $this->CompEdit('tanswer',$data,$session);
        }
    }
  }

}
