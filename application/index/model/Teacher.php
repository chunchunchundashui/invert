<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/3/14
 * Time: 18:37
 */

namespace app\index\model;


use think\Db;

class Teacher extends Base
{
    /*后台的模块*/
    public function localByteacher($data=''){
        $data2 = '';
        $data1 = '';
        $order = [
            't.id'=>'desc',
        ];
        if(!empty($data['name'])){
            $data2 = [
                't.name'=>$data['name']
            ];
        }

        $result =$this->table('teacher')->alias('t')->
                  join("main m",'m.id=t.main_id')->
                  join("position p",'p.id=t.position_id')->
                  field("t.id as id,t.name as name,t.status as status,t.create_time as create_time,m.name as mname,p.name as pname")->
                  where($data2)->order($order)->paginate();

        return $result;
    }
    /*前台模块
     * 查询任课老师
     * */
    public function localByteacherByselect($data){
        $data = [
            'a.status'=>1,
            'a.id'=>$data['id'],
        ];
        $data = model('local')
            ->field('a.*,b.tname as teacher_name')
            ->alias('a')
            ->join('teacher b', "a.teacher_id  = b.id and b.main_id = 2")
            ->where($data)
            ->select();
        /*->distinct(true) 去掉重复的值*/

      return $data;
    }
    /*
     * 根据id查询老师的名称
     */
    public function select_name($id){
        $result = $this->table('teacher')->where(array('id'=>$id))->find();
        return $result;
    }

    /**
     * 班主任老师
     */
    public function local_teacher($id){
        //$id为班级id
        //$result = $this->table('teacher')->where('main_id!=1')->select();
       // $teacher_id = Db::name('local_teacher')->field('teacher_id')->where('local_id',$id)->select();
        $data = model('local')
            ->field('a.*,b.tname as class_name')
            ->alias('a')
            ->join('teacher b', "a.teacher_class  = b.id and b.main_id = 1")
            ->where('a.id',$id)
            ->select();
            //->paginate(2);
        return $data;
    }
    /**
     * @param $data
     * @return false|\PDOStatement|string|\think\Collection
     * 返回班主任
     */
    public function localByteacherByselectByPer($data){
        $data = [
            't.status'=>1,
            'lt.local_id'=>$data['id'],
            'm.mname'=>'班主任'
        ];
      $res = $this->table('teacher')
          ->alias('t')
          ->join('teacher lt','lt.teacher_id=t.id')
          ->join('local l','lt.local_id=l.id')
          ->join('main m','t.main_id=m.id')
          ->field("t.id as id,t.tname as name")
          -> where($data)
          ->distinct('t.tname')
          ->select();
      return $res;
    }

}