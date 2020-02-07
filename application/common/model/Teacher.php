<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;


class Teacher extends Base
{

    public function getAllData()
    {
        //拼接where
        $count_where = '1=1';
        $where = '1=1';
        //接受老师名字查询
        $teacher = input('get.tname');
        if ($teacher) {
            $count_where .= " and tname like '%$teacher%'";
            $where .= " and a.tname like '%$teacher%'";
        }

        //接受开始日期
        $start = input('get.start');
        //日期转换为时间戳
        $start = strtotime($start);
        if ($start) {
            $count_where .= " and unix_timestamp(create_time)>$start";
            $where .= " and unix_timestamp(a.create_time)>$start";
        }

        //接受上面的数据,在这儿进行如表查询
        $count = model('teacher')->where($count_where)->count();
        $data = model('teacher')->alias('a')
            ->field('a.*,b.mname,c.pname')
            ->where($where,'a.status = 1')
            ->order('id', 'asc')
            ->join('main b', "a.main_id = b.id")
            ->join('position c', "a.position_id = c.id")
            ->paginate(15,$count, [
//                query   在分页时候需要用到url额外参数
                'query' => array('tname' => $teacher,
                    'start' => $start
                ),
            ]);
        return $data;
    }
    //职位添加
    public function add($data)
    {
        $add = [
            'tname|用户名' => 'require|unique:teacher',
        ];
        $validate = new \app\common\validate\Teacher($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }

        $result = $this->allowField(true)->save($data);

        if ($result) {
            return 1;
        }else {
            return "老师添加失败!";
        }
    }


}