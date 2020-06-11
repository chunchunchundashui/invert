<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 17:01
 */

namespace app\common\model;

use catetree\Catetree;
use think\Controller;
use think\Db;
use think\Model;

class Time  extends Controller
{
    public function indexlist($personnel_id){
     if ($personnel_id == 3 ||$personnel_id ==4){
        $lsit = "personnel_id > 0";
      }else {
        $lsit = "personnel_id = {$personnel_id}";
      }
        $list = Db::name('tanswer')
          ->where($lsit)
          ->field("from_unixtime(time,'%Y-%m') as 'time'")
          ->group('time')
          ->select();
      if ($list == null){
            //如果数据库中不存在相关数据的话就返回空
            return '';
        }
      foreach($list as $v) $res[$v['time']] = $v;

      return $res;
    }


  /*
  * 公共删除(学生/老师/各部门)
  */
  public function timedel($data)
  {
    if ($data['personnel_id'] ==3){
      $personnel_id= "personnel_id > 0";
    }else{
      $personnel_id = "personnel_id = {$data['personnel_id']}";
      //dump($lists);die;
    }
    $list = Db::name('tanswer')
      ->field('id')
      ->where($personnel_id)
      ->where("from_unixtime(time,'%Y-%m')='{$data['time']}'")
      ->select();
    $tree = new Catetree();
    $model = Db::name('tanswer');
    $ret = $tree->delid($list,$model);
    return $ret;
  }
    // 根据时间查询各大题
    public function manag ($data)
    {
        $list = Db::name('tanswer')
            ->alias('a')
            ->field("a.topic_id, b.id as tid, c.id as cid, c.mname,from_unixtime(a.time,'%Y-%m') as 'time'")
            ->join('topic b', 'a.topic_id = b.id')
            ->join('manag c', 'b.id = c.id')
            ->group('a.time')
            ->select();
      dump($list);die;
        if ($list == null) {
            return '';
        }
        foreach($list as $v) $res[$v['time']] = $v;
        return $res;
    }
}