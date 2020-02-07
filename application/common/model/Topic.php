<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;

class Topic extends Base
{
    //调查问题添加
    public function add($data)
    {
        $add = [
            'topic|问题名称' => 'require|unique:topic',
            'personnel_id|调查方式名称' => 'require',
            'manag_id|题目分类' => 'require',
        ];
        $validate = new \app\common\validate\Topic($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        //把状态改为1
        $data['status'] = 1;
        $result = $this->save($data);
        if ($result) {
            return 1;
        }else {
            return "调查问题添加失败!";
        }
    }


    public function getAllData()
    {
        //拼接where
        $count_where = '1=1';
        $where = '1=1';
        //接受问题调查查询
        $personnel = input('get.personnel');
        if ($personnel) {
            $count_where .= " and personnel_id like '%$personnel%'";
            $where .= " and b.name like '%$personnel%'";
        }
        //接受上面的数据,在这儿进行如表查询
        $count = model('topic')->where($count_where)->count();
        $data = model('topic')
            ->alias('a')
            ->field('a.*,b.name as pname,c.mname')
            ->order('id', 'asc')
            ->join('personnel b', "a.personnel_id = b.id")
            ->join('manag c', "a.manag_id = c.id")
            ->where($where)
            ->paginate(32,$count, [
//                query   在分页时候需要用到url额外参数
                'query' => array('personnel' => $personnel,
                ),
            ]);
        return $data;
    }

    //修改
    public function edit($data)
    {
        $result = model('topic')->allowField(true)->isUpdate(true,['update_time'=>$data])->save($data);
        if ($result) {
            return 1;
        }else {
            return 0;
        }
    }
}