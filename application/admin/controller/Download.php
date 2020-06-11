<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/13
 * Time: 11:56
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;


class Download extends Controller
{
    public function out($avg,$id)
    {
        $out = new Out();
        if ($id == 1) {
            if($avg[0][0]['personnel_id'] == 1) {
                $tablename = "学生综合满意度具体老师";
                $arr =['题目名称', '调查方式名称','班级名称', '班主任名称','平均分','总分', '时间', '状态', '浏览数'];
            }else {
                $tablename = "教师综合满意度具体老师";
                $arr =['题目名称', '调查方式名称','班级名称', '教师名称','平均分','总分', '时间', '状态', '浏览数'];
            }
        }else {
            if($avg['personnel_id'] == 1) {
                $tablename = "学生综合满意度";
                $arr =['班主任名称','班级名称', '浏览数', '平均分', '时间', '状态'];
            }else {
                $tablename = "教师综合满意度";
                $arr =['教师名称','班级名称', '浏览数', '平均分', '时间', '状态'];
            }
        }
        foreach ($avg[0] as $k=>$v){

            $v['time'] = date("Y-m-d H:i",$v['time']);
            $avg[0][$k]=$v;
        }
        $data = $avg[0];
        foreach ($data as &$row){
            if ($id == 1) {
                $row['personnel_id']='学生满意度调查';
            }else {
                unset($row['lid']);
                unset($row['tid']);
                unset($row['ac']);
            }
            $row['time'] = date($row['time']);
            $row['status'] = $row['status'] == 1?'正常':'异常';
        }
        $out->exportExcel($arr, $data,$tablename,$tablename,'','true');
        die;
    }


//    打印部门分数
  public function position($class)
  {
    $out = new Out();
    $tablename = "部门评分";
    $arr =['编号', '部门','总分', '平均分','参考人数','时间', '状态'];
    unset($class['personnel_id']);
    foreach ($class[0] as $k=>$v){
      unset($v['lid']);
      unset($v['tid']);
      $v['time'] = date("Y-m-d H:i",$v['time']);
      $class[0][$k]=$v;
    }
    $data = $class[0];
    foreach ($data as &$row){
      $row['time'] = date($row['time']);
      $row['status'] = $row['status'] == 1?'正常':'异常';
    }
    $out->exportExcel($arr, $data,$tablename,$tablename,'','true');
    die;
  }

public function department($data){
        $out = new Out();
        $tablename = "综合部门评分";
        $arr =['编号', '部门','参考人数','时间', '成绩'];
    foreach ($data as $k=>$v){
      unset($v['browse']);
       $v['time'] = date("Y-m-d H:i",$v['time']);
       $data[$k] = $v;
    }
    $out->exportExcel($arr, $data,$tablename,$tablename,'','true');
    die;
}
//  导出评论
  public function comment($table_name = '', $comment)
  {
    $teacher_id = $comment['teacher_id'];
    $personnel_id = $comment['personnel_id'];
    $local_id = $comment['local_id'];
    $create_time = $comment['create_time'];
    $db = new Db();
    // 连接数据库
    $sql = "select c.id as pid,a.teacher_id,a.personnel_id,a.local_id,b.id,b.tname,c.name as pname,d.id as lid, d.name as lname,e.id as cid, e.name as classroom,a.comment,a.create_time,a.status from {$table_name} as a
            inner join 
            teacher b on b.id = '$teacher_id' and b.id = a.teacher_id
            inner join
            personnel c on c.id = '$personnel_id' and c.id = a.personnel_id
            inner join 
            local d on d.id = '$local_id' and d.id = a.local_id
            inner join
            class e on e.id = d.name
            AND (from_unixtime(a.create_time,'%Y-%m')= '$create_time')
            ";
    $data = $db::query($sql);
    // 导出数据
    foreach ($data as $key => $value) {
      # code...
      $data[$key]['pid'] = $data[$key]['pname'];
      unset($data[$key]['pname']);
      $data[$key]['cid'] = $data[$key]['classroom'];
      unset($data[$key]['classroom']);
      $data[$key]['teacher_id'] = $data[$key]['tname'];
      unset($data[$key]['tname']);

      unset($data[$key]['lname']);
      unset($data[$key]['lid']);
      unset($data[$key]['id']);
      unset($data[$key]['local_id']);
     /*$list= explode( ",",$data[$key]['comment']);
      dump($data[$key]);die;
       dump(array_column($student,null,'no'));die;
     $tt= array($data[$key],$list);
     */

    }

    // 结束
        // $table_comment=$db::query("select TABLE_COMMENT from information_schema.TABLES where TABLE_NAME='".$table_name."'
        //     and TABLE_SCHEMA='".config('database.database')."'");  //查看表备注
    // 随机数生成
        // $tablename = time().mt_rand(100000,999999);
    $tablename = "评论信息";
        $out = new Out();
    if ($data[$key]['personnel_id'] == 1) {
          $arr = ['类型名称', '班主任名称', '班级名称', '评论','添加时间','状态'];
        }else {
          $arr = ['类型名称', '老师名称', '班级名称', '评论','添加时间','状态'];
        }
    foreach ($data as &$row){
          unset($row['personnel_id']);
//            $row['add_time'] = date('Y-m-d H:i:s',$row['add_time']);
            $row['create_time'] = date('Y-m-d', $row['create_time']);
            $row['status'] = $row['status'] == 1?'正常':'异常';
        }
      $out->exportExcel($arr, $data,$tablename,$tablename,'','true');
        die;
}
}