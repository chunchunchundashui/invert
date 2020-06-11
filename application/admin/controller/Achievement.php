<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/31
 * Time: 17:24
 */

namespace app\admin\controller;


use think\Cache;
use think\Controller;

class Achievement extends Base
{
  protected $Controller = 'Achievement';
  public function index(){
    $time = model('achievement')->timelist();
    $this->assign([
      'time'=>$time
    ]);
    return $this->fetch('teacher/time');
  }

  //显示出月份对应的老师调查分类数据
  public function teacher(){
    if (request()->isGet()){
      $data = input();
      if($data['personnel_id'] == 4){
       $list = $this->branch($data);
       Cache::set('name',$list);  //将数据放到缓存当中，方便下载数据的获取
      }else{
         $list = model('achievement')->indexlist($data);
         Cache::set('name',[$list, 'personnel_id' => $data['personnel_id']], 600);  //将数据放到缓存当中，方便下载数据的获取
      }
    
      $this->assign([
        'data'=>$data,
        'list'=>$list
      ]);
    }
    if ($data['personnel_id'] == 3){
      return view('time/position');
    }elseif($data['personnel_id'] == 4){
    	return view('achievement/manag');
    }
    return view('time/sort');
  }
public function branch($data){
      $list = model('achievement')->department($data);
  	  return $list;
  //return view('achievement/manag');
	
}
  //学生满意度调查对应的各部门评分
  public function company(){
    $list = model('achievement')->company();
    $this->assign([
      'list'=>$list
    ]);
    return $this->fetch('achievement/company');
  }

  //显示班级对应的题目平均分
  public function sort(){
    if (request()->isGet()){
      $id = input();
      $list = model('achievement')->Summation($id);
      Cache::set('avg',[$list]);  //将数据放到缓存当中，方便下载数据的获取
      $this->assign([
        'id' => $id,
        'list'=>$list
      ]);
      return $this->fetch('achievement/copic');
    }
  }
    //首页平均分
    public function achieve(){
        $name = Cache::get('name');
        action('admin/Download/out',['avg'=>$name, 'id'=>'2']);
    }

//  单个删除分数
  public function commondel(){
    if (request()->isAjax()){
      $data = input();
      $ret = model('Achievement')->commondel($data);
      if ($ret ==null){
        $this->success('删除成功', 'index/index');
      }
      $this->error('删除失败');
    }
  }
//综合部门管理删除
public function ManagDel(){
      if (request()->isPost()){
          $data = input('post.');
          $list = model('achievement')->ManagDel($data);
          if ($list ==true){
              return $this->success('删除成功','achievement/index');
          }else{
              return $this->error('删除失败','achievement/index');
          }
      }
}

    //每个题的平均分
    public function expData(){
        $avg = Cache::get('avg');
        action('admin/Download/out',['avg'=>$avg, 'id'=>'1']);
    }
    //首页平均分
    public function department(){
        $data = Cache::get('name');
        action('admin/Download/department',[$data]);
    }
    // 各答题的平均分
    public function manag(){
        if (request()->isGet()) {
            $time = input('');
            $list = model('achievement')->manag($time);
            Cache::set('name',$list);
            $this->assign([
                'list' => $list,
            ]);
        }
        return view('achievement/manag');
    }
}