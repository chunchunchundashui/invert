<?php

namespace app\index\model;

use think\Db;
use think\Model;

class Comp extends Base
{
    //
    public function indexdata($data){
        if ($data['pid'] == 2) {
            $list['teacher_name'] = Db::name('teacher')->field('id,tname')->where('id',$data['tid'])->find();   //任课老师
            session('tid',$list['teacher_name']['id']);
        }else {
            $list['class_name'] = Db::name('local')
                ->alias('a')
                ->field('a.*,b.tname')
                ->join('teacher b', 'a.teacher_class = b.id and b.main_id = 1')
                ->where('a.id',$data['lid'])->find();         //班主任
            session('cid',$list['class_name']['id']);
        }
        //��ʦ����,�༶����,�������,��
        $list['local_name'] = Db::name('Local')->field('id,name')->where('id',$data['lid'])->find();
        $list['personnel'] = Db::name('Personnel')->field('name,id')->where('id',$data['pid'])->find();
        session('lid',$list['local_name']['id']);
        session('pid',$list['personnel']['id']);
        return $list;
    }
    public function adddata($session,$data){

      $sess = Db::name('tanswer')->whereTime('time', 'month')->where($session)->select();
      if ($data != null) {
        $this->introAdd($session,$data);
      }
        //���������������;��޸�,�����������($sessΪ��)
      if ($session['personnel_id'] == 1) {
        if (null==$sess){
          $this->CompAdd($session,$data);
        }else{
          $this->CompEdit('tanswer',$data['achievement'],$session);
          //$ret = $this->CompEdit($session,$data);
        }
      }else{
        $this->CompEdit('tanswer',$data['achievement'],$session);
        //$ret = $this->CompEdit($session,$data);
      }
    }
}
/*
 * update ����  set number = number+1,fenshu = fenshu+�����Ƿ���
 */