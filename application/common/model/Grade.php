<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;

use think\Db;

class Grade extends Base
{
    //职位添加
    public function add($data)
    {
      $data['create_time'] = time();
      $result = Db::name('class')->insert($data);
        if ($result) {
            return 1;
        }else {
            return "班级添加失败!";
        }
    }

    public function getAllData()
    {
        //拼接where
        $count_where = '1=1';
        //相当于把1=1加在where前面
        $where = '1=1';
        //接受问题调查查询
        $name = input('get.name');
        if ($name) {
            $count_where .= " and name like '%$name%'";
            $where .= " and name like '%$name%'";
        }

      //接受上面的数据,在这儿进行如表查询
        //select count(*) from  class where 1=1 and name like '%$name%'
        $count = Db::name('class')->where($count_where)->count();

      $data = Db::name('class')
            ->where($where)
            ->order('id', 'asc')
            ->paginate(15,$count, [
//                query   在分页时候需要用到url额外参数
                'query' => array('name' => $name,
                ),
            ]);
        return $data;
    }

}