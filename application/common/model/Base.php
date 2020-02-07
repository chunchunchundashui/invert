<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/24
 * Time: 11:05
 */

namespace app\common\model;


use Think\Db;
use think\Model;

class Base extends Model
{
    protected $model;
    protected function _initialize(){

    }

    //现在是很多的继承的查询
    public function BaseLst($where='1=1'){
        $order =[
            'id'=>'asc'
        ];
        return $this->where($where)->order($order)->paginate(15);
    }

    //公共查询处
    public function BaseAllData(){

    }
    /*
     * 添加数据
     */

    public function BaseByAdd($data){
            $data['status'] = 1;
            $data['create_time'] = time();
            unset($data['id']);
        return $this->insert($data);
        // echo $this->getLastSql();die;
    }

    //删除的数据
    public function del($id){
//        dump($this->where($id)->getLastSql());die;
         return $this->where($id)->delete();
    }


    /*
     * 修改数据
     */
    public function edit($data){
        $id = $data['id'];
        return $this->allowField(true)->save($data,$id);
    }
}