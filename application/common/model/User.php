<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/12/17
 * Time: 8:45
 */
namespace app\common\model;

class User extends Base
{
    //职位添加
    public function add($data)
    {
        $add = [
            'name|用户名' => 'require|unique:user|min:6',
            'pwd|密码' => 'require|min:6|confirm:newpwd',
            'newpwd|确定密码' => 'require|min:6|confirm:pwd',
        ];
        $validate = new \app\common\validate\User($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $data['pwd'] = md5($data['newpwd']);
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return "用户添加失败!";
        }
    }

    //修改
    public function edit($data)
    {

        $rule = [
            'pwd|原密码' => 'require|min:6',
            'pwds|新密码' => 'require|min:6|confirm:newpws',
            'newpws|确实密码' => 'require|min:6|confirm:pwds',
            'name|昵称' => 'require',
        ];
        $validate = new \app\common\validate\User($rule);
        if (!$validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        if (md5($data['pwd']) != $adminInfo['pwd']) {
            return "原密码不正确!";
        }
        unset($data['pwds']);
        $data['pwd'] = md5($data['newpws']);
        unset($data['newpws']);
        $result = $adminInfo->save($data);
        if ($result) {
            return 1;
        }else {
            return "用户修改失败!";
        }
    }

    //登陆验证
    public function login($data)
    {
        unset($data['verifyCode']);
        $data['pwd'] = md5($data['pwd']);
        $result = model('user')->where($data)->find();

        if ($result) {
            if ($result['status'] == 1 || $result['status'] == 2) {
                //1表示有这个用户,也就是用户名和密码正确了
                $sessionData = [
                    'id' => $result['id'],
                    'name' => $result['name'],
                ];
//            dump($sessionData);die;
                session('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', $sessionData);
                return 1;
            }
            return "此账户被禁用了!";
        }else{
            return "用户名或者密码错误!";
        }
    }
}