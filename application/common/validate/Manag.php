<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Manag extends Validate
{
    //职位添加验证场景
    public function sceneAdd(){
        return $this->only(['mname']);
    }
}