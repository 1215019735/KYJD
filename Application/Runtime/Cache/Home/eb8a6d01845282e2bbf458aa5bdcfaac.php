<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>服务设施</title>
</head>

<body style="background: rgb(238,238,238);">
    <div class="public_page">
        <div class="server_box clearfix">
            <div class="server_box clearfix">
                <div class="server">
                    <h1 style="border-bottom:2px solid rgb(124,124,124);color:rgb(124,124,124);">服务设施</h1>
                    <ul class="show_page_list clearfix">
                        <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
                                <div class="showImg">
                                    <img src="<?php echo ($vo["img"]); ?>" />
                                </div>
                                <div class="showCont">
                                    <div class="showTitle"><?php echo ($vo["name"]); ?></div>
                                    <div class="showPreview"><?php echo ($vo["preview"]); ?></div>
                                    <a href="<?php echo U('Server/content',array('id'=>$vo['id']));?>">查看</a>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="public_rule" style="margin:40px auto 0 auto;" />
        <?php echo ($data["page"]); ?>
    </div>
</body>
<script src="/Public/Home/JS/jquery-1.80.js"></script>
<script>
    $('.server_page_list>li').hover(function () {
        $(this).children('a').children('.server_list_box').stop().animate({
            'opacity': '1'
        }).css({
            'flter': 'Alpha(Opacity=100)'
        });
    }, function () {
        $(this).children('a').children('.server_list_box').stop().animate({
            'opacity': '0'
        }).css({
            'flter': 'Alpha(Opacity=0)'
        });
    });
</script>

</html>