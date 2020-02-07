<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/1/11
 * Time: 13:16
 */

namespace app\index\model;
class Personnel extends Base{

    public function BaseByYes($where='1=1'){
        $where .= " and status=1";
        $order =[
            'id'=>'asc'
        ];
        $data = db('personnel')->alias('a')->field('a.id,a.name as pname,a.status,a.create_time')->where($where)->order($order)->select();
        return $data;
    }

    public function PersonnelBySelect($data){   /*where('n','between','0,100');*/
        if(!is_array($data)){
            return "错误";
        }
        $order = [
            'id'=>'desc',
        ];

        $data2 = '';
        $data1 = '';
        if(!empty($data['name'])){
            $data2 = [
                'name'=>$data['name']
            ];
        }
        if (!empty($data['start_time'])){
            $data1 = [
                'create_time'=>['between',"{$data['start_time']},{$data['end_time']}"],
            ];
        }
         $res = $this->where($data1)->whereOr($data2)->order($order)->paginate();
        return $res;
       // echo $this->getLastSql();die;
    }

}