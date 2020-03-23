<?php
namespace app\index\controller;

use think\Session;

class Index extends Base
{
    public function index(){
            $data = input();
            $local = model('local')->BaseByYesAll(); //班级查询
            $personnel = model('personnel')->BaseByYes(); //查询方式
           return $this->fetch('',[
                'local'=>$local,
                'personnel'=>$personnel
            ]);
    }
    public function teacher_local_select(){
        //per_id调查分类   -------2为教师调查-------3为学生调查
        //id班级id
        $teacher = '';
        if(request()->isPost()){
            $data = input('post.',['id'=>0]);

          $per_id = $data['per_id'];
           if($per_id == 2){
               $teacher = model('teacher')->localByteacherByselect(['id'=>$data['id']]); //任课老师查询 这个是最新的代码需要传值
           }else if($per_id == 1){  //班主任老师//tname

               $teacher = model('teacher')->local_teacher($data['id']);
           }
            return $teacher;
        }
    }


}
