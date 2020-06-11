<?php
/**
 * Created by PhpStorm.
 * User: chuun chun
 * Date: 2020/1/1
 * Time: 13:16
 */

namespace app\index\model;
use think\Db;
use think\Model;
use think\Session;

class Base extends Model{
    /* protected $autoWriteTimestamp = true;*/   // 自动写入时间戳字段'auto_timestamp'  => false,
    protected function _initialize(){
    }
    /*
     * 添加数据
     */
    public function BaseByAdd($data){
        $data['status']=1;
        $data['time'] = time();
        return $this->insert($data);
        // echo $this->getLastSql();die;
    }
//    评论
    public function introAdd($session,$data)
    {
        $session['status'] = 1;
        $session['create_time'] = time();
        $session['comment'] = $data;
        if ($session['personnel_id'] == 1) {
          $session['teacher_id'] = $session['teacher_class'];
          unset($session['teacher_class']);
          $session['comment'] = implode('@',$session['comment']);
        }
        unset($session['teacher_class']);
        $ret = Db::name('comment')->insert($session);
//        dump(Db::name('comment')->getLastSql());die;
        return $ret;
    }

    //老师成绩添加
    public function CompAdd($session,$data){
      $session['status'] = 1;

      foreach ($data as $k=>$v){ //$k为题目id   $v为$k对应的成绩
          $data = array();
        $session['achievement'] = $v;
            $session['topic_id'] = $k;
            $session['browse'] = 1;
            $session['time'] = time();
            //问题任课老师第一次上交分数,在数据库中为20分,
          $data = Db::name('tanswer')->insert($session);

      }
        return $data;
    }
    //第一代成绩修改及浏览量增加
    /* public function CompEdit($session,$data){
         $session['status']=1;
         foreach ($data['achievement'] as $k=>$v){
             $kk = Db::name('tanswer')//返回1成功
                 ->where('topic_id',$k)
                 ->setinc('achievement',$v);
            $vv= $this->BaseSetInc('tanswer',$k);
            if (true ==$kk && true ==$vv){
                return true;
            }
                return false;
         }
         //return $kk;
     }
     //公共加考试浏览量
     public function BaseSetInc($table_nmae,$k){
         $ret = Db::table($table_nmae)
             ->where('topic_id',$k)
             ->setInc('browse',1);
         return $ret;
     }*/
    /*
     * 公共的用于考试成绩等数据入库(最新版)
     * */
    public function CompEdit($table_name,$data,$session){
      $arr = ['achievement'=>0,'browse'=>1];
        foreach ($data as $k=>$v){//$k是表名;$v是成绩:
          foreach ($arr as $arrk=>$arrv){
            $session['topic_id']=$k;
                if ($arrk =='achievement'){
                  $kk = Db::name($table_name)//返回1成功
                    ->where($session)
                        ->setinc($arrk,$v);
                }else{
                    $kk = Db::name($table_name)//返回1成功
                    ->where($session)
                        ->setinc($arrk,$arrv);
                }
            }
        }
        return $kk;
    }
    /*
     * 添加数据返回增加的id
     */
    public function BaseByAdd_id($data){
        $where  = '';
        $userId = '';
        if(!empty($data['id'])){
            $where = array('id'=>$data['id']);
            $result = $this->save($data,$where);
        }else{
            $data['status']=1;
            $data['create_time'] = time();
            unset($data['id']);
            $result = Db::name('local')->insert($data);
            $userId = Db::name('local')->getLastInsID();
        }
        return array('result'=>$result,'userId'=>$userId);
        // echo $this->getLastSql();die;
    }
    /*
     * 修改数据
     */
    public function BaseByUpdate($data){
        $id = $data['id'];
        return $this->update($data,$id);
    }
    /*
     * 添加多条数据
     */
    public function BaseByAdds($arr){
        $intro = $arr['other'];
        unset($arr['other']);
        $result = "";
        $add_time = time();
        foreach ($arr as $k=>$v){

            $data = $this->table('depar')->where(array('topic_id'=>$k))->select();
            if(empty($data)){
                //部门编号，总分，  平均分，人数，状态，时间
                $sql = "insert into depar(topic_id,fraction,num,status,create_time)  values($k,$v,1,1,{$add_time})";
                $result = $this->query($sql);
            }else{
                $sql = "update depar set  fraction=fraction+{$v},num=num+1 where topic_id = '{$k}'";
                $result = $this->query($sql);
            }
        }
        $data = [
            'text'=>$intro,
            'status'=>1,
            'create_time'=>time()
        ];
        $res = \model('Proposal')->save($data);
        return $res;

    }
    public function BaseByYes($where='1=1'){
        $where .= " and status=1";
        $order =[
            'id'=>'desc'
        ];

        return $this->where($where)->order($order)->select();
    }
    /*
     * 此方法用于被子类覆盖
     */
    protected function __select_where(&$where){

    }
    public function status($data){
        $where = [
            'id'=>$data['id']
        ];
        $data = [
            'status'=>$data['status']
        ];
        return $this->update($data,$where);
    }
    public function del($id){

        return $this->where($id)->delete();
    }
    public function BaseByTopicBySelect($id){
        //personnel调查分类;topic考试题
        $res = Db::name('topic')
            ->alias('t')
            ->where('personnel_id',$id)
            ->field('t.topic,t.id')
            ->join('personnel p','t.personnel_id=p.id')
            ->select();
        return $res;
    }
    public function StudentSelect($id){
        $res = Db::name('topic')
            ->alias('t')
            ->where('t.personnel_id',$id)
            ->field('t.id,t.topic,m.mname,m.id as mid')
            ->join('personnel p','t.personnel_id = p.id')
            ->join('manag m','t.manag_id = m.id')
            ->order('id asc')
            ->select();
        foreach($res as $v) $reso[$v['mname']][] = $v;
        foreach ($res as $key => $value) {
            if ($value['topic'] == '') {
                unset($res[$key]);
            }
        }
        $reso['count'] = count($res);
        return $reso;

    }
    public function BaseByManagBySelect($data){
        $where = [
            'm.personnel_id'=>$data,
            'm.status'=>1
        ];
        $res = $this->table('manag')->alias('m')->
        join('personnel p','m.personnel_id=p.id')->
        field("m.id as id,m.name as name")->
        where($where)->select();
        return $res;
    }
    /*********************以下代码为教师满意度调查和学生综合满意度调查公用*************************************/
    public function list_AnswerProposal($_where='',$table_name){
        /*$res = $this->table($table_name)->
        field("id,from_unixtime(create_time,'%Y-%m') as create_data")
            ->distinct(true)->buildSql();
        $result = $this->table($res.'a')->field("distinct a.create_data")->where($_where)->paginate();*/
        $result = $this->table($table_name)->field("from_unixtime(create_time,'%Y-%m') as create_data")
            ->where($_where)
            ->GROUP("from_unixtime(create_time,'%Y-%m')")->paginate();
        //  echo $this->getLastSql();die;
        return $result;
    }
    /*
     * 查询单个老师指定月份的授课满意度数据
     * $data中的数据
     *      create_time :  调查的月份
     *      teacher_id :   调查的老师
     * teacher_row_content
     * answer_row_content
     */
    public function row_content($data,$table){
        $join = '';
        $name = '';
        if($table == 'answer'){
            $join = "join manag as e on d.manag_id=e.id";
            $name = ",e.name as manag_name";
        }
        $data['create_time'] = date('Y-m',$data['create_time']);
        $sql = "select c.name as local_name, b.name as teacher_name{$name}, d.topic as topic,
                a.A as A,a.B as B,a.C as C,a.D as D,a.E as E, a.inves_number as inves_number,a.teacher_id as teacher_id,a.local_id as local_id,a.create_time from
                {$table} as a
                join teacher as b on a.teacher_id=b.id
                join local as c on a.local_id=c.id
                join topic as d on a.topic_id=d.id
                {$join}
                where a.teacher_id={$data['teacher_id']} and a.local_id={$data['local_id']} and from_unixtime(a.create_time,'%Y-%m')='{$data['create_time']}'
                order by d.id ";

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
}