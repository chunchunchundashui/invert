<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Topic extends Validate
{
    //调查问题添加验证场景
    public function sceneAdd(){
        return $this->only(['name','personnel_id','manag_id']);
    }
}