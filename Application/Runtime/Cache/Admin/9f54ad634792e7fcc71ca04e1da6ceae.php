<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <title>管理员后台登录页面</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Public/Admin/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/Admin/CSS/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/Public/Admin/CSS/matrix-login.css" />
    <link rel="stylesheet" href="/Public/Static/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/Public/Static/font-awesome-4.7.0/css/font-awesome.css" />
    <script src="/Public/Admin/JS/jquery-1.80.js"></script>
    <style>
        .control-group{
            padding: 12px 0 !important;
        }
    </style>
</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="" method="POST">
            <div class="control-group normal_text">
                <h3><img src="/Public/Admin/Images/logo.png" alt="Logo" /></h3>
            </div>
            <div class="control-group" style="margin-top:15px;">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="用户名"
                            name="loginname" id="loginname" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="密码"
                            name="password" id="password" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lz"><i class="fa fa-check-square-o" aria-hidden="true"></i></span><input
                            type="text" placeholder="验证码" name="verify" id="verify" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <img id="verifyImg" src="<?php echo U('Verify');?>" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <input type="button" id="submit" class="btn btn-success" value="登录" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    //验证码刷新
    var url = $('#verifyImg').attr('src');
    $('#verifyImg').click(function () {
        if (url.indexOf('?') > 0) {
            $(this).attr('src', url + '&random=' + Math.random());
        } else {
            $(this).attr("src", url.replace(/\?.*$/, '') + '?' + Math.random());
        }
    });

    //登录验证
    $('#submit').on('click', function () {
        var loginname = $('#loginname').val();
        var password = $('#password').val();
        var verify = $('#verify').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo U('Login/Index');?>",
            data: {
                'loginname': loginname,
                'password': password,
                'verify': verify
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 0) {
                    alert(data.info);
                    var url = $('#verifyImg').attr('src');
                    $('#verifyImg').attr('src', url);
                } else {
                    window.location.href = "<?php echo U('Index/Index');?>";
                }
            }
        });
    });

    //回车登录功能
    $(document).keyup(function (event) {
        if (event.keyCode == 13) {
            $("#submit").trigger("click");
        }
    });
</script>

</html>