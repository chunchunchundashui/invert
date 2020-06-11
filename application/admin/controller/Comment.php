<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/30
 * Time: 10:38
 */

namespace app\admin\controller;


use PDO;
use think\Cache;
use think\Db;

class Comment extends Base
{
    protected $Controller = 'comment';
    
    //老师评论
    public function lst()
    {
        $data = input();
        $result = model('comment')->lst($data);
        $this->assign([
            'personnel_id'=>$data['personnel_id'],
            'create_time' => $result,
        ]);
        return view();
    }

//这个月所有老师的集合
    public function teacherLst()
    {
        if (request()->isGet()) {
            $data = input('');
          $result = model('comment')->teacherLst($data);
          $this->assign([
                'data'=>$data,
                'teacherLst' => $result,
            ]);
        }
        return view('comment/teacherLst');
    }

    //班级对每个老师的评论
    public function classLst()
    {
        if (request()->isGet()) {
            $data = input();
            $manag = db('manag')->field('id,mname,personnel_id')->where('status',1)->select();
            // dump($man);die;
            $result = model('comment')->classLst($data);
            // dump($result);die;
            $this->assign([
                'comment' => $result,
                'manag' => $manag,
            ]);
        }
        return view('comment/classLst');
    }
    
    //删除本月时间
    public function del()
    {
        if (request()->isPost()) {
            $data = input();
            $result = model('comment')->timedel($data);
            if ($result == null) {
                $this->success('删除成功', 'index/index');
            }else {
                $this->error('删除失败');
            }
        }
    }


    public function delone()
    {
      if (request()->isPost()) {
        $data = input();
        $result = model('comment')->delone($data);
        if ($result == null) {
          $this->success('删除成功');
        }else {
          $this->error('删除失败');
        }
      }
    }

//  public function db()
//  {
//    $dbh = new PDO(
//      'mysql:host=localhost;dbname=lianbiao','root','123456'
//    );
//    $sql = "update liuyan set Administrator_reply='52' where id=1";
//    $db = $dbh -> exec($sql);
//    dump($db);die;
//}

//    导出评论模块
  public function expData()
  {
    $comment = input();
    action('admin/Download/comment',['comment' => $comment, 'table_name' => 'comment']);
}
}