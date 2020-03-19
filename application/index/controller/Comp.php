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
//      $code = mt_rand(0,100000);
//      session('code', $code);
       $session = [
            'local_id'=>session('lid'),
            'teacher_id'=>session('tid'),
            'teacher_class'=>session('cid'),
            'personnel_id'=>session('pid'),
        ];
      $data = input('post.');
      $datas = $data['intro'];
      if ($session['personnel_id'] == 1) {
        foreach ($datas as $k => $v) {
          if (empty($v)) {
            return $this->error('意见不能为空');
          }
        }
      }else {
        if (empty($datas)) {
          return $this->error('意见不能为空');
        }
      }
        $list = model('comp')->adddata($session,$data['achievement']);
        $res = model('comp')->introAdd($session,$data['intro']);  //添加教师的评论
        if ($list&$res){
            $this->error('添加失败');
        }
        $this->success('添加成功', 'Comp/thanks');
    }

    public function thanks()
    {
      return view("yes/thanks");
    }
}

