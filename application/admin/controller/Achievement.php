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
        $this->assign([
            'time'=>$time
        ]);
        return $this->fetch('teacher/time');
    }

    public function timedel(){
        if (request()->isAjax()){
            $time =   input('time');
            $ret = model('achievement')->timedel($time);
            if ($ret ==null){//code
                /*return json(['code'=>1,'msg'=>'删除成功','url'=>'index']);*/
                return 1;
            }
            return 2;
        }
    }

    //显示出月份对应的老师调查分类数据
    public function teacher(){
        if (request()->isGet()){
            $data = input();
//            dump($data);die;
            $list = model('achievement')->indexlist($data);

          $this->assign([
                'data'=>$data,
                'list'=>$list
            ]);
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
            $list = model('achievement')->Summation($id);
            $this->assign([
                'list'=>$list
            ]);
            return $this->fetch('achievement/copic');
        }
    }
}