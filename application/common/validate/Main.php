<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Main extends Validate
{
    //职位添加验证场景
//    public function sceneAdd(){
//        return $this->only(['mname']);
//    }


    protected $rule =   [
        'mname'  => 'require|unique:main',
    ];

    protected $message  =   [
        'mname.require' => '职位不能为空',
        'mname.unique'     => '职位不能重复',
    ];
}