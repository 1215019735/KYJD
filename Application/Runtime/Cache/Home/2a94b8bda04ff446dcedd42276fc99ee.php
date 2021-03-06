<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo ($C["keywords"]); ?>"/>
    <meta name="description" content="<?php echo ($C["description"]); ?>"/>
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <link rel="stylesheet" href="/Public/Static/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="/Public/Static/swiper-4.4.1/dist/css/swiper.css">
    <link rel="icon" href="/Public/Home/Images/icon.png" type="image/x-icon"/>
    <title><?php echo ($C["company"]); ?></title>
    <script src="/Public/Home/JS/jquery-1.80.js"></script>
    <script src="/Public/Static/jquery-animate-css-rotate-scale-master/jquery-animate-css-rotate-scale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <!-- <div id="loading">
        <img src="/Public/Home/Images/loading.gif" />
    </div> -->
    <div id="header">
        <div class="header core clearfix">
            <div class="language">
                <a href="<?php echo U('/Ehome');?>">
                    <img src="/Public/Home/Images/language.png" />
                    <span id="language">{{message}}</span>
                </a>
            </div>
            <div class="myline">
                <span id="myline">{{message}}</span>
                <div class="weibo">
                    <a href="<?php echo ($C["weibo"]); ?>"></a>
                </div>
                <div class="wechat">
                    <div class="wechat_boxs">
                        <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codes): $mod = ($i % 2 );++$i;?><img src="<?php echo ($codes["code"]); ?>" />
                            <span><?php echo ($codes["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="scroll swiper-no-swiping">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-hash="slide1">
                    <div class="banner">
                        <img src="/Public/Home/Images/home_banner.jpg" />
                    </div>
                    <div class="title">
                        <h1 class="en">
                            <img src="/Public/Home/Images/font.png" />
                        </h1>
                        <h1 class="zh">抚州凤凰开元名都大酒店</h1>
                    </div>
                    <div class="reserve core">
                        <form method="post">
                            <ul>
                                <li style="margin-left:0;">
                                    <input type="text" name="start" id="start" placeholder="入住" onfocus="common.dateAction('#start','#start')" />
                                    <img src="/Public/Home/Images/time.png" id="startimg" onclick="common.dateAction('#start','#startimg')" />
                                </li>
                                <li>
                                    <input type="text" name="end" id="end" placeholder="离店" onfocus="common.dateAction('#end','#end')" />
                                    <img src="/Public/Home/Images/time.png" id="endimg" onclick="common.dateAction('#end','#endimg')" />
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
                                <li class="default">
                                    <input type="text" name="price" id="price" placeholder="价格" disabled />
                                </li>
                            </ul>
                            <div class="submit" id="submit">
                                <a href="javascript:void(0)" class="clearfix">
                                    <img src="/Public/Home/Images/submit.png" />
                                    <span>立即预约</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide2">
                    <ul class="about clearfix">
                        <li>
                            <img src="/Public/Home/Images/synopsis.jpg" />
                            <div class="about_core">
                                <h1>企业简介</h1>
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><div class="about_box clearfix">
                                        <div class="about_content">
                                            <?php echo ($A["preview"]); ?>
                                        </div>
                                        <div class="about_more">
                                            <a href="javascript:void(0)" class="clearfix" id="sys" ajax-url="<?php echo U('About/index',array('category'=>$A['category']));?>"
                                                onclick="common.clickAction($('#sys'),'企业简介')">
                                                <span>查看详情</span>
                                                <img src="/Public/Home/Images/rights.png" />
                                            </a>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="icon">
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><img src="<?php echo ($A["icon"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                <span>企业简介</span>
                            </div>
                        </li>
                        <li>
                            <img src="/Public/Home/Images/history.jpg" />
                            <div class="about_core">
                                <h1>酒店文化</h1>
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><div class="about_box clearfix">
                                        <div class="about_content">
                                            <?php echo ($A["preview"]); ?>
                                        </div>
                                        <div class="about_more">
                                            <a href="javascript:void(0)" class="clearfix" id="culture" ajax-url="<?php echo U('About/index',array('category'=>$A['category']));?>"
                                                onclick="common.clickAction($('#culture'),'酒店文化')">
                                                <span>查看详情</span>
                                                <img src="/Public/Home/Images/rights.png" />
                                            </a>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="icon">
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><img src="<?php echo ($A["icon"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                <span>酒店文化</span>
                            </div>
                        </li>
                        <li>
                            <img src="/Public/Home/Images/honor.jpg" />
                            <div class="about_core">
                                <h1>组织荣誉</h1>
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><div class="about_box clearfix">
                                        <div class="about_content">
                                            <?php echo ($A["preview"]); ?>
                                        </div>
                                        <div class="about_more">
                                            <a href="javascript:void(0)" class="clearfix" id="honor" ajax-url="<?php echo U('About/index',array('category'=>$A['category']));?>"
                                                onclick="common.clickAction($('#honor'),'组织荣誉')">
                                                <span>查看详情</span>
                                                <img src="/Public/Home/Images/rights.png" />
                                            </a>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="icon">
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><img src="<?php echo ($A["icon"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                <span>组织荣誉</span>
                            </div>
                        </li>
                        <li>
                            <img src="/Public/Home/Images/active.jpg" />
                            <div class="about_core">
                                <h1>活动风采</h1>
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><div class="about_box clearfix">
                                        <div class="about_content">
                                            <?php echo ($A["preview"]); ?>
                                        </div>
                                        <div class="about_more">
                                            <a href="javascript:void(0)" class="clearfix" id="active" ajax-url="<?php echo U('About/index',array('category'=>$A['category']));?>"
                                                onclick="common.clickAction($('#active'),'活动风采')">
                                                <span>查看详情</span>
                                                <img src="/Public/Home/Images/rights.png" />
                                            </a>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="icon">
                                <?php if(is_array($about)): $i = 0; $__LIST__ = array_slice($about,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$A): $mod = ($i % 2 );++$i;?><img src="<?php echo ($A["icon"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                <span>活动风采</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="swiper-slide" data-hash="slide3">
                    <div class="banner">
                        <img src="/Public/Home/Images/zs_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="show_box clearfix">
                            <div class="show_img_box">
                                <div class="show-scroll"></div>
                            </div>
                            <div class="show_list">
                                <h1>酒店展示</h1>
                                <ul class="show_nav">
                                    <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$S): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($S["id"]); ?>"><?php echo ($S["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <li>
                                        <a href="https://720yun.com/t/853jupmOzm2?scene_id=22576819">VR</a>
                                    </li>
                                </ul>
                                <div class="show_thumb_box">
                                    <ul class="show_thumb clearfix"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="show_more">
                            <a href="javascript:void(0)" class="clearfix" id="show" ajax-url="<?php echo U('/Show');?>" onclick="common.clickAction($('#show'),'酒店展示')">
                                <span>查看全部</span>
                                <img src="/Public/Home/Images/right.png" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide4">
                    <div class="banner">
                        <img src="/Public/Home/Images/server_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="server_box clearfix">
                            <div class="server">
                                <h1>服务设施</h1>
                                <ul class="server_list clearfix">
                                    <?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$E): $mod = ($i % 2 );++$i;?><li>
                                            <a href="javascript:void(0)" data-url="<?php echo U('Server/content',array('id'=>$E['id']));?>">
                                                <img src="<?php echo ($E["img"]); ?>" />
                                                <div class="server_list_box"><?php echo ($E["name"]); ?></div>
                                            </a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="server_more">
                            <a href="javascript:void(0)" class="clearfix" id="server" ajax-url="<?php echo U('/Server');?>"
                                onclick="common.clickAction($('#server'),'服务设施')">
                                <span>查看全部</span>
                                <img src="/Public/Home/Images/right.png" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide5">
                    <div class="banner">
                        <img src="/Public/Home/Images/jx_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="jx_box clearfix">
                            <div class="jx">
                                <h1>酒店精选</h1>
                                <div class="jx-swiper">
                                    <ul class="jx_list swiper-wrapper clearfix">
                                        <?php if(is_array($jx)): $i = 0; $__LIST__ = $jx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$J): $mod = ($i % 2 );++$i;?><li class="swiper-slide">
                                                <a href="javascript:void(0)" title="<?php echo ($J["title"]); ?>" data-url="<?php echo U('Jx/content',array('id'=>$J['id']));?>">
                                                    <img src="<?php echo ($J["img"]); ?>" />
                                                </a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide6">
                    <div class="banner">
                        <img src="/Public/Home/Images/news_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="news_box clearfix">
                            <div class="news">
                                <h1>新闻资讯</h1>
                                <ul class="news_nav clearfix">
                                    <?php if(is_array($newscate)): $i = 0; $__LIST__ = $newscate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$N): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($N["id"]); ?>"><?php echo ($N["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <div class="news_list_box">
                                    <ul class="news_list clearfix"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="news_more">
                            <a href="javascript:void(0)" class="clearfix" id="news" ajax-url="<?php echo U('/News');?>" onclick="common.clickAction($('#news'),'新闻资讯')">
                                <span>查看全部</span>
                                <img src="/Public/Home/Images/right.png" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide7">
                    <div class="banner">
                        <img src="/Public/Home/Images/zp_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="zp_box clearfix">
                            <div class="zp">
                                <h1>人才招聘</h1>
                                <?php if(is_array($zp)): $i = 0; $__LIST__ = $zp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Z): $mod = ($i % 2 );++$i;?><ul class="zp_type clearfix">
                                        <li>招聘岗位：<?php echo ($Z["posts"]); ?></li>
                                        <li>学历要求：<?php echo ($Z["qualifications"]); ?></li>
                                        <li>【<?php echo ($Z["times"]); ?>】</li>
                                    </ul>
                                    <div class="zp_content">
                                        <?php echo ($Z["preview"]); ?>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div class="zp_more">
                            <a href="javascript:void(0)" class="clearfix" id="Zp" ajax-url="<?php echo U('/Zp');?>" onclick="common.clickAction($('#Zp'),'人才招聘')">
                                <span>查看全部</span>
                                <img src="/Public/Home/Images/right.png" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-hash="slide8">
                    <div class="banner">
                        <img src="/Public/Home/Images/contact_banner.jpg" />
                    </div>
                    <div class="public core clearfix">
                        <div class="contact_box clearfix">
                            <div class="contact clearfix">
                                <div class="contact_left">
                                    <div class="contact_type clearfix">
                                        <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vo["code"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <div class="contact_line">
                                            <h1><?php echo ($C["qtel"]); ?></h1>
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
                                    <div class="contact_logo">
                                        <img src="/Public/Home/Images/logo.png" />
                                    </div>
                                </div>
                                <div class="contact_right">
                                    <div id="allmap"></div>
                                    <a href="javascript:void(0)" id="arrival" ajax-url="<?php echo U('/Contact');?>" onclick="common.clickAction($('#arrival'),'地图导航')">
                                        <img src="/Public/Home/Images/arrival.png" />
                                        <span>到达指引</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav">
                <div class="nav core clearfix">
                    <div class="logo">
                        <a href="<?php echo U('/');?>"></a>
                    </div>
                    <ul class="clearfix">
                        <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li>
                                <a href="#slide<?php echo ($nav["module"]); ?>">
                                    <?php echo ($nav["name"]); ?>
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=yUHLSxMDKaMkjlF7mVEvUZUz4vijV1qZ"></script> -->
    <script src="/Public/Static/swiper-4.4.1/dist/js/swiper.js"></script>
    <script src="/Public/Static/layDate-v5.0.9/laydate/laydate.js"></script>
    <script src="/Public/Static/layer/layer.js"></script>
    <script src="/Public/Home/JS/public.js"></script>
    <script>
        $(function () {
            /************************ 价格 ************************/
            var Cate = $('#category');
            var Count = $('#count');
            var Price = $('#price');
            $('select').change(function () {
                var cateValue = Cate.val();
                var countValue = Count.val();
                $.ajax({
                    type: 'POST',
                    url: '/Home/Index/Price',
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
                    url: '/Home/Index/Price',
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
                        url: '/Home/Index/Pay',
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
        })

        /************************ 地图导航 **************************/
        // $(function () {
        //     var marker = <?php echo ($json); ?>;
        //     var centerPoint = new BMap.Point(115.913453, 28.683878); // 默认坐标
        //     if (marker != null && marker.length > 0) {
        //         centerPoint.lng = marker[0].eastcoor;
        //         centerPoint.lat = marker[0].northcoor;
        //     }
        //     var map = new BMap.Map("allmap");
        //     map.centerAndZoom(centerPoint, 15);
        //     map.enableScrollWheelZoom();
        //     var navigationControl = new BMap.NavigationControl({
        //         // 靠左上角位置
        //         anchor: BMAP_ANCHOR_TOP_LEFT,
        //         // LARGE类型
        //         type: BMAP_NAVIGATION_CONTROL_LARGE,
        //         // 启用显示定位
        //         enableGeolocation: true
        //     });
        //     map.addControl(navigationControl);

        //     /* 添加标记 */
        //     for (var i = 0; i < marker.length; i++) {
        //         addMarker(marker[i].eastcoor, marker[i].northcoor, marker[i].coorname, marker[i].coorcontent);
        //     }
        //     // 方法
        //     function addMarker($lng, $lat, $til, $con) {
        //         var ppoint = new BMap.Point($lng, $lat);
        //         var marker = new BMap.Marker(ppoint);
        //         map.addOverlay(marker);
        //         marker.setAnimation(BMAP_ANIMATION_BOUNCE);
        //         // 文字说明
        //         var opts = {
        //             position: ppoint, // 指定文本标注所在的地理位置
        //             offset: new BMap.Size(5, -5) //设置文本偏移量
        //         }
        //         var label = new BMap.Label($til, opts); // 创建文本标注对象
        //         map.addOverlay(label);
        //         // 中心点
        //         marker.addEventListener('click', function (e) {
        //             //返回中心店
        //             var _ppoint = new BMap.Point($lng, $lat);
        //             map.panTo(_ppoint);
        //             //文字说明
        //             var infoWindow = new BMap.InfoWindow($con);
        //             map.openInfoWindow(infoWindow, _ppoint);
        //         });
        //     }
        // })

        //酒店展示
        $(function () {
            $('.show_nav>li').click(function () {
                var _id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '/Home/Index/Show',
                    data: {
                        'id': _id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $('.show_thumb').empty();
                        for (let i = 0; i < data.length && i < 6; i++) {
                            $('.show_thumb').append("<li data-cate='" + data[i].category + "'><img src='" + data[i].img + "' /></li>");
                        }

                        //定位
                        $('.show_thumb>li').eq(0).addClass('top left');
                        $('.show_thumb>li').eq(1).addClass('top');
                        $('.show_thumb>li').eq(2).addClass('top');
                        $('.show_thumb>li').eq(3).addClass('left');

                        //缩放效果
                        $('.show_thumb>li').hover(function () {
                            $(this).children('img').stop().animate({
                                scale: '1.1'
                            });
                        }, function () {
                            $(this).children('img').stop().animate({
                                scale: '1'
                            });
                        });

                        var _cates = $('.show_thumb>li:first').attr('data-cate');
                        $.ajax({
                            type: 'POST',
                            url: '/Home/Index/Showin',
                            data: {
                                'cate': _cates
                            },
                            dataType: 'JSON',
                            success: function (data) {
                                $('.show-scroll').empty();
                                $('.show-scroll').append("<div class='swiper-button-next'></div>");
                                $('.show-scroll').append("<div class='swiper-button-prev'></div>");
                                $('.show-scroll').append("<ul class='swiper-wrapper'></ul>");
                                for (let i = 0; i < data.length; i++) {
                                    $('.show-scroll>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                                }

                                var show_swiper = new Swiper('.show-scroll', {
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

                        $('.show_thumb>li').click(function () {
                            var _cate = $(this).attr('data-cate');
                            $.ajax({
                                type: 'POST',
                                url: '/Home/Index/Showin',
                                data: {
                                    'cate': _cate
                                },
                                dataType: 'JSON',
                                success: function (data) {
                                    $('.show-scroll').empty();
                                    $('.show-scroll').append("<div class='swiper-button-next'></div>");
                                    $('.show-scroll').append("<div class='swiper-button-prev'></div>");
                                    $('.show-scroll').append("<ul class='swiper-wrapper'></ul>");
                                    for (let i = 0; i < data.length; i++) {
                                        $('.show-scroll>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                                    }

                                    var show_swiper = new Swiper('.show-scroll', {
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

            var _ids = $('.show_nav>li:first').attr('data-id');
            $.ajax({
                type: 'POST',
                url: '/Home/Index/Show',
                data: {
                    'id': _ids
                },
                dataType: 'JSON',
                success: function (data) {
                    for (let i = 0; i < data.length && i < 6; i++) {
                        $('.show_thumb').append("<li data-cate='" + data[i].category + "'><img src='" + data[i].img + "' /></li>");
                    }

                    //定位
                    $('.show_thumb>li').eq(0).addClass('top left');
                    $('.show_thumb>li').eq(1).addClass('top');
                    $('.show_thumb>li').eq(2).addClass('top');
                    $('.show_thumb>li').eq(3).addClass('left');

                    //缩放效果
                    $('.show_thumb>li').hover(function () {
                        $(this).children('img').stop().animate({
                            scale: '1.1'
                        });
                    }, function () {
                        $(this).children('img').stop().animate({
                            scale: '1'
                        });
                    });

                    var _cates = $('.show_thumb>li:first').attr('data-cate');
                    $.ajax({
                        type: 'POST',
                        url: '/Home/Index/Showin',
                        data: {
                            'cate': _cates
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            $('.show-scroll').empty();
                            $('.show-scroll').append("<div class='swiper-button-next'></div>");
                            $('.show-scroll').append("<div class='swiper-button-prev'></div>");
                            $('.show-scroll').append("<ul class='swiper-wrapper'></ul>");
                            for (let i = 0; i < data.length; i++) {
                                $('.show-scroll>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                            }
                            var show_swiper = new Swiper('.show-scroll', {
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

                    $('.show_thumb>li').click(function () {
                        var _cate = $(this).attr('data-cate');
                        $.ajax({
                            type: 'POST',
                            url: '/Home/Index/Showin',
                            data: {
                                'cate': _cate
                            },
                            dataType: 'JSON',
                            success: function (data) {
                                $('.show-scroll').empty();
                                $('.show-scroll').append("<div class='swiper-button-next'></div>");
                                $('.show-scroll').append("<div class='swiper-button-prev'></div>");
                                $('.show-scroll').append("<ul class='swiper-wrapper'></ul>");
                                for (let i = 0; i < data.length; i++) {
                                    $('.show-scroll>ul').append("<li class='swiper-slide'><img src='" + data[i].img + "' /></li>");
                                }

                                var show_swiper = new Swiper('.show-scroll', {
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
        })

        //新闻资讯
        $(function () {
            $('.news_nav>li').click(function () {
                var _id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '/Home/Index/News',
                    data: {
                        'id': _id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $('.news_list').empty();
                        for (let i = 0; i < data.length && i < 3; i++) {
                            $('.news_list').append('<li><a href="javascript:void(0)" data-url="/Home/News/content/id/' + data[i].id + '"><img src=' + data[i].img + ' /><div class="news_title">' + data[i].title + '</div><div class="news_time">' + data[i].times + '</div></a></li>');
                        }

                        $('.news_list>li:first').addClass('left right');
                        $('.news_list>li:last').addClass('left right');

                        $('.news_list>li').each(function () {
                            $(this).on('click', function () {
                                var url = $(this).children('a').attr('data-url');
                                layer.open({
                                    type: 2,
                                    title: ['新闻资讯'],
                                    content: url,
                                    area: ['1200px','800px']
                                });
                            })
                        });
                    }
                });
            });

            var _ids = $('.news_nav>li:first').attr('data-id');
            $.ajax({
                type: 'POST',
                url: '/Home/Index/News',
                data: {
                    'id': _ids
                },
                dataType: 'JSON',
                success: function (data) {
                    for (let i = 0; i < data.length && i < 3; i++) {
                        $('.news_list').append('<li><a href="javascript:void(0)" data-url="/Home/News/content/id/' + data[i].id + '"><img src=' + data[i].img + ' /><div class="news_title">' + data[i].title + '</div><div class="news_time">' + data[i].times + '</div></a></li>'
                        );
                    }

                    $('.news_list>li:first').addClass('left right');
                    $('.news_list>li:last').addClass('left right');

                    $('.news_list>li').click(function () {
                        var url = $(this).children('a').attr('data-url');
                        layer.open({
                            type: 2,
                            title: ['新闻资讯'],
                            content: url,
                            area: ['1200px', '800px']
                        });
                    })
                }
            });
        })

        //服务设施
        $(function () {
            $('.server_list>li').each(function () {
                $(this).on('click', function () {
                    var url = $(this).children('a').attr('data-url');
                    layer.open({
                        type: 2,
                        title: ['服务设施'],
                        content: url,
                        area: ['1200px', '800px']
                    });
                })
            });
        })

        //酒店精选
        $(function () {
            $('.jx_list>li').each(function () {
                $(this).on('click', function () {
                    var url = $(this).children('a').attr('data-url');
                    layer.open({
                        type: 2,
                        title: ['酒店精选'],
                        content: url,
                        area: ['1200px', '800px']
                    });
                })
            });
        })

        //弹出层
        var common = {
            clickAction: function ($this, $title, $url) {
                var $url = $($this).attr('ajax-url');
                layer.open({
                    type: 2,
                    title: [$title],
                    content: $url,
                    area: ['1200px', '800px']
                });
            },
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

    <div class="line">
        <div class="scrollTop">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>
        <div class="telephone">
            <a href="tel:<?php echo ($C["tel"]); ?>">
                <img src="/Public/Home/Images/tel.png" />
            </a>
        </div>
        <div class="qq">
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($C["qq"]); ?>&site=qq&menu=yes">
                <img src="/Public/Home/Images/qq.png" />
            </a>
        </div>
        <div class="weixin">
            <img src="/Public/Home/Images/weixin.png" />
            <div class="wechat_box">
                <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$code): $mod = ($i % 2 );++$i;?><img src="<?php echo ($code["code"]); ?>" />
                    <span><?php echo ($code["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="scrollBottom">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </div>
    </div>
</body>
<script src="/Public/Static/swiper-4.4.1/dist/js/swiper.js"></script>
<script src="/Public/Home/JS/index.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        slidesPerView: 1,
        mousewheel: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.scrollBottom',
            prevEl: '.scrollTop',
        },
        hashNavigation: {
            watchState: true,
        },
    });

    $(window).load(function () {
        $('.banner>img').stop().animate({
            scale: '1.1'
        }, 10000);

        $('.weixin').hover(function () {
            $('.wechat_box').stop().animate({
                'width': '120px',
                'opacity': '1'
            })
        }, function () {
            $('.wechat_box').stop().animate({
                'width': 0,
                'opacity': 0
            })
        });

        $('.wechat').hover(function () {
            $('.wechat_boxs').stop().animate({
                'height': '150px',
                'opacity': '1'
            })
        }, function () {
            $('.wechat_boxs').stop().animate({
                'height': 0,
                'opacity': 0
            })
        });
    });
</script>

</html>