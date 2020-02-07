<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/19
 * Time: 12:05
 */

namespace app\common\model;

use think\Db;

class TeacherAnswer extends Base{
    public function AnswerByAdd($row){
        $session = session('');
        $result = '';
        $new_time = date("Y-m",time());
       return $row;

        /*if(!$result_teacher_number){   //如果查询出当前分月没有满意度调查,则为添加
            foreach($row as $key=>$value){
                foreach($value as $k=>$v){
                    $result = $this->insert([
                        'personnel_id' => $session['personnel_id'],
                        'local_id'     => $session['local_id'],
                        'teacher_id'   => $session['teacher_id'],
                        'topic_id'     => $k,
                        $key            => $v,
                        'inves_number' => 1,
                        'status'        => 1,
                        'create_time'  => time(),
                    ]);
                }
            }
        }else{   //如果查询出当前分月有满意度调查,则为修改
            foreach($row as $key=>$value){
                $update_term = '';
                foreach($value as $k=>$v){
                    if($v == 5){
                        $update_term = "A=A+5";
                    }elseif($v == 4){
                        $update_term = "B=B+4";
                    }elseif($v == 3){
                        $update_term = "C=C+3";
                    }elseif($v == 2){
                        $update_term = "D=D+2";
                    }else{
                        $update_term = "E=E+1";
                    }
                    $sql = "update teacher_answer set  {$update_term},inves_number=inves_number+1
                         where personnel_id={$session['personnel_id']} and local_id={$session['local_id']} and
                         teacher_id={$session['teacher_id']} and from_unixtime(create_time,'%Y-%m')='{$new_time}'
                         and topic_id=$k";
                    $result = $this->query($sql);
                }
            }
        }*/
        return $result;

        }
    public function list_Answer(){
        $res = $this->table('teacher_answer')->
        field("id,from_unixtime(create_time,'%Y-%m') as create_data")
            ->distinct(true)->buildSql();
        $result = $this->table($res.'a')->field("distinct a.create_data")->paginate();
        return $result;
    }
    public function ModeBySelectByFenshu($where=null,$data=null){
        $order = [
            'id'=>'desc'
        ];
        $res = $this->table('teacher_answer')->alias('a')->
        join('teacher t','a.teacher_id=t.id')->
        join('local l','a.local_id=l.id')->
        join('topic top','top.id=a.topic_id')->
        field('a.id as id,from_unixtime(a.create_time,\'%Y-%m\') as create_data,top.topic as topic,l.`name` as lname,t.`name` as tname,a.A as A,a.B as B,a.C as C,a.D as D,a.E as E,a.create_time as create_time,a.`status` as `status`')->
        where($where)->buildSql();
        $result = $this->table($res.' c')->where($data)->field("id,topic,lname,tname,A,B,C,D,E,create_time,status")->order($order)->paginate();
        return $result;
    }
    /*
      *  提供教师下载数据
     */
    public function teacher_row_content($data){
        $data['create_time'] = date('Y-m',$data['create_time']);
        $sql = "select c.name as local_name, b.name as teacher_name, d.topic as topic, a.A as A,a.B as B,a.C as C,a.D as D,a.E as E, a.inves_number as inves_number,a.teacher_id as teacher_id,a.local_id as local_id,a.create_time from teacher_answer as a
                join teacher as b on a.teacher_id=b.id
                join local as c on a.local_id=c.id
                join topic as d on a.topic_id=d.id
                where a.teacher_id={$data['teacher_id']} and a.local_id={$data['local_id']} and from_unixtime(a.create_time,'%Y-%m')='{$data['create_time']}'";
        $result = Db::query($sql);
        $row_count = [];
        foreach($result as $row){
            $row_count[] = ($row['A']+$row['B']+$row['C']+$row['D']+$row['E'])/$row['inves_number'];
        }
        $count_number = array_sum($row_count);
        return array(
            'result'=>$result,
            'count_number'=>sprintf("%.2f",$count_number)
        );
    }

    /**
     * 查询单个老师的
     * @param $data
     *      create_time :  调查的月份
     *      teacher_id :   调查的老师
     */
    public function teacher_row_intro($data,$type=''){
        $create_time = date('Y-m',$data['create_time']);
        $_where = "from_unixtime(a.create_time,'%Y-%m')='{$create_time}'";
        unset($data['create_time']);
        if($type == 'intro'){
            $result = Db::table('teacher_answer_proposal')->alias('a')->field('t.name as teacher_name,l.name as local_name,a.text,a.create_time')->
            join('teacher t','a.teacher_id=t.id')->
            join('local l','a.local_id=l.id')->
            where($_where)->where($data)->select();
        }else{
            unset($data['page']);
            $result = Db::table('teacher_answer_proposal')->alias('a')->field('a.text,a.create_time')->where($_where)->where($data)->paginate();
        }
        return $result;
    }
    /*
    * 删除教师满意度调查错误的数据
    */
    public function del($data){
        $data['create_time'] = date('Y-m',$data['create_time']);
        $sql1 = "delete from teacher_answer where teacher_id={$data['teacher_id']} and local_id={$data['local_id']} and (from_unixtime(create_time,'%Y-%m')='{$data['create_time']}' )";
        $sql2 = "delete from teacher_answer_proposal where teacher_id={$data['teacher_id']} and local_id={$data['local_id']} and (from_unixtime(create_time,'%Y-%m')='{$data['create_time']}' )";
        $result1 = Db::table('teacher_answer')->execute($sql1);
        $result2 = Db::table('teacher_answer_proposal')->execute($sql2);
        if($result1 && $result2){
            return true;
        }
    }
}