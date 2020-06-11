<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\phpStudy\WWW\invest\public/../application/index\view\common\index.html";i:1589458089;s:65:"D:\phpStudy\WWW\invest\application\index\view\public\Teacher.html";i:1589073148;s:65:"D:\phpStudy\WWW\invest\application\index\view\public\Student.html";i:1589073262;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>新华电脑学校问卷调查</title>
    <link rel="stylesheet" href="http://localhost/invest/public/static/index/css/check.css" />
    <link rel="stylesheet" href="http://localhost/invest/public/static/index/css/min.ui.css" />
</head>
<style>
    .warning{
        outline: 1px solid red!important;
    }
</style>
<body>

<div class="wrapper">
    <header>
        <div class="bg"></div>
        <h3><?php echo $list['personnel']['name']; ?>调查问卷</h3>
        <?php if($list['personnel']['id'] == 1): ?>
        <p class="title2">班级:<?php echo $list['class_name']['name']; ?>:<?php echo $list['class_name']['tname']; ?></p>
        <?php else: ?>
        <p class="title2">班级:<?php echo $list['teacher_name']['name']; ?>:<?php echo $list['teacher_name']['tname']; ?></p>
        <?php endif; ?>
        <h6>您好:</h6>
        <p class="descrip">
            欢迎参加学生满意度调查工作!
            此次调查是本校为了学生拥有更好的在校生活而专门设计的
            希望你抽出一点时间积极配合我们的调查工作,谢谢你的参与
        </p>
        <h6>说明:</h6>
        <p class="descrip">
            本次调查采用匿名形式,我们将严格保密你的信息
        </p>
    </header>
    <?php if($data['pid'] == 2): ?>
        <div class="content">
    <form action="">
        <div class="classify">
            <!-- offset="0" length='20' 限定循坏出来的数据-->
                        <h4 class="title" style="color: black">1.老师一直仪表大方、举止得体吗？</h4>
            <div class="question-box radio_question" id="div1" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[1]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[1]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[1]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[1]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[1]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">2.老师上课时声音洪亮、运用普通话吗？</h4>
            <div class="question-box radio_question" id="div2" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[2]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[2]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[2]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[2]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[2]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">3.任课老师在上课前是否对班级学生点名?</h4>
            <div class="question-box radio_question" id="div3" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[3]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[3]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[3]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[3]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[3]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">4.老师在上课期间对课堂纪律是否严格管理?</h4>
            <div class="question-box radio_question" id="div4" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[4]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[4]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[4]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[4]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[4]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">5.老师上课从不接听手机吗?</h4>
            <div class="question-box radio_question" id="div5" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[5]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[5]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[5]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[5]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[5]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">6.老师从未有过迟到、早退或推迟下课现象吗？</h4>
            <div class="question-box radio_question" id="div6" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[6]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[6]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[6]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[6]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[6]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">7.老师对您提出的问题耐心解答吗？</h4>
            <div class="question-box radio_question" id="div7" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[7]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[7]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[7]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[7]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[7]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">8.老师运用案例是否符合市场需求？</h4>
            <div class="question-box radio_question" id="div8" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[8]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[8]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[8]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[8]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[8]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">9.授课过程中，老师是否经常提问并与学生交流？</h4>
            <div class="question-box radio_question" id="div9" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[9]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[9]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[9]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[9]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[9]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">10.授课过程中，你是否了解本门课程的授课目标和进度计划？</h4>
            <div class="question-box radio_question" id="div10" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[10]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[10]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[10]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[10]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[10]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">11.老师上课方法是否易于接受？</h4>
            <div class="question-box radio_question" id="div11" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[11]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[11]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[11]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[11]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[11]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">12.老师引导和启发，使你对课程产生兴趣并喜欢吗？</h4>
            <div class="question-box radio_question" id="div12" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[12]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[12]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[12]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[12]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[12]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">13.老师是否经常关注学生对教学内容的掌握程度？</h4>
            <div class="question-box radio_question" id="div13" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[13]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[13]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[13]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[13]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[13]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">14.老师布置的作业与本节课教学内容结合紧密吗？</h4>
            <div class="question-box radio_question" id="div14" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[14]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[14]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[14]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[14]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[14]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">15.老师对布置作业完成情况是否过问？</h4>
            <div class="question-box radio_question" id="div15" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[15]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[15]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[15]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[15]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[15]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">16.老师经常联系实际，注重学生能力及素质培养吗？</h4>
            <div class="question-box radio_question" id="div16" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[16]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[16]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[16]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[16]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[16]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">17.老师的授课对你是否有吸引力？</h4>
            <div class="question-box radio_question" id="div17" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[17]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[17]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[17]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[17]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[17]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">18.每堂课教学目标和任务明确吗？</h4>
            <div class="question-box radio_question" id="div18" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[18]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[18]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[18]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[18]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[18]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">19.老师对教学设备的使用是否熟练？</h4>
            <div class="question-box radio_question" id="div19" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[19]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[19]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[19]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[19]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[19]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <h4 class="title" style="color: black">20.老师授课认真负责，从不把正课时间安排自习</h4>
            <div class="question-box radio_question" id="div20" aria-selected="fasle">
                <!--1为学生,2为老师-->
                <div class="question-answer">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[20]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[20]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[20]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[20]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[20]" value="80"/><span>非常不满意</span></label></a>
                </div>
            </div>
                        <div class="question-box">
                <p class="question" id="div意见">其他意见</p>
                <textarea
                        style="resize:none"
                        name="intro"
                        id="intro"
                        cols="1"
                        rows="4"
                ></textarea>
            </div>
        </div>
        <input type="button" id="login" dataid="" name="commit" style="margin-left:150px; margin-bottom: 20px;" value="提交">
    </form>
</div>



    <?php else: ?>
        <div class="content">
        <form action="" method="post" name="form" id="myform">
                  <div class="classify" >
            <h4 class="title">后勤管理</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">对学生的学习和生活所需的各类维修状况总是很及时?</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[23]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[23]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[23]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[23]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[23]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">库房物资领用是否顺畅,服务态度是否好</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[24]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[24]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[24]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[24]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[24]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">保安是否按照要求上课期间出入登记,保安态度是否良好</p>
                                    <div class="question-answer radio_question" id="div3">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[25]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[25]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[25]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[25]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[25]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">公共卫生区域卫生保洁打扫是否及时,垃圾是否及时清理</p>
                                    <div class="question-answer radio_question" id="div4">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[26]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[26]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[26]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[26]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[26]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[后勤管理]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">教学质量服务</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">教师上课、上机时，对作业是否每次都认真批改和讲评？</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[27]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[27]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[27]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[27]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[27]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校教师能够为人师表、按时上课？</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[28]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[28]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[28]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[28]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[28]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">教师备课充分、课堂内容充实、具有条理性？</p>
                                    <div class="question-answer radio_question" id="div3">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[29]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[29]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[29]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[29]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[29]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校组织的测验和考试的内容能反映课程的重要部分？</p>
                                    <div class="question-answer radio_question" id="div4">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[30]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[30]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[30]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[30]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[30]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">课外教师经常主动找学生谈心，了解并指导学生学习？</p>
                                    <div class="question-answer radio_question" id="div5">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[31]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[31]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[31]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[31]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[31]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">课内外教师都愿意解答和帮助学生，上机均有老师辅导？</p>
                                    <div class="question-answer radio_question" id="div6">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[32]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[32]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[32]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[32]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[32]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">任课老师在上课前是否对班级学生点名？</p>
                                    <div class="question-answer radio_question" id="div7">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[33]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[33]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[33]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[33]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[33]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校的职业素质课对我帮助很大，对班级学生素质提升有益？</p>
                                    <div class="question-answer radio_question" id="div8">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[34]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[34]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[34]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[34]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[34]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">任课老师在上课时是否对违纪学生进行管理或提醒？</p>
                                    <div class="question-answer radio_question" id="div9">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[35]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[35]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[35]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[35]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[35]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">教师语言清晰流畅、言能达意、讲课生动、形象？</p>
                                    <div class="question-answer radio_question" id="div10">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[36]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[36]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[36]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[36]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[36]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[教学质量服务]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">学生综合管理</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">班主任工作负责，经常主动找学生谈心，及时协调处理学生反映的各类问题并将处理结果反馈给学生？</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[37]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[37]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[37]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[37]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[37]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校考试纪律严明，考风正派？</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[38]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[38]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[38]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[38]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[38]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校组织了职业素质课程教育，个人受益很多？</p>
                                    <div class="question-answer radio_question" id="div3">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[39]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[39]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[39]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[39]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[39]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">班级是否对教室卫生,公共区域卫生进行责任划分并督促打扫</p>
                                    <div class="question-answer radio_question" id="div4">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[40]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[40]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[40]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[40]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[40]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">你是否接受过学校组织的安全教育,包括食品安全,意外伤害,人生财产安全等</p>
                                    <div class="question-answer radio_question" id="div5">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[41]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[41]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[41]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[41]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[41]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校社团管理是否规范,社团成员工作是否出色</p>
                                    <div class="question-answer radio_question" id="div6">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[42]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[42]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[42]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[42]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[42]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">近期校园公共卫生状态是否良好</p>
                                    <div class="question-answer radio_question" id="div7">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[43]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[43]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[43]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[43]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[43]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">近期校园保卫和保安设施是否齐全，学校安全状况良好</p>
                                    <div class="question-answer radio_question" id="div8">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[44]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[44]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[44]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[44]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[44]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">对违纪的学生是否及时进行管理教育</p>
                                    <div class="question-answer radio_question" id="div9">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[45]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[45]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[45]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[45]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[45]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校组织的比赛、文艺活动多、能够丰富学生的课余生活？</p>
                                    <div class="question-answer radio_question" id="div10">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[46]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[46]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[46]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[46]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[46]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[学生综合管理]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">机房管理</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">机房老师服务态度好，经常主动巡查，上机秩序井然？</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[47]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[47]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[47]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[47]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[47]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">教学设备软硬件维护维修及时，可满足学习需要？</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[48]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[48]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[48]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[48]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[48]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[机房管理]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">就业</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校是否安排了就业指导课程？</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[49]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[49]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[49]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[49]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[49]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">通过就业指导课程的学习，你是否清楚的了解就业政策？</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[50]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[50]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[50]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[50]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[50]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[就业]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">考证</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学校是否组织了考证辅导和讲座？</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[51]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[51]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[51]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[51]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[51]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">通过考证辅导和讲座，使我对考证很感兴趣？</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[52]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[52]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[52]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[52]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[52]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[考证]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">宿舍管理</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学生宿舍内卫生干净整洁?</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[53]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[53]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[53]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[53]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[53]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">宿舍管理员服务态度好,宿舍管理有序,未发生偷盗,打架,男女生串房,留宿外来人员等现象?</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[54]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[54]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[54]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[54]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[54]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[宿舍管理]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">食堂超市管理</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">近期学校餐饮条件良好,食堂卫生情况较好,以及用餐费用合理.</p>
                                    <div class="question-answer radio_question" id="div1">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[55]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[55]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[55]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[55]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[55]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">校园超市没有出现过三无产品、过期产品。</p>
                                    <div class="question-answer radio_question" id="div2">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[56]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[56]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[56]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[56]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[56]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">学生浴室水温是否合适，水量是否充足。</p>
                                    <div class="question-answer radio_question" id="div3">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[57]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[57]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[57]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[57]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[57]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question">开水房水温是否达标,计费是否正常?</p>
                                    <div class="question-answer radio_question" id="div4">
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[58]" value="100"/><span>非常满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[58]" value="95"/><span>满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[58]" value="90"/><span>一般</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[58]" value="85"/><span>不满意</span></label></a>
                    <a href="javascript:void(0)"><label><input type="radio" name="achievement[58]" value="80"/><span>非常不满意</span></label></a>
                  </div>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[食堂超市管理]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">在校期间，你缴费以后是否都拿到发票？如缴费后未拿到发票，请写明具体情况</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question"></p>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[在校期间，你缴费以后是否都拿到发票？如缴费后未拿到发票，请写明具体情况]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                  <div class="classify" >
            <h4 class="title">除了学校咨询中心,你是否向学校其他老师交过费用?</h4>
                            <div class="question-box">
                  <!--1为学生,2为老师-->
                  <p class="question"></p>
                                  </div>
                            <div class="question-box">
                  <p class="question">其他意见</p>
                  <textarea
                      style="resize:none"
                      name="intro[除了学校咨询中心,你是否向学校其他老师交过费用?]"
                      id="intro"
                      cols="1"
                      rows="4"
                  ></textarea>
                        </div>
              </div>
          <input type="submit" id="login" name="commit"  data="36" style="margin-left:150px; margin-bottom: 20px;" value="提交" >
          <input type="hidden" name="__token__" value="27db1bf1821501f9b1bd0ab9f0e4ef00" >
        </form>
      </div>

    <?php endif; ?>
</div>
<script src="http://localhost/invest/public/static/index/js/jquery-3.4.1.js"></script>
<script src="http://localhost/invest/public/static/index/js/min.ui.js"></script>
<script src="http://localhost/invest/public/static/lib/layer/layer.js"></script>
<script type="text/javascript" charset="utf-8">
    $(function(){
        $('#login').one('click',function () {
            var arr = [];  //初始化选择和没有选择的题目，为判断用户答题数
            var myxuanti = [];  //初始化用户保存用户那个题目没有被选中的题目编号
            $.each($(".radio_question"), function(index,val) {
                if($(this).find("input[type=radio]:checked").val()){
                    arr.push(1);   //1：代表选中的题目
                }else{
                    arr.push(2);   //2：代表为选中的题目
                    myxuanti.push($(this).attr("id").substr(3)); //获取没有被选中的题目，并且截取题目编号保存到数组中
                }
            });
            if($("#intro").val() == ''){
                layer.msg("其他意见最少6个字符，请填写之后在进行提交！",{icon:2,time:2000});
                return false;
            }
            var result = $.inArray(2, arr);    //判断数组中是否存在某个元素
            if (result >= 0) {  //提示那个没有被选中
                layer.msg("您有以下题目："+myxuanti.join(",")+'没有选择，请选择之后在进行提交！',{icon:2,time:2000});
                //console.log("您有以下题目："+myxuanti.join(",")+'没有选择，请选择之后在进行提交！');
                return false;
            }else{   //这个else里面发送ajax异步请求
                $.ajax({
                    url:"<?php echo url('comp/add'); ?>",
                    type:'post',
                    data:$('form').serialize(),
                    dataType:'json',
                    success: function (data) {
                        //循环使用is进行判断
                        //do something
                        if (data.code == 1) {
                            layer.msg(data.msg,{icon:1,time:500}, function () {
                                location.href = data.url;
                            });
                        }else {
                            layer.msg(data.msg,{icon:2,time:1000});
                            return false;
                        }
                    }
                });
            }
            return false;
        });
    });
</script>
</body>
</html>
