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


class PHPExcel extends Controller
{
    public function out($class)
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
        $out = new Out();
        $arr= ['授课老师','班级','参考人数','平均分','总成绩','时间','状态'];
        if ($class['personnel_id']==1){//学生成绩
            //unset();
            $tablename ='学生满意度调查';
            $arr[0] ='班主任';
        }elseif ($class['personnel_id']==2){//老师成绩
            $tablename ='老师满意度调查';
            $arr[0]= '任课老师';
        }else{//各部门成绩
            $tablename ='各部门满意度调查';
            $arr =['编号','部门','平均分','参考人数','时间','状态'];
        }
        unset($class['personnel_id']);

        //$data = $class[0];
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

}