<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/8
 * Time: 17:44
 */

namespace app\index\model;


class Topic extends Base
{
        public function topicByselect_yuefen(){
            /*
            select DISTINCT a.create_data  from
            (select FROM_UNIXTIME(create_time,'%Y-%m') as create_data from topic) a
            */
        }
        public function topicByselectByperByManag($data = ''){
           // $data['t.status'] = 1;
            $res = $this->table('topic')->alias('t')->
            field("t.id as id,t.topic as topic,p.name as personnel_name,m.`name` as mname,t.personnel_id as personnel_id,t.create_time as create_time,t.`status` as status")->
            join("personnel p","t.personnel_id=p.id",'LEFT')->
            join("manag m","manag_id=m.id",'LEFT')->
            where($data)->paginate(20,false,['query'=>request()->param()]);
           // echo $this->getLastSql();die;
            return $res;
        }
        public function StaffBySelect($data=''){
            dump($data);die;
            $data['m.status'] = 1;
            $res = $this->table('topic')->alias('t')->where($data)->
                   join('manag m','m.id=t.manag_id')->field('t.id as id,t.topic as topic')->select();
            return $res;
        }


}