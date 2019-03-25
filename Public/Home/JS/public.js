//页面未加载完毕显示loading提示
$(document).ready(function () {
    $(window).load(function () {
        $('#loading').fadeOut(1500);
    });
});

$('.swiper-container').css({
    'width': $(window).width(),
    'height': $(window).height()
});

$('.banner>img').css({
    'width': $(window).width(),
    'height': $(window).height()
});

var img_width = (175 / 1920) * 100;
var img_Width = (1395 / 1920) * 100;
var Top = (220 / 969) * 100;
var publicTop = (165 / 969) * 100;
var abHeight = (495 / 969) * 100;

$('.public').css({
    'top': publicTop + '%',
});

$('.about>li').css({
    'width': img_width + '%',
    'height': $(window).height()
});

$('.about>li>img').css({
    'height': $(window).height()
});

$('.about>li').eq(0).css({
    'width': img_Width + '%',
    'height': $(window).height()
});

$('.about>li>img').eq(0).css({
    'height': $(window).height()
});

$('.about_core').css({
    'top': Top + '%',
});

$('.about_box').css({
    'height': abHeight + '%',
});

$('.icon').css({
    'top': '85%'
});

$('.about_core').eq(0).css({
    'display': 'block'
});

$('.icon').eq(0).css({
    'display': 'none'
});

$('.about_more').hover(function () {
    $('.about_more').css({
        'background-color': 'rgb(226, 153, 36)'
    });
}, function () {
    $('.about_more').css({
        'background-color': ''
    });
});

$('.server_more').hover(function () {
    $('.server_more').css({
        'background-color': 'rgb(191, 140, 59)'
    });
    $('.server_more>a').css({
        'color': '#ffffff'
    });
    $('.server_more>a>img').attr('src', '/Public/Home/Images/rights.png');
}, function () {
    $('.server_more').css({
        'background-color': ''
    });
    $('.server_more>a').css({
        'color': ''
    });
    $('.server_more>a>img').attr('src', '/Public/Home/Images/right.png');
});

$('.show_more').hover(function () {
    $('.show_more').css({
        'background-color': 'rgb(191, 140, 59)'
    });
    $('.show_more>a').css({
        'color': '#ffffff'
    });
    $('.show_more>a>img').attr('src', '/Public/Home/Images/rights.png');
}, function () {
    $('.show_more').css({
        'background-color': ''
    });
    $('.show_more>a').css({
        'color': ''
    });
    $('.show_more>a>img').attr('src', '/Public/Home/Images/right.png');
});

$('.news_more').hover(function () {
    $('.news_more').css({
        'background-color': 'rgb(191, 140, 59)'
    });
    $('.news_more>a').css({
        'color': '#ffffff'
    });
    $('.news_more>a>img').attr('src', '/Public/Home/Images/rights.png');
}, function () {
    $('.news_more').css({
        'background-color': ''
    });
    $('.news_more>a').css({
        'color': ''
    });
    $('.news_more>a>img').attr('src', '/Public/Home/Images/right.png');
});

$('.zp_more').hover(function () {
    $('.zp_more').css({
        'background-color': 'rgb(191, 140, 59)'
    });
    $('.zp_more>a').css({
        'color': '#ffffff'
    });
    $('.zp_more>a>img').attr('src', '/Public/Home/Images/rights.png');
}, function () {
    $('.zp_more').css({
        'background-color': ''
    });
    $('.zp_more>a').css({
        'color': ''
    });
    $('.zp_more>a>img').attr('src', '/Public/Home/Images/right.png');
});

$('.server_list>li').hover(function () {
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

var Length = $('.about>li').length;
for (var i = 0; i < Length; i++) {
    (function (number) {
        $('.about>li').eq(number).click(function () {
            $('.about>li').eq(number).stop().animate({
                'width': img_Width + '%'
            }, 300).siblings().stop().animate({
                'width': img_width + '%'
            }, 300);

            $('.about_core').eq(number).css({
                'display': 'block'
            }).parent().siblings().children('.about_core').css({
                'display': 'none'
            });

            $('.icon').eq(number).css({
                'display': 'none'
            }).parent().siblings().children('.icon').css({
                'display': 'block'
            });
        });
    })(i)
}

$(window).resize(function () {
    var Width = $(window).width();
    var Height = $(window).height();
    $('.swiper-container').css({
        'width': Width,
        'height': Height
    });
    $(".banner>img").each(function (i) {
        var img = $(this);
        var realWidth; //真实的宽度
        var realHeight; //真实的高度
        //这里做下说明，$("<img/>")这里是创建一个临时的img标签，类似js创建一个new Image()对象！
        $("<img/>").attr("src", $(img).attr("src")).load(function () {
            /*
              如果要获取图片的真实的宽度和高度有三点必须注意
              1、需要创建一个image对象：如这里的$("<img/>")
              2、指定图片的src路径
              3、一定要在图片加载完成后执行如.load()函数里执行
             */
            realWidth = this.width;
            realHeight = this.height;
            //如果真实的宽度大于浏览器的宽度就按照100%显示
            if (realWidth >= Width) {
                $(img).css("width", Width).css("height", Height);
            } else { //如果小于浏览器的宽度按照原尺寸显示
                $(img).css("width", Width).css("height", Height);
            }
        });
    });
});

var jx_swiper = new Swiper('.jx-swiper', {
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

jx_swiper.el.onmouseover = function () {
    jx_swiper.autoplay.stop();
}

jx_swiper.el.onmouseleave = function () {
    jx_swiper.autoplay.start();
}

$('.show_nav>li').eq(0).addClass('catenav_hover');

var showNav = $('.show_nav>li').length;
for (var i = 0; i < showNav; i++) {
    (function (number) {
        $('.show_nav>li').eq(number).click(function () {
            $('.show_nav>li').eq(number).addClass('catenav_hover').siblings().removeClass('catenav_hover');
        });
    })(i)
}

$('.show-scroll').eq(0).css({
    'display': 'block'
});

var showBox = $('.show_thumb li').length;
for (var i = 0; i < showBox; i++) {
    (function (number) {
        $('.show_thumb li').eq(number).click(function () {
            $('.show-scroll').eq(number).css({
                'display': 'block'
            }).siblings().css({
                'display': 'none'
            });
        });
    })(i)
}

$('.news_nav>li').eq(0).addClass('catenav_hover');

$('.news_list').eq(0).css({
    'display': 'block'
});

var newsNav = $('.news_nav>li').length;
for (var i = 0; i < newsNav; i++) {
    (function (number) {
        $('.news_nav>li').eq(number).click(function () {
            $('.news_nav>li').eq(number).addClass('catenav_hover').siblings().removeClass('catenav_hover');
            $('.news_list').eq(number).css({
                'display': 'block'
            }).siblings().css({
                'display': 'none'
            });
        });
    })(i)
}

$('.news_nav>li').eq(0).addClass('left');
$('.news_list>li').eq(0).addClass('left');
$('.server_list>li').eq(0).addClass('left');

//存储刷新之前的锚点，刷新时保留导航高光效果
var _hash = location.hash;
if (_hash) {
    var navLength = $('.nav>ul>li').length;
    for (let i = 0; i < navLength; i++) {
        if ($('.nav>ul>li').eq(i).children('a').attr('href') == _hash) {
            $('.nav>ul>li').eq(i).children('a').addClass('nav_hover').parent().siblings().children('a').removeClass('nav_hover');
        }
    }
} else {
    $('.nav>ul>li').eq(0).children('a').addClass('nav_hover');
}


//当锚点改变时，导航高光效果跟着锚点改变而改变
$(window).bind('hashchange', function () {
    var _hash = location.hash;
    var navLength = $('.nav>ul>li').length;
    for (let i = 0; i < navLength; i++) {
        if ($('.nav>ul>li').eq(i).children('a').attr('href') == _hash) {
            $('.nav>ul>li').eq(i).children('a').addClass('nav_hover').parent().siblings().children('a').removeClass('nav_hover');
        }
    }
})