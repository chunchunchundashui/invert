<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 17:01
 */

namespace app\common\model;

use catetree\Catetree;
use think\Controller;
use think\Db;
use think\Model;

class Time  extends Controller
{
    public function indexlist($personnel_id){
        $list = Db::name('tanswer')
            ->where('personnel_id',$personnel_id)
            ->field("from_unixtime(time,'%Y-%m') as 'time'")
            ->group('time')
            ->select();

      if ($list ==null){
            //如果数据库中不存在相关数据的话就返回空
            return '';
        }
        foreach($list as $v) $res[$v['time']] = $v;

      return $res;
    }
    public function Timedel($time)
    {
        $list = Db::name('tanswer')
            ->field('id')
            ->where("from_unixtime(time,'%Y-%m')='{$time}'")
            ->select();
        $tree = new Catetree();
        $model = Db::name('tanswer');
        $ret = $tree->delid($list,$model);
        return $ret;
    }
}