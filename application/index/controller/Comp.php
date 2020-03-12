<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/8
 * Time: 15:41
 */

namespace app\index\controller;

use think\Db;
use think\Session;

class Comp extends Base
{
    /*
     * 综合满意度调查首页
     */
    public function index()
    {
        if (request()->isPost()) {
            $data = input('post.');

          //根据条件查询
            $list= model('comp')->indexdata($data);

          if ($data['pid'] == 2){

            $topic = model('topic')->BaseByTopicBySelect($data['pid']);
              $this->assign([
                'list' => $list,
                'topic' => $topic
              ]);
              return $this->fetch('teacher/index');
            }elseif ($data['pid'] == 1){

            $topic = model('topic')->StudentSelect($data['pid']);
            }
        }
        $this->assign([
            'list'=>$list,
            'topic'=> $topic
        ]);
       return $this->fetch('index/check');
    }
    public function add(){
       $session = [
            'local_id'=>session('lid'),
            'teacher_id'=>session('cid'),
            'personnel_id'=>session('pid'),
        ];
        $data = input('post.');
        $list = model('comp')->adddata($session,$data);

      $res = model('TeacherAnswerProposal')->AnswerProposalByAdd($other);  //添加教师的评论
        if($list && $res){
           return $this->redirect(url('yes/index'));
        }else{
            $this->error("添加失败!");
        }

    }
}

