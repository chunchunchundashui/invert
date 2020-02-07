<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;


class User extends Base
{
    protected $Controller = 'user';
    //列表
    public function lst()
        {

        $user = model('user')->order('id','asc')->where('status = 1 || status = 0')->paginate(10);
        $viewData = [
          'user' => $user
        ];
        $this->assign($viewData);
        return view();
    }


    //添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $result = model('user')->add($data);
            if ($result == 1) {
                $this->success('用户添加成功!', 'user/lst');
            }else {
                $this->error($result);
            }
        }
        return view();
    }


    //修改
    public function edit()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            //            验证器
//            $validate = validate('user');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = model('user')->edit($data);

            if ($save == 1) {
                $this->success('用户修改成功', 'user/lst');
            }else {
                $this->error($save);
            }
        }
        $user = db('user')->find(input('id'));
        $viewData = [
            'user' => $user
        ];
        $this->assign($viewData);
        return view();
    }
}