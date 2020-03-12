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
    public function out($table_name ='', $class)
    {
      /**
         * 地址:https://github.com/PHPOffice/PHPExcel    下载PHPExcel，下载后只需要Classes目录下的文件即可。
         * 数据导出
         * @param array $title 标题行名称
         * @param array $data 导出数据
         * @param string $fileName 文件名
         * @param string $savePath 保存路径
         * @param $type   是否下载  false--保存   true--下载
         * @return string   返回文件全路径
         */
//      实现打印对表
      $classL = $class['local'];
      $classR = $class['teacher'];
      $dbn = db('local')
        ->alias('a')
        ->field('a.name,a.id as lid,b.tname,b.id as tid')
        ->join('teacher b', "b.tname = '$classR'")
        ->where("a.name = '$classL'")
        ->select();
      $new = [];
      foreach($dbn as $v=>$k){
        foreach($k as $key=>$val){
          $new[$key] = $val;
        }
      }
        $lid = $new['lid'];
        $tid = $new['tid'];


//        需要topic_id personnel_id local_id teacher_id
      //  $table_name = isset($table_name)?$table_name:'mode';

        $db =  new Db(); //实例化db类

//        $data = $db::query("select * from {$table_name} where `local_id`= $lid AND `teacher_id` = $tid"); //查询数据
        $data = $db::query("select a.*,b.topic,c.`name`,e.`name` as lname,d.tname from {$table_name} as `a` inner join topic as b on a.topic_id = b.id inner join personnel as c on c.id = a.personnel_id inner join local as e on e.id = a.local_id inner join  teacher as d on d.id = a.teacher_id   where a.`local_id`= $lid AND a.`teacher_id` = $tid"); //查询数据

//     导出只要的数据
      foreach ($data as $key => $value){
        $data[$key]['topic_id'] = $data[$key]['topic'];
        unset($data[$key]['topic']);
        $data[$key]['personnel_id'] = $data[$key]['name'];
        unset($data[$key]['name']);
        $data[$key]['local_id'] = $data[$key]['lname'];
        unset($data[$key]['lname']);
        $data[$key]['teacher_id'] = $data[$key]['tname'];
        unset($data[$key]['tname']);

      }

//      结束
        $table_comment=$db::query("select TABLE_COMMENT from information_schema.TABLES where TABLE_NAME='".$table_name."'
            and TABLE_SCHEMA='".config('database.database')."'");  //查看表备注
        $table_type = $db::query("show full fields from ".$table_name);
        $out = new Out();

        //var_dump($table_type);die;
        $tablename = $table_comment[0]['TABLE_COMMENT'];
        $arr = [];
        foreach ($table_type as $table){
            $arr[] =  $table['Comment'];
        }
        foreach ($data as &$row){
//            $row['add_time'] = date('Y-m-d H:i:s',$row['add_time']);
            $row['time'] = date($row['time']);
            $row['status'] = $row['status'] == 1?'正常':'异常';
        }
        $out->exportExcel($arr, $data,$tablename,$tablename,'','true');
        die;

    }

}