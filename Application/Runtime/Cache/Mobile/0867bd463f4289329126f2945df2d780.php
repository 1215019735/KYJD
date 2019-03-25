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
    
    <div class="news-page-banner">
        <div class="core">
            <div class="public-title">
                <div class="public-page-title public"><?php echo ($data["title"]); ?></div>
                <div class="public-page-info public">
                    <ul>
                        <li>发布时间：<?php echo ($data["times"]); ?></li>
                        <li>浏览次数：<?php echo ($data["click"]); ?>次</li>
                    </ul>
                </div>
            </div>
            <div class="public-page-content-box public">
                <div class="public-page-content">
                    <?php echo (htmlspecialchars_decode($data["content"])); ?>
                </div>
            </div>
        </div>
    </div>

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