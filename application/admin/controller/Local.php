<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;


class Local extends Base
{
    protected $Controller = 'local';
    //列表
    public function lst()
    {
       $local = model('local')->getAllData();
        $viewData = [
           'local' => $local,
        ];
        $this->assign($viewData);
        return view();
    }

    //添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $result = model('Local')->add($data);
            if ($result == 1) {
                $this->success('班级添加成功!', 'local/lst');
            }else {
                $this->error($result);
            }
        }
        $localClass = db('local')->field('id, teacher_id')->select();
        $teacher = db('teacher')->field('tname,main_id, id')->where('status = 1')->select();
        $main = db('main')->field('id,mname')->where('status = 1')->find();
        $viewDate = [
            'localClass' => $localClass,
            'teacher' => $teacher,
            'main' => $main
        ];
        $this->assign($viewDate);
        return view();
    }


    //修改
    public function edit()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $local = model('local')->where('id',$data['id'])->update($data);
            if ($local == 1) {
                $this->success('班级修改成功', 'local/lst');
            }else {
                $this->error("班级修改失败!");
            }
        }else {
            $id = input('id');
            $localEdit = db('local')
                ->alias('a')
                ->where('a.id',$id)
                ->field('a.*,b.tname')
                ->join('teacher b', 'a.teacher_id = b.id')
                ->find(input('id'));
            $teacher = model('teacher')->select();
            $viewData = [
                'localEdit' => $localEdit,
                'teacher' => $teacher
            ];
            $this->assign($viewData);
        }
        return view();
    }

    //导入班级信息
//    public function import(){
//        action('admin/Excel/impUser',['table_name'=>'local']);
//    }
}