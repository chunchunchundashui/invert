<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\invest\public/../application/index\view\index\index.html";i:1589937100;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>新华电脑学校问卷调查</title>
  <link rel="stylesheet" href="http://localhost/invest/public/static/index/css/index.css" />
  <link rel="stylesheet" href="http://localhost/invest/public/static/index/css/min.ui.css" />
  <style>
    .wrapper1 {
      padding: 0 15px;
      margin-top: 138px;
      text-align: center;
    }
    .wrapper1 p {
      color: block;
    }
  </style>
</head>
<body>

<div class="wrapper">
  <div class="check-box">
    <form action="<?php echo url('comp/index'); ?>" method="get" data-auto="true">
      <h3>新华电脑学校问卷调查</h3>
      <label for="">
        <span>调查方式:</span>
        <select required name="pid" id="survey">
          <option value="0"  disabled selected>--请选择--</option>
          <!--<?php var_dump($personnel);?>-->

          <?php if(is_array($personnel) || $personnel instanceof \think\Collection || $personnel instanceof \think\Paginator): $i = 0; $__LIST__ = $personnel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <option value="<?php echo $vo['id']; ?>"><?php echo $vo['pname']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </label>
      <label for="" class="hidden_class" style="display: none">
        <span>班级</span>
        <select name="lid" id="class">
          <option value="0" disabled selected >--请选择--</option>
          <?php if(is_array($local) || $local instanceof \think\Collection || $local instanceof \think\Paginator): $i = 0; $__LIST__ = $local;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?>
          <option value="<?php echo $class['name']; ?>"><?php echo $class['cname']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </label>
      <label for="" class="hidden_class" style="display: none">
        <span>教师</span>
        <select name="tid" id="teacher">
          <option value="0">--请选择--</option>
        </select>
      </label>
      <button style="width: 100%; cursor: pointer;" id="login" type="submit" class="mui-btn mui-btn-primary">
        提交
      </button>
    </form>
    <div class="wrapper1">
      <p> &copy;2020 版权所有  四川新华电脑学院</p>
      <p id="copyright">教师:陈雪冬</p>
      <a style="font-size: 12px; color: #8f8f94" href="http://www.yccpanda.com">学生:马冲 岳长春 刘友刚</a>
    </div>
  </div>

</div>
  <script src="http://localhost/invest/public/static/index/js/jquery-3.4.1.js"></script>
<script src="http://localhost/invest/public/static/index/js/jquery-3.3.1.min.js"></script>
<script src="http://localhost/invest/public/static/index/js/min.ui.js"></script>
  <script src="http://localhost/invest/public/static/index/js/jquery.cookie.js"></script>
<script src="http://localhost/invest/public/static/lib/layer/layer.js"></script>
<script type="text/javascript">
    $(function () {
      $("#login").click(function () {
            var $survey = $("#survey").val();
            var $class = $("#class").val();
            var $teacher = $("#teacher").val();
            var allcookies = $.cookie('status');
	   if($survey == null || $survey == ''){
                alert("请选择调查方式");
                return false
            }
            if($class == null || $class == ''){
                alert("请选择班级");
                return false
            }
            if($teacher == null || $teacher == ''){
                alert("请选择教师");
                return false
            }
         	if($teacher == null || $teacher == ''){
                alert("请选择教师");
                return false
            }
       		 if(allcookies ==1){
                alert("你已经参加过此次调研了");
                return false
            }
            return true
        });
        $('#survey').change(function () {
            if($('#survey').val()=='') {
                $(".hidden_class").hide();//隐藏
            }else{
                $(".hidden_class").show();//显示
            }
            $('#class').val([0]);//每次用户选择不同的调查方式,就将班级给回复成默认值
            $('#teacher').empty();
        });
        $('#class').change(function () {
            var pid = $("#survey").val();
            var l = $("#class").val();
            $.post("<?php echo url('index/teacher_local_select'); ?>",{
                per_id:pid,
                id:l
            },function(data) {
                $('#teacher').empty();
                $.each(data, function(key, val) {
                    if (pid == 1) {
                        $('#teacher').append('<option value="'+val.id+'">'+val.class_name+'</option>');
                    }else {
                        $('#teacher').append('<option value="'+val.id+'">'+val.teacher_name+'</option>');
                    }
                });
                return false;
            });
        });
    });
</script>
</body>
</html>
