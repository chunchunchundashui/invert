<?php
namespace app\common\validate;
use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:50
 */

class Grade extends Validate
{
  protected $rule =   [
    'name'  => 'require|unique:class',
  ];

  protected $message  =   [
    'name.require' => '班级名称不能为空',
    'name.unique'     => '班级名称不能重复',
  ];
}