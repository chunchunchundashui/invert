<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 2018/4/8
 * Time: 15:41
 */

namespace app\index\controller;

use think\Cache;
use think\Db;
use think\Session;
use think\Cookie;


class Comp extends Base
{
    /*
     * 综合满意度调查首页
     */
    public function index()
    { 
        if (request()->isGet()) {
            $data = input('get.');
            if ($data['pid'] == 2){
                $HtmlName = 'Teacher';
            }elseif($data['pid'] == 1){
                $HtmlName = 'Student';
            }
            $file = APP_PATH.'index/view/public' ;
            $list= model('comp')->indexdata($data);
            if(!empty(file_exists($file.'/'.$HtmlName.'.html'))){//检测是否存在该文件,存在执行给文件,不存在则生成
                $this->assign([
                    'list'=>$list,
                    'data' => $data,
                ]);
                    return $this->fetch('common/index');
            }else{
                //根据条件查询
                if ($data['pid'] == 2){
                    $topic = model('topic')->BaseByTopicBySelect($data['pid']);
                    $this->assign([
                        'list' => $list,
                        'topic' => $topic
                    ]);
                    $view = 'teacher/index';
                }elseif ($data['pid'] == 1){
                    $topic = model('topic')->StudentSelect($data['pid']);
                    $count =$topic['count'];
                    unset($topic['count']);
                    $this->assign([
                        'count'=>$count,
                        'list'=>$list,
                        'topic'=> $topic
                    ]);
                    $view = 'index/check';
                }
                $content =  $this->fetch($view);
               $this->buildHtml($HtmlName,$file,$content);
            }
            return false;

        }
    }
    /**
     * 创建静态页面
     * @access protected
     * @htmlfile 生成的静态文件名称
     * @htmlpath 生成的静态文件路径
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @return string
     *
     */
    protected function buildHtml($htmlfile = '', $htmlpath = '',$content)
    {
//$htmlpath.'/'.$htmlfile.'.html'
        $File = new \think\template\driver\File();
       $File->write($htmlpath.'/'.$htmlfile.'.html',$content);
       die;
    }

//    添加教师过着学的数据
    public function add(){
    if( Cookie::get('status') == 1){
            $this->success('你已经提交过了!', 'Comp/thanks');
            exit;
        }
      $session = [
            'local_id'=>session('lid'),
            'teacher_id'=>session('tid'),
            'teacher_class'=>session('cid'),
            'personnel_id'=>session('pid'),
        ];
      $data = input('post.');
      $datas = $data['intro'];
      if ($session['personnel_id'] == 1) {
        foreach ($datas as $k => $v) {
          if (empty($v)) {
            return $this->error('意见不能为空');
          }
        }
      }else {
        if (empty($datas)) {
          return $this->error('意见不能为空');
        }
      }
      
      if ($session['personnel_id'] == 1) {
        foreach ($datas as $key => $value) {
              $i = $key.':'.$value;
              $datas[$key]= $i;
            }
      }
      $list = model('comp')->adddata($session,$data['achievement']);
        $res = model('comp')->introAdd($session,$datas);  //添加教师的评论
        if ($list&$res){
            $this->error('添加失败');
        }


      Cookie::set('status',1);
        $this->success('添加成功', 'Comp/thanks');
    }

//    提交成功页面
    public function thanks()
    {
      return view("yes/thanks");
    }
}

