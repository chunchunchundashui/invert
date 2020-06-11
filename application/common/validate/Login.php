<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/27
 * Time: 16:01
 */

namespace app\common\validate;


use think\Validate;

class Login extends Validate
{
    //职位添加验证场景
    protected $rule =   [
        'name'  => 'require|min:5',
        'pwd'  => 'require|min:6',
        'verifyCode'  => 'require|captcha',
    ];

    protected $message  =   [
        'name.require' => '账号不能为空',
        'name.min' => '账号不能小于5位',
        'pwd.require' => '密码不能为空',
        'pwd.min' => '密码不能小于6位',
        'verifyCode.require' => '验证码不能为空',
        'verifyCode.captcha' => '验证码不正确',
    ];
}