<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="<?php echo ($C["keywords"]); ?>"/>
    <meta name="description" content="<?php echo ($C["description"]); ?>"/>
    <link rel="stylesheet" href="/Public/Home/CSS/mobile.css">
    <link rel="stylesheet" href="/Public/Static/swiper-4.4.1/dist/css/swiper.css">
    <link rel="icon" href="/Public/Home/Images/icon.png" type="image/x-icon" />
    <title><?php echo ($C["company"]); ?></title>
    <script src="/Public/Home/JS/jquery-1.80.js"></script>
    <script src="/Public/Home/JS/mobile.js"></script>
</head>

<body>
    <!-- <div id="loading">
        <img src="/Public/Home/Images/loading.gif" />
    </div> -->
    <div class="header">
        <div class="core clearfix">
            <div class="logo">
                <a href="<?php echo U('/Mobile');?>">
                    <img src="/Public/Home/Images/mini-logo.png" />
                </a>
            </div>
            <div class="menu">
                <img src="/Public/Home/Images/menu.png" />
            </div>
            <div class="draw">
                <a href="javascript:void(0)">
                    <img src="/Public/Home/Images/draw.png" />
                </a>
            </div>
            <div class="tels">
                <a href="tel:<?php echo ($C["tel"]); ?>">
                    <img src="/Public/Home/Images/mobile-tels.png" />
                </a>
            </div>
        </div>
    </div>
    
    <div class="scroll">
        <div class="scroll-box swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="home-banner">
                        <div class="public core">
                            <div class="home-title">GRAND NEW CENTURY HOTEL FUZHOU JIANGXI</div>
                            <div class="home-titles">抚州凤凰开元名都大酒店</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="about-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>企业简介</span>
                            </div>
                            <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><div class="about-content-box public">
                                    <div class="about-content">
                                        <?php echo ($A["preview"]); ?>
                                    </div>
                                    <a href="<?php echo U('About/index',array('category'=>$A['category']));?>" class="about-more clearfix">
                                        <span>查看详情</span>
                                        <img src="/Public/Home/Images/mobile-right.png" />
                                    </a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="show-banner">
                        <div class="core">
                            <div class="public-title hr">
                                <span>酒店展示</span>
                            </div>
                            <ul class="show-nav">
                                <?php if(is_array($showcate)): $i = 0; $__LIST__ = $showcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$SC): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($SC["id"]); ?>"><?php echo ($SC["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="vr">
                                    <a href="https://720yun.com/t/853jupmOzm2?scene_id=22576819">VR</a>
                                </div>
                            </ul>
                            <div class="show-box public">
                                <div class="show-main">
                                    <div class="show-main-img"></div>
                                </div>
                                <ul class="show-main-nav"></ul>
                                <a href="<?php echo U('Show/index');?>" class="show-more clearfix">
                                    <span>查看全部</span>
                                    <img src="/Public/Home/Images/mobile-rights.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="server-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>服务设施</span>
                            </div>
                            <div class="server-box">
                                <div class="server-main">
                                    <div class="swiper-wrapper">
                                        <?php if(is_array($server)): $i = 0; $__LIST__ = $server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$S): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                                                <a href="<?php echo U('Server/content',array('id'=>$S['id']));?>">
                                                    <img src="<?php echo ($S["img"]); ?>" width="100%" />
                                                    <div class="server-title"><?php echo ($S["name"]); ?></div>
                                                </a>
                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div class="swiper-pagination-server"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="news-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>新闻资讯</span>
                            </div>
                            <div class="news-box public">
                                <?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$N): $mod = ($i % 2 );++$i;?><div class="news-img">
                                        <a href="<?php echo U('News/content',array('id'=>$N['id']));?>">
                                            <img src="<?php echo ($N["img"]); ?>" />
                                        </a>
                                    </div>
                                    <div class="news-title">
                                        <a href="<?php echo U('News/content',array('id'=>$N['id']));?>"><?php echo ($N["title"]); ?></a>
                                    </div>
                                    <div class="news-preview">
                                        <?php echo ($N["preview"]); ?>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <hr class="rule" />
                                <ul>
                                    <?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$N): $mod = ($i % 2 );++$i;?><li>
                                            <a href="<?php echo U('News/content',array('id'=>$N['id']));?>" class="clearfix">
                                                <div class="news-titles">· <?php echo ($N["title"]); ?></div>
                                                <div class="news-times"><?php echo ($N["times"]); ?></div>
                                            </a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <a href="<?php echo U('News/index');?>" class="news-more clearfix">
                                    <span>查看全部</span>
                                    <img src="/Public/Home/Images/mobile-rights.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="select-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>酒店精选</span>
                            </div>
                            <div class="select-box public">
                                <div class="swiper-wrapper">
                                    <?php if(is_array($jx)): $i = 0; $__LIST__ = $jx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$J): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                                            <div class="select-img">
                                                <a href="<?php echo U('Select/content',array('id'=>$J['id']));?>">
                                                    <img src="<?php echo ($J["img"]); ?>" />
                                                </a>
                                            </div>
                                            <div class="select-title">
                                                <a href="<?php echo U('Select/content',array('id'=>$J['id']));?>"><?php echo ($J["title"]); ?></a>
                                            </div>
                                            <div class="select-preview"><?php echo ($J["preview"]); ?></div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="swiper-pagination-select"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="zp-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>人才招聘</span>
                            </div>
                            <div class="zp-box public">
                                <?php if(is_array($zp)): $i = 0; $__LIST__ = $zp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Z): $mod = ($i % 2 );++$i;?><ul class="zp_type clearfix">
                                        <li>招聘岗位：<?php echo ($Z["posts"]); ?></li>
                                        <li>学历要求：<?php echo ($Z["qualifications"]); ?></li>
                                        <li>【<?php echo ($Z["times"]); ?>】</li>
                                    </ul>
                                    <div class="zp_content">
                                        <?php echo ($Z["preview"]); ?>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <a href="<?php echo U('Zp/index');?>" class="zp-more clearfix">
                                    <span>查看全部</span>
                                    <img src="/Public/Home/Images/mobile-rights.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="contact-banner">
                        <div class="core">
                            <div class="public-title">
                                <span>联系我们</span>
                            </div>
                            <div class="contact-box public">
                                <div class="code">
                                    <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codes): $mod = ($i % 2 );++$i;?><img src="<?php echo ($codes["code"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <ul>
                                    <li><?php echo ($C["company"]); ?></li>
                                    <li>联系电话：<?php echo ($C["telephone"]); ?></li>
                                    <li>传真号码：<?php echo ($C["ctel"]); ?></li>
                                    <li>邮政编码：<?php echo ($C["email"]); ?></li>
                                    <li>地址：<?php echo ($C["address"]); ?></li>
                                    <li>备案号：<?php echo ($C["icp"]); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="line">
                            <div class="core">
                                <div class="line-box clearfix">
                                    <a href="<?php echo U('/Mobile');?>" class="language clearfix">
                                        <span>Chinese</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="tel:<?php echo ($C["tel"]); ?>">
                                                <img src="/Public/Home/Images/mobile-tel.png" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($C["qq"]); ?>&site=qq&menu=yes">
                                                <img src="/Public/Home/Images/mobile-qq.png" />
                                            </a>
                                        </li>
                                        <li class="wechat">
                                            <img src="/Public/Home/Images/mobile-wechat.png" />
                                        </li>
                                        <li>
                                            <a href="<?php echo U('Contact/index');?>">
                                                <img src="/Public/Home/Images/mobile-position.png" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-logo">
                                    <a href="<?php echo U('/');?>">
                                        <img src="/Public/Home/Images/mini-footer-logo.png" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Static/swiper-4.4.1/dist/js/swiper.js"></script>
    <script>
        $('.show-nav>li').click(function () {
            var _id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '/Mobile/Index/Show',
                data: {
                    'id': _id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('.show-main-nav').empty();
                    for (let i = 0; i < data.length && i < 3; i++) {
                        $('.show-main-nav').append('<li data-cate="' + data[i].category + '"><img src="' + data[i].img + '" /></li>');
                    }

                    $('.show-main-nav>li:first').addClass('left');
                    $('.show-main-nav>li:last').addClass('right');

                    var _cates = $('.show-main-nav>li:first').attr('data-cate');
                    $.ajax({
                        type: 'POST',
                        url: '/Mobile/Index/Showin',
                        data: {
                            'cate': _cates
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            $('.show-main-img').empty();
                            $('.show-main-img').append("<div class='swiper-button-next'></div>");
                            $('.show-main-img').append("<div class='swiper-button-prev'></div>");
                            $('.show-main-img').append('<ul class="swiper-wrapper"></ul>');
                            for (let i = 0; i < data.length; i++) {
                                $('.show-main-img>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                            }

                            var swiper_show = new Swiper('.show-main-img', {
                                centeredSlides: true,
                                observer: true,
                                observeParents: true,
                                autoplay: {
                                    delay: 3000,
                                    disableOnInteraction: false,
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                            });
                        }
                    });

                    $('.show-main-nav>li').click(function () {
                        var _cate = $(this).attr('data-cate');
                        $.ajax({
                            type: 'POST',
                            url: 'Mobile/Index/Showin',
                            data: {
                                'cate': _cate
                            },
                            dataType: 'JSON',
                            success: function (data) {
                                $('.show-main-img').empty();
                                $('.show-main-img').append("<div class='swiper-button-next'></div>");
                                $('.show-main-img').append("<div class='swiper-button-prev'></div>");
                                $('.show-main-img').append('<ul class="swiper-wrapper"></ul>');
                                for (let i = 0; i < data.length; i++) {
                                    $('.show-main-img>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                                }

                                var swiper_show = new Swiper('.show-main-img', {
                                    centeredSlides: true,
                                    observer: true,
                                    observeParents: true,
                                    autoplay: {
                                        delay: 3000,
                                        disableOnInteraction: false,
                                    },
                                    pagination: {
                                        el: '.swiper-pagination',
                                        clickable: true,
                                    },
                                    navigation: {
                                        nextEl: '.swiper-button-next',
                                        prevEl: '.swiper-button-prev',
                                    },
                                });
                            }
                        });
                    });
                }
            });
        });

        var _ids = $('.show-nav>li:first').attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/Mobile/Index/Show',
            data: {
                'id': _ids
            },
            success: function (data) {
                for (let i = 0; i < data.length && i < 3; i++) {
                    $('.show-main-nav').append('<li data-cate="' + data[i].category + '"><img src="' + data[i].img + '" /></li>');
                }

                $('.show-main-nav>li:first').addClass('left');
                $('.show-main-nav>li:last').addClass('right');

                var _cates = $('.show-main-nav>li:first').attr('data-cate');
                $.ajax({
                    type: 'POST',
                    url: '/Mobile/Index/Showin',
                    data: {
                        'cate': _cates
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $('.show-main-img').empty();
                        $('.show-main-img').append("<div class='swiper-button-next'></div>");
                        $('.show-main-img').append("<div class='swiper-button-prev'></div>");
                        $('.show-main-img').append('<ul class="swiper-wrapper"></ul>');
                        for (let i = 0; i < data.length; i++) {
                            $('.show-main-img>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                        }

                        var swiper_show = new Swiper('.show-main-img', {
                            centeredSlides: true,
                            observer: true,
                            observeParents: true,
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                    }
                });

                $('.show-main-nav>li').click(function () {
                    var _cate = $(this).attr('data-cate');
                    $.ajax({
                        type: 'POST',
                        url: '/Mobile/Index/Showin',
                        data: {
                            'cate': _cate
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            $('.show-main-img').empty();
                            $('.show-main-img').append("<div class='swiper-button-next'></div>");
                            $('.show-main-img').append("<div class='swiper-button-prev'></div>");
                            $('.show-main-img').append('<ul class="swiper-wrapper"></ul>');
                            for (let i = 0; i < data.length; i++) {
                                $('.show-main-img>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                            }

                            var swiper_show = new Swiper('.show-main-img', {
                                centeredSlides: true,
                                observer: true,
                                observeParents: true,
                                autoplay: {
                                    delay: 3000,
                                    disableOnInteraction: false,
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                            });
                        }
                    });
                });
            }
        });
    </script>

    <div class="menu-open">
        <div class="core">
            <div class="close-box clearfix">
                <div class="close">
                    <img src="/Public/Home/Images/close.png" />
                </div>
            </div>
            <ul class="menu-nav clearfix">
                <div class="nav-top clearfix">
                    <li>
                        <a href="javascript:void(0)">酒店简介</a>
                        <ol>
                            <li>
                                <a href="<?php echo U('About/index',array('category'=>1));?>">企业简介</a>
                            </li>
                            <li>
                                <a href="<?php echo U('About/index',array('category'=>2));?>">酒店文化</a>
                            </li>
                            <li>
                                <a href="<?php echo U('About/index',array('category'=>3));?>">组织荣誉</a>
                            </li>
                            <li>
                                <a href="<?php echo U('About/index',array('category'=>4));?>">活动风采</a>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <a href="<?php echo U('News/index');?>">新闻资讯</a>
                        <ol>
                            <li>
                                <a href="<?php echo U('News/index',array('id'=>1));?>">酒店动态</a>
                            </li>
                            <li>
                                <a href="<?php echo U('News/index',array('id'=>2));?>">行业资讯</a>
                            </li>
                            <li>
                                <a href="<?php echo U('News/index',array('id'=>3));?>">公告栏</a>
                            </li>
                        </ol>
                    </li>
                </div>
                <div class="nav-center clearfix">
                    <li>
                        <a href="<?php echo U('Show/index');?>">酒店展示</a>
                        <ol>
                            <li>
                                <a href="<?php echo U('Show/index',array('id'=>1));?>">客房</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Show/index',array('id'=>2));?>">餐饮</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Show/index',array('id'=>3));?>">宴会厅</a>
                            </li>
                            <li>
                                <a href="https://720yun.com/t/853jupmOzm2?scene_id=22576819">VR</a>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <a href="<?php echo U('Select/index');?>">酒店精选</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Zp/index');?>">人才招聘</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Contact/index');?>">联系我们</a>
                    </li>
                </div>
                <div class="nav-bottom clearfix">
                    <li>
                        <a href="<?php echo U('Server/index');?>">服务设施</a>
                        <ol>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>1));?>">大堂</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>2));?>">康乐</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>3));?>">SPA</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>4));?>">酒吧</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>5));?>">KTV</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Server/index',array('id'=>6));?>">行政酒廊</a>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <a href="javascript:void(0)">语言</a>
                        <ol>
                            <li>
                                <a href="<?php echo U('/Mobile');?>">中文</a>
                            </li>
                            <li>
                                <a href="<?php echo U('/Emobile');?>">英文</a>
                            </li>
                        </ol>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <div class="order-form-box">
        <div class="order-form">
            <h1>酒店预订</h1>
            <form method="POST">
                <ul>
                    <li>
                        <input type="text" name="start" id="start" placeholder="入住" onfocus="common.dateAction('#start','#start')" />
                        <img src="/Public/Home/Images/mobile-time.png" id="startimg" onclick="common.dateAction('#start','#startimg')" />
                    </li>
                    <li>
                        <input type="text" name="end" id="end" placeholder="离店" onfocus="common.dateAction('#end','#end')" />
                        <img src="/Public/Home/Images/mobile-time.png" id="endimg" onclick="common.dateAction('#end','#endimg')" />
                    </li>
                    <li>
                        <input type="text" name="name" id="name" placeholder="姓名" />
                    </li>
                    <li>
                        <input type="text" name="tel" id="tel" placeholder="手机号" />
                    </li>
                    <li>
                        <input type="text" name="count" id="count" placeholder="请输入房间数" />
                    </li>
                    <li>
                        <select name="category" id="category">
                            <option value="">请选择房型</option>
                            <?php if(is_array($pricecate)): $i = 0; $__LIST__ = $pricecate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$T): $mod = ($i % 2 );++$i;?><option value="<?php echo ($T["id"]); ?>"><?php echo ($T["roomtype"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </li>
                    <li>
                        <input type="text" name="price" id="price" placeholder="价格" disabled />
                    </li>
                </ul>
                <div class="submit">
                    <a href="javascript:void(0)" id="submit">
                        <img src="/Public/Home/Images/mobile-submit.png" />
                        <span>立即预定</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="wechat-open">
        <div class="close-box clearfix">
            <div class="close">
                <img src="/Public/Home/Images/close.png">
            </div>
        </div>
        <div class="wechat-box">
            <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$code): $mod = ($i % 2 );++$i;?><img src="<?php echo ($code["code"]); ?>" />
                <span><?php echo ($code["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</body>
<script src="/Public/Static/swiper-4.4.1/dist/js/swiper.js"></script>
<script src="/Public/Static/layDate-v5.0.9/laydate/laydate.js"></script>
<script>
    /************************ 价格 ************************/
    var Cate = $('#category');
    var Count = $('#count');
    var Price = $('#price');
    $('select').change(function () {
        var cateValue = Cate.val();
        var countValue = Count.val();
        $.ajax({
            type: 'POST',
            url: '/Mobile/Base/Price',
            data: {
                'cate': cateValue,
                'count': countValue
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 0) {
                    Price.val('');
                } else {
                    Price.val(data + '元');
                }
            }
        });
    });

    Count.bind('input propertychange', function () {
        var cateValue = Cate.val();
        var countValue = Count.val();
        $.ajax({
            type: 'POST',
            url: '/Mobile/Base/Price',
            data: {
                'cate': cateValue,
                'count': countValue
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 0) {
                    Price.val('');
                } else {
                    Price.val(data + '元');
                }
            }
        });
    });
    /************************ 订单 ************************/
    var Start = $('#start');
    var End = $('#end');
    var Name = $('#name');
    var Tel = $('#tel');
    $('#submit').click(function () {
        var StartValue = Start.val();
        var EndValue = End.val();
        var NameValue = Name.val();
        var TelValue = Tel.val();
        var CateValue = Cate.val();
        var CountValue = Count.val();
        var PriceValue = Price.val();
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if (StartValue == "") {
            alert('请输入入住时间！');
            $('#start').focus();
            return false;
        } else if (EndValue == "") {
            alert('请输入离店时间！');
            $('#end').focus();
            return false;
        } else if (NameValue == "") {
            alert('请输入您的姓名！');
            $('#name').focus();
            return false;
        } else if (!myreg.test(TelValue)) {
            alert('请输入有效的电话号码！');
            $('#tel').focus();
            return false;
        } else if (CateValue == "") {
            alert('请选择房间数！');
            return false;
        } else if (CountValue == "") {
            alert('请选择房型！');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: '/Mobile/Base/Pay',
                data: {
                    'start': StartValue,
                    'end': EndValue,
                    'name': NameValue,
                    'tel': TelValue,
                    'roomtype': CateValue,
                    'roomcount': CountValue,
                    'price': PriceValue
                },
                dataType: 'JSON',
                success: function (data) {
                    Start.val("");
                    End.val("");
                    Name.val("");
                    Tel.val("");
                    Cate.val("");
                    Count.val("");
                    Price.val("");
                    alert('订单提交成功！');
                }
            });
        }
    });

    //日历
    var common = {
        dateAction: function ($this, $id) {
            //外部事件调用
            laydate.render({
                elem: $this,
                show: true, //直接显示
                closeStop: $id //这里代表的意思是：点击 $id 所在元素阻止关闭事件冒泡。如果不设定，则无法弹出控件
            });
        }
    }
</script>

</html>