<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/3/14
 * Time: 18:37
 */

namespace app\index\model;


use think\Db;

class Local extends Base {
    public function LocalByTeacherBySelect($date){
        $data2 = '';
        $data1 = '';
        $order = ['id'=>'desc'];
        $paginate_val = [];
        //��Ӱ༉ģ����ԃ
        if(!empty($date['local_name'])){
            //$data2 = ['l.name'=>$local_name];
            $data2 = " l.name like '%{$date['local_name']}%'";
            $paginate_val = ['query'=>['local_name'=>$date['local_name']]];
        }
        $res = $this->table('local_teacher')->alias('lt')->
        join('local l','lt.local_id=l.id','left')->
        join('teacher t','lt.teacher_id = t.id','left')->
        field('lt.id as li_id ,l.id as id,l.name as lname,t.name as tname,
        l.create_time as create_time,l.`status` as status')->
        order($order)->where($data1)->where($data2)->paginate('','',$paginate_val);
       // echo $this->getLastSql();
       return $res;
    }
    public function LocalByTeacherByAdd($data){

        //array(4) { ["id"]=> string(0) "" ["local_teacher_id"]=> string(0) "" ["name"]=> string(6) "����" ["teacher"]=> string(1) "3" }
        //�ж��������޸ĵİ༶�Ƿ��Ѿ�����,���������ֱ�ӷ���
        if(empty($data['id'])){  //���idΪ��,��Ϊ�������
            $local = $this->where(['name'=>$data['name']])->find();
            if($local)  return json_encode(false);  //�����ֱֵ�ӷ���,��ʾ�Ѿ����
            Db::startTrans();
            try{
                $result1 = $this->BaseByAdd_id(['name'=>$data['name'],'id'=>$data['id']]);
                $local_teacher_data = ['local_id'=>$result1['userId'], 'teacher_id'=>$data['teacher']];
                $result2 = Db::table('local_teacher')->insert($local_teacher_data);
                // �ύ����
                Db::commit();
                return json_encode(true);
            } catch (\Exception $e) {
                // �ع�����
                Db::rollback();
                return json_encode(false);
            }
        }else{   //�޸�����
            //array(4) { ["id"]=> string(2) "58" ["local_teacher_id"]=> string(2) "52" ["name"]=> string(4) "4444" ["teacher"]=> string(1) "2" }
            $local = $this->where(['id'=>$data['id']])->find();
            Db::startTrans();
            try{
                if($local['name'] != $data['name']){  //�û����˰༶
                    $local = $this->where(['name'=>$data['name']])->find();
                    if($local)  return json_encode(false);
                    $result1 = $this->BaseByAdd_id(['name'=>$data['name'],'id'=>$data['id']]);
                }
                $result2 = Db::table('local_teacher')->update(['id'=>$data['local_teacher_id'],'teacher_id'=>$data['teacher']]);
                // �ύ����
                Db::commit();
                return json_encode(true);
            } catch (\Exception $e) {
                // �ع�����
                Db::rollback();
                return json_encode(false);
            }
        }
    }
    /*
     * �༶���ݲ�ѯ
     */
    public function edit_local($id){
        $sql = "select a.id as local_ida,a.name as local_name,b.id as local_teacher_id,c.id as teacher_idc,c.name as teacher_name from local as a
                join local_teacher as b on a.id=b.local_id
                join teacher as c on b.teacher_id=c.id
                where a.id={$id}";
        $result = Db::query($sql);
        return $result[0];
    }
    /*
     * ǰ̨��ѯ���а༶
     */
    public function BaseByYesAll($where='1=1'){
        $where .= " and a.status=1";
        $order =[
            'a.id'=>'desc'
        ];
        $data = Db::name('local')
          ->alias('a')
          ->field('a.*,c.name as cname')
          ->join('class c', "a.name = c.id")
          ->where($where)
          ->order($order)
         // ->group('b.name')
          ->group('a.name')
          ->select();

        return $data;
    }
    /*
     * ɾ���༶���м������
     */
    public function del($data){
        $res1 = Db::table('local')->delete($data['id']);
        $res2 = Db::table('local_teacher')->delete($data['lt_id']);
        if($res1 && $res2){
            return true;
        }
    }
}