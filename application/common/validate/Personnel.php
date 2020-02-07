<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Personnel extends Validate
{
    protected $rule =   [
        'name'  => 'require|unique:personnel',
    ];

    protected $message  =   [
        'name.require' => '调查方式不能为空',
        'name.unique'     => '调查方式不能重复',
    ];
}