<?php
namespace app\index\controller;

class Student extends Base
{
    public function index()
    {
        if(request()->isGet()){
            $data = input('get.');
            dump($data);die;
            //根据条件查询
            $personnel = model('Personnel')->where('id',$data['type'])->find();
            $Local = model('Local')->where('id',$data['class'])->find();
            $teacher = model('teacher')->where('id',$data['teacher'])->find();
            session('personnel_id',$personnel['id']);
            session('local_id',$Local['id']);
            session('teacher_id',$teacher['id']);
            $topic = model('topic')->BaseByTopicBySelect($personnel['id']);
            $manag = model('manag')->BaseByManagBySelect($personnel['id']);
        }
        return $this->fetch('',[
            'local' => $Local->name,
            'teacher' => $teacher->name,
            'topic'=>$topic,
            'manag'=>$manag
        ]);
    }

    public function save(){
            if(request()->isPost()){
                $data = input('post.');
                //数据入库
                $number = null;
                $other=$data['other'];
                unset($data['other']);
                foreach ($data as $key=>$val){
                    $number += $val;
                }
                $mode = [
                    'personnel_id' => session('personnel_id'),
                    'local_id'     => session('local_id'),
                    'teacher_id'   => session('teacher_id'),
                    'number'        =>$number,
                    'text'          =>$other
                ];
               // var_dump($mode);die;
            //验证数据
    //            $validate = validate('Student');
    //            if(!$validate->scene('add')->check($data)){
    //                $this->error($validate->getError());
                $res = model('Mode')->mode_add($mode);
                if($res){
                    $this->success('提交成功');
                }else{
                    $this->error('提交失败');
                }
            }
        }

}
