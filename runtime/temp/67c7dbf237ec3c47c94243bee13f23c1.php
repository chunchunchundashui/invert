<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\invest\public/../application/admin\view\login\index.html";i:1587087656;s:60:"D:\phpStudy\WWW\invest\application\admin\view\public\js.html";i:1580893892;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>调查系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,  initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/invest/public/static/login/admin/css/login.css" />
    <link href="http://localhost/invest/public/static/admin/style/font-awesome.css" rel="stylesheet">
</head>
<body>
<main>
    <div class="describe">
        <h1>满意度调查登录</h1>
    </div>
    <form>
        <div class="single-election">
            <div><span>用户名：</span><input type="text" name="name" placeholder="请输入用户名" minlength="5" required /></div>
            <div><span>密码： </span><input style="position: relative;" type="password" name="pwd" id="pwd"  placeholder="请输入密码" minlength="6" required/>
                <!--  密码小眼睛  -->
                <i style="left: 366px; bottom: 26px;color: black; margin-bottom: 241px; position: absolute;" class="fa fa-eye"  onclick="showStart1()" id="eye"></i>
            </div>
            <div><span>验证码： </span><input type="text" name="verifyCode" id="verifyCode"  placeholder="请输入验证码" /></div>
            <div>
                    <span class="input-group-addon"><img src="<?php echo url('Login/verify'); ?>" id="vcode" alt="captcha" style="width: 215px;height: 66px;margin-left: 88px;" onClick="this.src='<?php echo url('Login/verify'); ?>?' + 'rand=' + Math.random()"></span>
            </div>
        </div>
        <div class="submit">
            <button type="submit" id="login">提交</button>
        </div>
    </form>
</main>

<script src="http://localhost/invest/public/static/admin/style/jquery-3.4.1.min.js"></script>
<script src="http://localhost/invest/public/static/admin/style/bootstrap.js"></script>
<script src="http://localhost/invest/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="http://localhost/invest/public/static/admin/style/beyond.js"></script>
<script src="http://localhost/invest/public/static/lib/layer/layer.js"></script>




<script>
    //验证码刷新函数
    function refresh(){
        var vcode = document.getElementById('vcode');
        vcode.src = '<?php echo url('Login/verify'); ?>?' + 'rand=' + Math.random();
    }

    $(function () {
        $('#login').click(function () {
            $.ajax({
                url:"<?php echo url('login/index'); ?>",
                type:'post',
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon:6,
                            time:1000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                      var test = document.getElementById('verifyCode');     //输入错误信息清空值
                      test.value = '';
                      var test1 = document.getElementById('pwd');    //输入错误信息清空值
                      test1.value = '';
                      layer.open({
                            title:"登陆失败!",
                            content:data.msg,
                            icon:5,
                            anim:6,
                        });
                        refresh();
                    }
                }
            });
            return false;
        });
    });

    function showStart1()  {

        if (pwd.type == "password") {
            pwd.type = "text";
            eye.className='fa fa-eye-slash'
        }else {
            pwd.type = "password";
            eye.className='fa fa-eye'
        }
    }


</script>
</body>
</html>