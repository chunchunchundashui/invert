<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/3/15
 * Time: 8:30
 */

namespace app\index\controller;
use think\Controller;
class Base extends Controller{
    protected $Controller;
    public function _initialize(){
        $this->Controller = request()->controller();
    }

}
