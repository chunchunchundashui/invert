<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class User extends Validate
{
    //添加
    public function sceneAdd(){
        return $this->only(['name','pwd','newpwd']);
    }

    //修改
    public function sceneEdit(){
        return $this->only(['name','pwd','pwds','newpws']);
    }
}