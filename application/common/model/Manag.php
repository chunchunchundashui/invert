<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;


class Manag extends Base
{
    //职位添加
    public function add($data)
    {

        $add = [
            'mname|题目名称' => 'require|unique:manag',
        ];
        $validate = new \app\common\validate\Manag($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }

        $result = $this->allowField(true)->save($data);

        if ($result) {
            return 1;
        }else {
            return "题目添加失败!";
        }
    }



    public function getAllData()
    {
        //拼接where
        $count_where = '1=1';
        $where = '1=1';
        //接受老师名字查询
        $manag = input('get.mname');
        if ($manag) {
            $count_where .= " and mname like '%$manag%'";
            $where .= " and a.mname like '%$manag%'";
        }
        //接受上面的数据,在这儿进行如表查询
        $count = model('manag')->where($count_where)->count();
        $data = model('manag')->alias('a')
            ->field('a.*,b.name')
            ->where($where,'a.status = 1')
            ->order('id', 'asc')
            ->join('personnel b', "a.personnel_id = b.id")
            ->paginate(15,$count, [
//                query   在分页时候需要用到url额外参数
                'query' => array('mname' => $manag,
                ),
            ]);
        return $data;
    }
}