<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/30
 * Time: 10:38
 */

namespace app\admin\controller;


class Comment extends Base
{
    protected $Controller = 'comment';
    
    //老师评论
    public function lst()
    {
        $data = input();
        $result = model('comment')->lst($data);
        $this->assign([
            'personnel_id'=>$data['personnel_id'],
            'create_time' => $result,
        ]);
        return view();
    }

//这个月所有老师的集合
    public function teacherLst()
    {
        if (request()->isGet()) {
            $data = input('');
          $result = model('comment')->teacherLst($data);
            $this->assign([
                'time'=>$data['create_time'],
                'teacherLst' => $result,
            ]);
        }
        return view('comment/teacherLst');
    }

    //班级对每个老师的评论
    public function classLst()
    {
        if (request()->isGet()) {
            $data = input();
            $result = model('comment')->classLst($data);
            $this->assign([
                'comment' => $result,
            ]);
        }
        return view('comment/classLst');
    }
    
    //删除本月时间
    public function del()
    {
        if (request()->isPost()) {
            $data = input();
            $result = model('comment')->timedel($data);
            if ($result) {
                $this->success('删除成功', 'index/index');
            }else {
                $this->error('删除失败');
            }
        }
    }


    public function delone()
    {
      if (request()->isPost()) {
        $data = input();
        $result = model('comment')->delone($data);
        if ($result) {
          $this->success('删除成功', 'index/index');
        }else {
          $this->error('删除失败');
        }
      }
    }
}