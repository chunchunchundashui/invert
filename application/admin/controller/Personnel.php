<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/16
 * Time: 20:51
 */

namespace app\admin\controller;



use think\Cache;

class Personnel extends Base
{
    protected $Controller = 'Personnel';
    public function upload(){
        if (request()->isPost()) {
            $data = input('post.');
            if ($data['id'] == 2){
                $HtmlName = 'Teacher';
            }elseif($data['id'] == 1){
                $HtmlName = 'Student';
            }
            $file = APP_PATH.'index/view/public/'.$HtmlName.'.html';
            if(!empty(file_exists($file))){//检测是否存在该文件,存在执行给文件,不存在则生成
                    $res = unlink($file);
                    if ($res == true){
                       $this->success('上传成功','Personnel/index');
                    }else{
                       $this->error('上传失败','Personnel/index');
                    }
                }else{
                       $this->error('操作过于频繁','Personnel/index');
                }

        }
    }
}