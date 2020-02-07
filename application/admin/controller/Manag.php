<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;



class manag extends Base
{
    protected $Controller = 'manag';
    //列表
    public function lst()
    {
        $manag = model('manag')->getAllData();
        $viewData = [
            'manag' => $manag
        ];
        $this->assign($viewData);
        return view();
    }

    //添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $result = model('manag')->add($data);
            if ($result == 1) {
                $this->success('题目添加成功!', 'manag/lst');
            }else {
                $this->error($result);
            }
        }
        $manag = model('Personnel')->field('name, id')->where('status = 1')->select();
        $viewDate = [
            'manag' => $manag,
        ];
        $this->assign($viewDate);
        return view();
    }
    //修改
    public function edit()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            //            验证器
//            $validate = validate('manag');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = db('manag')->update($data);
            if ($save !== false) {
                $this->success('题目修改成功', 'manag/lst');
            }else {
                $this->error("题目修改失败!");
            }
        }
        $managEdit = db('manag')->find(input('id'));
        $personnel = db('personnel')->select();
        $viewData = [
            'managEdit' => $managEdit,
            'personnel' => $personnel
        ];
        $this->assign($viewData);
        return view();
    }
}