<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>新闻资讯</title>
</head>

<body style="background: rgb(238,238,238);">
    <div class="public_page">
        <div class="news_box clearfix">
            <div class="news">
                <h1 style="border-bottom:2px solid rgb(124,124,124);color:rgb(124,124,124);">新闻资讯</h1>
                <ul class="news_nav clearfix">
                    <?php if(is_array($newscate)): $i = 0; $__LIST__ = $newscate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$NC): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('News/index',array('category'=>$NC['id']));?>"><?php echo ($NC["name"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="show_page_list clearfix">
                    <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
                            <div class="showImg">
                                <img src="<?php echo ($vo["img"]); ?>" />
                            </div>
                            <div class="showCont">
                                <div class="showTitle"><?php echo ($vo["title"]); ?></div>
                                <div class="showPreview"><?php echo ($vo["preview"]); ?></div>
                                <a href="<?php echo U('News/content',array('id'=>$vo['id']));?>">查看</a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <hr class="public_rule" />
                <?php echo ($data["page"]); ?>
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
</script>

</html>