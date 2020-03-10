<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/24
 * Time: 11:04
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    protected $Controller;
    public $model;
    public function _initialize()
    {
        $this->model=model($this->Controller);
        if (!session('?ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.id')) {
            $this->redirect('login/index');
        }
    }

    //继承列表页面
    public function lst()
    {
        $list = model($this->Controller)->BaseLst();
        $this->assign([
            'list'=>$list
          ]);
       return view();
    }

    //继承添加页面
    public function add()
    {
        if (request()->isPost()){
            $data = input('post.');
//            验证器
            $validate = validate($this->Controller);
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $res = model($this->Controller)->BaseByAdd($data);
            return $this->implement($res);
        }
        return view();
    }


    //继承添加页面
    public function edit(){
        if (request()->isPost()){
            $data = input();
            if (!empty($data['id'])){
                $res = model($this->Controller)->edit($data);
                return $this->implement($res);
            }
        }
        $data = input();
        $list = model($this->Controller)->find($data);
        return $this->fetch('', [
            'list' => $list
        ]);
    }

    //公共删除
    public function del(){
        $id = input('post.');
        $res = model($this->Controller)->del($id);
       return $this->implement($res);
    }

    protected function implement($res){
        if(true == $res){
           return json(array('code'=>'1', 'msg'=>"执行成功", 'data'=> '', 'url'=>url($this->Controller."/lst")));
        }else{
            return json(array('code'=>'0','msg'=>"执行失败", 'data'=> '', 'url'=>url($this->Controller."/add")));
        }
    }

}