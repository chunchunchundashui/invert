<?php

namespace app\index\controller;
/**
 * Class Staff
 * @package app\index\controller
 * 员工满意度调查
 */
class Staff extends Base
{
    /**
     * @return mixed
     * 列表页面
     */
    public function index()
    {
        $data = input();

        $res = model('topic')->StaffBySelect(['t.personnel_id'=>$data['type']]); //班级查询

        return $this->fetch('', [
            'res' => $res,
        ]);
    }

    /**
     * 添加数据
     */
    public function add()
    {
        $data = input('post.');
        $result = model('depar')->BaseByAdds($data);
        if ($result) {
            return $this->success('添加成功！');
        } else {
            return $this->error('添加失败!');
        }

    }
}
