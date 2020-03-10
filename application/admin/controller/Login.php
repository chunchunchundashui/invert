<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;

class Login extends Controller
{
    //重复登录过滤
    public function _initialize()
    {
        if (session('?ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.id')) {
            $this->redirect('admin/index/index');
        }
    }

    public function index()
    {
        if (request()->isAjax()) {
            $data = input('post.');
//                        验证器
            $validate = validate('login');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $result = model('user')->login($data);
            if($result == 1){
                return json(array('code'=>'1', 'msg'=>"登陆成功", 'data'=> '', 'url'=>url("admin/index/index")));
            }else{
                return json(array('code'=>'0','msg'=>"登陆失败", 'data'=> '', 'url'=>url("admin/login/index")));
            }
        }
        return view();
    }

    //生成验证码
    public function verify()
    {
        //如果gd库也开启了但是就是不能正常的生成验证码可以使用ob_clean()实现
        $config = array(
            'fontSize' => 20,              // 验证码字体大小(px)
            'useCurve' => false,            // 是否画混淆曲线
            'useNoise' => false,            // 是否添加杂点
            'imageH' => 50,               // 验证码图片高度
            'imageW' => 140,               // 验证码图片宽度
            'length' => 4,               // 验证码位数
            'codeSet'    =>  '0123456789',             // 验证码字体
            'reset ' => true
        );
        //实例化验证码类
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
}
