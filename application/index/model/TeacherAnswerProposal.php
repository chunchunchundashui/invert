<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/19
 * Time: 12:59
 */

namespace app\common\model;

use think\Db;
class TeacherAnswerProposal extends Base
{
    public function AnswerProposalByAdd($other){
        $session = session('');
        if ($session['pid'] == 1) {
          $session['teacher_id'] = $session['cid'];
        }else {
          $session['teacher_id'] = $session['tid'];
        }
      foreach ($other as $key=>$value){
                $res = $this->table('comment')->insert(
                    [
                        'personnel_id'=>$session['pid'],
                        'local_id'=>$session['lid'],
                        'teacher_id'=>$session['teacher_id'],
                        'status'=>1,
                        'create_time'=>time(),
                    ]
                );
      }
      dump($res);die;
        return $res;
    }
    /*
     * 改方法已经被向上抽取,项目测试完成后删除
     * 查询调查的月份
     */
    /*public function list_AnswerProposal($_where=''){
        $res = $this->table('teacher_answer_proposal')->
        field("id,from_unixtime(create_time,'%Y-%m') as create_data")
            ->distinct(true)->buildSql();
        $result = $this->table($res.'a')->field("distinct a.create_data")->where($_where)->paginate();
     //   echo $this->getLastSql();die;
        return $result;
    }*/
    public function selectByAnswerProposal($_where = null,$data=null){
        $order = [
            'id'=>'desc'
        ];
        $rows = Db::table('teacher_answer_proposal')->alias('ap')->
        join('local l','ap.local_id = l.id')->
        join('teacher t','ap.teacher_id=t.id')->
        join('manag m','m.id=ap.manag_id')->
        field('ap.id as id,from_unixtime(ap.create_time,\'%Y-%m\') as create_data,m.name as mname,t.name as teacher_name,l.name as local_name,ap.text,ap.create_time')
            ->where($_where)->buildSql();
        $res = $this->table($rows.' a')->where($data)->field("id,mname,create_data,teacher_name,local_name,text,create_time")->order($order)->paginate();
        return $res;
    }
    /*
     * 查询所有教师的满意度调查名单
     */
    public function select_teacher_intro($search_time){
        $where = '';
        if(!empty($search_time['create_data'])){
            $where = "from_unixtime(a.create_time,'%Y-%m')='{$search_time['create_data']}'";
        }
        //c.name like '%17软件%'
        if(!empty($search_time['lname'])){
            $where .= " and  c.name like '%{$search_time["lname"]}%'";
        }
        if(!empty($search_time['tname'])){
            $where .= " and b.name like '%{$search_time["tname"]}%'";
        }

        $result = Db::table('teacher_answer')->alias('a')->
        join('teacher b','a.teacher_id=b.id')->
        join('local c','a.local_id=c.id')->
        field(' a.teacher_id as teacher_id,a.create_time,b.name as teacher_name,c.id as local_id,c.name as local_name')->
        where($where)->group('c.name,b.name')->paginate(20);
        //dump( Db::table('teacher_answer')->getLastSql());die;
        //echo $this->getLastSql();die;
        /*$sql = "select DISTINCT a.teacher_id,a.create_time,b.name as teacher_name,c.name as local_name from teacher_answer as a
                join teacher as b on a.teacher_id=b.id
                join local as c on a.local_id=c.id
                where from_unixtime(a.create_time,'%Y-%m')='{$search_time['create_data']}'";
        $result  = Db::query($sql);*/
        return $result;
    }
}