<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;



class Position extends Base
{
    protected $Controller = 'Position';

    //列表
    public function lst()
    {

        $list = model('position')->getAllData();
        $viewData = [
            'list' => $list
        ];
        $this->assign($viewData);
        return view();
    }
}