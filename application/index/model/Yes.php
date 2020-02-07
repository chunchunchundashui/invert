<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/3
 * Time: 9:52
 */

namespace app\index\controller;


class Yes extends Base
{
public function index(){
    return $this->fetch();
}

}