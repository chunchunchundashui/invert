<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;

use think\Db;
class Local extends Base
{
    //职位添加
    public function add($data)
    {
        $add = [
            'name|班级名称' => 'require',
            'teacher_id|任课老师' => 'require',
            'teacher_class|班主任' => 'require',
        ];
        $validate = new \app\common\validate\Local($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return "职位添加失败!";
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
            $count_where .= " and b.name like '%$name%'";
            $where .= " and d.name like '%$name%'";
        }
        //接受上面的数据,在这儿进行如表查询
        //select count(*) from  local where 1=1 and name like '%$name%'
        $count = Db::table('local')
          ->alias('a')
          ->field('a.id,a.name,b.id,b.name')
          ->join('class b', 'a.name = b.id')
          ->where($count_where)->count();
        $data = Db::table('local')
            ->field('a.*,b.tname as teacher_name,c.tname as class_name, d.name')
            ->alias('a')
            ->join('teacher b', "a.teacher_id  = b.id and b.main_id = 2")
            ->join('teacher c', "a.teacher_class  = c.id and c.main_id = 1")
            ->join('class d', 'a.name = d.id')
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