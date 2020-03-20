<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 17:27
 */

namespace app\common\model;

use catetree\Catetree;
use think\Db;
use think\Model;

class Achievement extends Model
{
  public function indexlist($data){
    if ($data['personnel_id'] == 3){
      $lsit = "personnel_id > 0";
    }else {
      $lsit = "ta.personnel_id = {$data['personnel_id']}";
    }
    //计算老师的总合评分:返回老师name和分数
    $list =Db::table('tanswer')
      ->alias('ta')
      //->where($lsit)
      ->where("from_unixtime(time,'%Y-%m')='{$data['time']}'")
      ->where($lsit)
      ->field('te.id as tid,ta.personnel_id,te.tname,local.name,local.id as lid,ta.time,te.status,te.id,ta.achievement,ta.browse,po.pname,po.id as poid')
      ->join('teacher te','ta.teacher_id = te.id')
      ->join('local','ta.local_id =local.id')
      ->join('position po','te.position_id = po.id')
      ->select();
//    dump(Db::table('tanswer')->getLastSql());die;
    //dump($list);die;
    $tree = new Catetree();
    if ($data['personnel_id'] ==3){
      $lists = $tree->positionlist($list);
    }else{
      $lists = $tree->indexlist($list);
    }
    return $lists;
  }
  //查询出当用户点击某一时间断是返回这一时间段学生调查的结果
  public function Timequery($time){
    $list = Db::name('tanswer')
      ->alias('ta')
      ->join('teacher','ta.teacher_id =teacher.id')
      ->join('local','ta.local_id =local.id')
      ->where("from_unixtime(time,'%Y-%m')='{$time}'")
      ->select();
    return $list;

  }

  public function timelist(){
    $list =Db::name('tanswer')
      ->field("from_unixtime(time,'%Y-%m') as 'time'")
      ->group('time')
      ->paginate(5);
    return $list;
  }
  public function Summation($id){
    //老师表

    $list =Db::table('tanswer')
      ->alias('t')
      ->where(['t.local_id'=>$id['local_id'],'t.personnel_id'=>$id['personnel_id']])
      ->where("from_unixtime(t.time,'%Y-%m')='{$id['time']}'")
      ->field('t.achievement,t.topic_id,to.topic,te.create_time,lo.name,te.tname,t.browse')
      ->join('teacher te','t.teacher_id = te.id')
      ->join('topic to','t.topic_id = to.id')
      ->join('local lo','t.local_id = lo.id')
      ->select();
    //->paginate(2);

    $tree = new Catetree();
    $lists = $tree->sortlist($list);
    return $lists;
  }
  public function company(){
    $id=[
      't.personnel_id' =>3,
    ];
    $data =Db::table('tanswer')
      ->alias('t')
      ->where($id)
      ->field('to.manag_id as mid,t.achievement,t.topic_id,to.topic,te.create_time,lo.name,te.tname,t.browse,t.topic_id,ma.mname as mname')
      ->join('teacher te','t.teacher_id = te.id')
      ->join('topic to','t.topic_id = to.id')
      ->join('local lo','t.local_id = lo.id')
      ->join('manag ma','t.topic_id = ma.id')
      ->select();
//      dump(Db::table('tanswer')->getLastSql());die;

    $tree = new Catetree();
    $list = $tree->CateCompany($data);
    return $list;
  }

//  单个删除分数
  public function commondel($data)
  {
    if ($data['personnel_id'] ==3){//各部门满意度
      $where['personnel_id']=['>=',1];
      $where['po.id']=$data['id'];
      $json= ['local lo','te.id = lo.teacher_id'];
      //dump($where);die;
    }else{//教师满意度
      $where['local_id']=$data['lid'];
      $where['personnel_id']=$data['personnel_id'];
      $where['a.teacher_id']=$data['tid'];
      if ($data['personnel_id']==2){
        $json= ['local lo','te.id = lo.teacher_id'];
      }else{
        $json= ['local lo','te.id = lo.teacher_class'];
      }
    }
    $list = Db::name('tanswer')
      ->alias('a')
      ->field('a.id')
      ->where($where)
      ->where("from_unixtime(time,'%Y-%m')='{$data['time']}'")
      ->join('teacher te','a.teacher_id = te.id')
      ->join('position po','te.position_id = po.id')
      ->join($json)
      ->select();
    $tree = new Catetree();
    $model = Db::name('tanswer');
    $ret = $tree->delid($list,$model);
    return $ret;
  }
}