<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;


class Position extends Base
{
    public function getAllData()
    {
        //拼接where
        $count_where = '1=1';
        $where = '1=1';
        //接受老师名字查询
        $position = input('get.pname');
        if ($position) {
            $count_where .= " and pname like '%$position%'";
            $where .= " and pname like '%$position%'";
        }

        //接受上面的数据,在这儿进行如表查询
        $count = model('position')->where($count_where)->count();
        $data = model('position')->where($where)->paginate(15,$count, [
//                query   在分页时候需要用到url额外参数
                'query' => array('position' => $position,
                ),
            ]);
        return $data;
    }
}