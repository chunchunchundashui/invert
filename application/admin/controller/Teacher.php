<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;


use think\Cache;

class Teacher extends Base
{
    protected $Controller = 'teacher';
    //列表
    public function lst()
    {
        $data = model('Teacher')->getAllData(1);
        $viewData = [
          'Teacher' => $data
        ];
        $this->assign($viewData);
        return view();
    }

    //添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = [
                'tname' => input('post.tname'),
                'main_id' => input('post.main_id'),
                'position_id' => input('post.position_id'),
            ];
            $result = model('Teacher')->add($data);
            if ($result == 1) {
                $this->success('老师添加成功!', 'Teacher/lst');
            }else {
                $this->error($result);
            }
        }
        $Teacher = model('Main')->field('mname, id')->where('status = 1')->select();
        $Position = db('Position')->field('pname, id')->where('status = 1')->select();

        $viewDate = [
            'teacher' => $Teacher,
            'position' => $Position,
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
//            $validate = validate('Teacher');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = db('Teacher')->update($data);
            if ($save !== false) {
                $this->success('老师修改成功', 'Teacher/lst');
            }else {
                $this->error("老师修改失败!");
            }
        }
        $teacherEdit = db('Teacher')->find(input('id'));
        $main = db('main')->select();
        $position = db('position')->select();
        $viewData = [
            'teacherEdit' => $teacherEdit,
            'main'=>$main,
            'position'=>$position
        ];
        $this->assign($viewData);
        return view();
    }

//导出题
  public function expData(){
    $class = input();
    dump($class);die;
    action('admin/Download/out',['class'=>$class,'table_name'=>'tanswer']);
  }
  
//  各部门的平均分下载
  public function expDataPos()
  {
    $position = Cache::get('name');
    action('admin/Download/position',['class'=>$position]);
  }

}