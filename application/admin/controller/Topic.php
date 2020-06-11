<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;

class Topic extends Base
{
    protected $Controller = 'topic';

    //列表
    public function lst()
    {
        $data = model('topic')->getAllData();
        $viewData = [
          'topic' => $data,
        ];
        $this->assign($viewData);
        return view();
    }

    //添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $result = model('topic')->add($data);
            if ($result == 1) {
                $this->success('调查问题添加成功!', 'topic/lst');
            }else {
                $this->error($result);
            }
        }
        $pers = db('personnel')->field('id,name')->where('status = 1')->select();
        $manag = db('manag')->field('id,mname')->where('status = 1')->select();
        $viewDate = [
            'pers' => $pers,
            'manag' => $manag
        ];
        $this->assign($viewDate);
        return view();
    }
    //修改
    public function edit()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $topic = model('topic')->edit($data);
            if ($topic == 1) {
                $this->success('调查问题修改成功', 'topic/lst');
            }else {
                $this->error("调查问题修改失败!");
            }
        }else {
            $id = input('id');
            $topicEdit = model('topic')
                ->alias('a')
                ->field('a.*,b.name,c.mname')
                ->join('personnel b', 'a.personnel_id = b.id')
                ->join('manag c', 'a.manag_id = c.id')
                ->where('a.id',$id)
                ->find($id);
            $personnel = model('personnel')->select();
            $manag = model('manag')->select();
            $viewData = [
                'topicEdit' => $topicEdit,
                'personnel' => $personnel,
                'manag' => $manag
            ];
            $this->assign($viewData);
        }
        return view();
    }
}