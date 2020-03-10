<?php
namespace app\admin\controller;



class Index extends Base
{
    protected $Controller = 'index';

    //后台首页
    public function index()
    {
        return view();
    }

    //退出账号
    public function outLogin()
    {
        session(null);
        if (session('?ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.id')) {
            $this->error('退出失败!');
        }else {
            $this->success('退出成功','admin/login/index');
        }
    }
}
