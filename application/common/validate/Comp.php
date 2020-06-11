<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/3/22
 * Time: 15:32
 */

namespace app\common\validate;


use think\Validate;

class Comp extends Validate
{
//  调查方式验证
  protected $rule =   [
    'tid'  => 'require|eq:0',

  ];

  protected $message  =   [
    'tid.require' => '调查不能为空',
    'pid.eq' => '调查不能为空'
  ];
}