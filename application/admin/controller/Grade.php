<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;


class Grade extends Base
{
    protected $Controller = 'Grade';
    //列表
    public function lst()
    {
       $Grade = model('Grade')->getAllData();
      $viewData = [
           'Grade' => $Grade,
        ];
        $this->assign($viewData);
        return view();
    }

//继承添加页面
  public function add()
  {
    if (request()->isPost()){
      $data = input('post.');
//            验证器
      $validate = validate('grade');
      if (!$validate->check($data)) {
        $this->error($validate->getError());
      }
      $res = model('grade')->add($data);
      if ($res !== false ) {
        $this->success('添加成功', 'Grade/lst');
      }else {
        $this->error("添加失败");
      }
    }
    return view();
  }

    //修改
    public function edit()
    {
      if (request()->isAjax()) {
        $data = input('post.');
        $result = db('class')->update($data);
        if ($result !== 0) {
          $this->success('修改成功', 'Grade/lst');
        }else {
          $this->error("添加失败");
        }
      }
      $grade = db('class')->find(input('id'));
      $this->assign([
        'grade' => $grade
      ]);
      return view();
    }

  public function del()
  {
      if (request() -> isAjax()) {
        $data = input('post.');
        $result = db('class')->delete($data['id']);
        if ($result !== false) {
          $this->success('删除成功', 'grade/lst');
        }else {
          $this->error('删除失败');
        }
        }
    }
}