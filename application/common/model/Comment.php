<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/30
 * Time: 10:41
 */

namespace app\common\model;


class Comment extends Base
{

    //首页时间
    public function lst($data)
    {
        $result = db('comment')
            ->field("from_unixtime(create_time,'%Y-%m') as 'ccreate_time'")
            ->where($data)
            ->group('ccreate_time')//create_time
            ->select();
        return $result;
    }

    //每个班级对和老师列表
    public function teacherLst($data)
    {
        $data = db('comment')
            ->alias('a')
            ->field("a.*,b.tname,c.name as lname,d.name as pname")
            ->where("from_unixtime(a.create_time, '%Y-%m') = '{$data['create_time']}'")
            ->where('personnel_id',$data['personnel_id'])
            ->join('teacher b', 'a.teacher_id = b.id')
            ->join('local c', 'a.local_id = c.id')
            ->join('personnel d', 'a.personnel_id = d.id')
          ->group('a.teacher_id')
          ->select();
        return $data;
    }

    //每个班对应每个老师评论区
    public function classLst($data)
    {
      $data = db('comment')
            ->alias('a')
            ->field('a.comment')
            ->where("from_unixtime(a.create_time, '%Y-%m') = '{$data['create_time']}'")
            ->where('local_id', $data['local_id'])
            ->where('teacher_id', $data['teacher_id'])
            ->where('personnel_id',$data['personnel_id'])
            ->group('a.comment')
            ->paginate(15);
        return $data;
    }

    //模型下面的删除本月时间
    public function timedel($data)
    {
        $data = db('comment')
            ->field('id')
            ->where("from_unixtime(create_time, '%Y-%m') = '{$data['create_time']}'")
            ->where('personnel_id',$data['personnel_id'])
            ->delete();
        return $data;
    }
}