<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>酒店展示</title>
</head>

<body style="background: rgb(238,238,238);">
    <div class="public_page">
        <div class="news_box clearfix">
            <div class="news">
                <h1 style="border-bottom:2px solid rgb(124,124,124);color:rgb(124,124,124);">酒店展示</h1>
                <ul class="news_nav clearfix">
                    <?php if(is_array($showcate)): $i = 0; $__LIST__ = $showcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$SC): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('Show/index',array('category'=>$SC['id']));?>"><?php echo ($SC["name"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="show_page_list clearfix">
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$S): $mod = ($i % 2 );++$i;?><li class="clearfix">
                            <div class="showImg">
                                <img src="<?php echo ($S["img"]); ?>" />
                            </div>
                            <div class="showCont">
                                <div class="showTitle"><?php echo ($S["name"]); ?></div>
                                <div class="showPreview"><?php echo ($S["preview"]); ?></div>
                                <a href="<?php echo U('Show/content',array('id'=>$S['id']));?>">查看</a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="/Public/Home/JS/jquery-1.80.js"></script>
<script>
    var url = window.location.href.toLowerCase();
    var navLength = $('.news_nav>li').length;
    for (var i = 0; i < navLength; i++) {
        var _href = $('.news_nav>li').eq(i).children('a').attr('href').toLowerCase();
        if (url.lastIndexOf(_href) > -1) {
            $('.news_nav>li').eq(i).addClass('catenav_hover').siblings().removeClass('catenav_hover');
        }
    }

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