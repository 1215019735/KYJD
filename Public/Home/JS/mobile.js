//Rem
(function (win, doc) {
    if (!win.addEventListener) return;
    var html = document.documentElement;

    function setFont() {
        var cliWidth = html.clientWidth;
        if (cliWidth > 750) {
            cliWidth = 750;
        }
        html.style.fontSize = 100 * (cliWidth / 750) + 'px';
    }

    win.addEventListener('resize', setFont, false)
    doc.addEventListener('DOMContentLoaded', setFont, false)
})(window, document);

//页面未加载完毕显示loading提示
$(document).ready(function () {
    $(window).load(function () {
        $('#loading').fadeOut(1500);
    });
});

$(window).load(function () {
    //所有图片大小自适应
    var Size = $('html').attr('style');
    var reg = /\d+/;
    var num = Size.match(reg)[0];

    $(window).resize(function () {
        $('img').each(function () {
            var Width = $(this).width();
            var now_width = Width / num;
            var Height = $(this).height();
            var now_height = Height / num;
            $(this).css({
                'width': now_width + 'rem',
                'height': now_height + 'rem'
            });
        });
    });

    //菜单显示关闭
    $('.menu').click(function () {
        $('.menu-open').css({
            'display': 'block'
        });
        $('body').css({
            'overflow': 'hidden'
        });
    });

    $('.close').click(function () {
        $('.menu-open').css({
            'display': 'none'
        });
        $('body').css({
            'overflow': 'auto'
        });
    });

    //二维码
    $('.wechat').click(function () {
        $('.wechat-open').css({
            'display': 'block'
        });
        $('body').css({
            'overflow': 'hidden'
        });
    });

    $('.close').click(function () {
        $('.wechat-open').css({
            'display': 'none'
        });
        $('body').css({
            'overflow': 'auto'
        });
    });

    var navLength = $('.show-nav>li').length;

    $('.show-nav>li').eq(0).addClass('hover');
    $('.show-main').eq(0).css({
        'display': 'block'
    });
    for (let i = 0; i < navLength; i++) {
        $('.show-nav>li').eq(i).click(function () {
            $(this).addClass('hover').siblings().removeClass('hover');
            $('.show-main').eq(i).css({
                'display': 'block'
            }).siblings('.show-main').css({
                'display': 'none'
            });
        });
    }

    var swiper_box = new Swiper('.scroll-box', {
        direction: 'vertical',
        slidesPerView: 1,
        mousewheel: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    var swiper_server = new Swiper('.server-main', {
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination-server',
            clickable: true,
        },
    });

    var swiper_select = new Swiper('.select-box', {
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination-select',
            clickable: true,
        },
    });

    $('.draw').click(function () {
        if ($('.order-form-box').hasClass('open')) {
            $('.order-form-box').removeClass('open').stop().animate({
                'height': 0
            });
            $('body').css({
                'overflow': 'auto'
            });
        } else {
            $('.order-form-box').addClass('open').stop().animate({
                'height': '12.04rem'
            });
            $('body').css({
                'overflow': 'hidden'
            });
        }
    });
});