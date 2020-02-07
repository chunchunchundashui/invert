<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Position extends Validate
{
    //职位添加验证场景
    protected $rule =   [
        'pname'  => 'require|unique:position',
    ];

    protected $message  =   [
        'pname.require' => '部门不能为空',
        'pname.unique'     => '部门不能重复',
    ];
}