<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>地图导航</title>
</head>

<body>
    <div class="map">
        <div id="allmap" class="allMap"></div>
        <ul>
            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$N): $mod = ($i % 2 );++$i;?><li>
                    <div class="img">
                        <img src="<?php echo ($N["img"]); ?>" />
                    </div>
                    <div class="info">
                        <div class="tit"><?php echo ($N["title"]); ?></div>
                        <div class="Tel"><?php echo ($N["name"]); ?>：<?php echo ($N["tel"]); ?></div>
                        <div class="dz">地址：<?php echo ($N["address"]); ?>(<?php echo ($N["nav"]); ?>)</div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</body>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=yUHLSxMDKaMkjlF7mVEvUZUz4vijV1qZ"></script>
<script>
    /************************ 地图导航 **************************/
    var marker = <?php echo ($json); ?>;
    var centerPoint = new BMap.Point(115.913453, 28.683878); // 默认坐标
    if (marker != null && marker.length > 0) {
        centerPoint.lng = marker[0].eastcoor;
        centerPoint.lat = marker[0].northcoor;
    }
    var map = new BMap.Map("allmap");
    map.centerAndZoom(centerPoint, 15);
    map.enableScrollWheelZoom();
    var navigationControl = new BMap.NavigationControl({
        // 靠左上角位置
        anchor: BMAP_ANCHOR_TOP_LEFT,
        // LARGE类型
        type: BMAP_NAVIGATION_CONTROL_LARGE,
        // 启用显示定位
        enableGeolocation: true
    });
    map.addControl(navigationControl);

    /* 添加标记 */
    for (var i = 0; i < marker.length; i++) {
        addMarker(marker[i].eastcoor, marker[i].northcoor, marker[i].coorname, marker[i].coorcontent);
    }
    // 方法
    function addMarker($lng, $lat, $til, $con) {
        var ppoint = new BMap.Point($lng, $lat);
        var marker = new BMap.Marker(ppoint);
        map.addOverlay(marker);
        marker.setAnimation(BMAP_ANIMATION_BOUNCE);
        // 文字说明
        var opts = {
            position: ppoint, // 指定文本标注所在的地理位置
            offset: new BMap.Size(5, -5) //设置文本偏移量
        }
        var label = new BMap.Label($til, opts); // 创建文本标注对象
        map.addOverlay(label);
        // 中心点
        marker.addEventListener('click', function (e) {
            //返回中心店
            var _ppoint = new BMap.Point($lng, $lat);
            map.panTo(_ppoint);
            //文字说明
            var infoWindow = new BMap.InfoWindow($con);
            map.openInfoWindow(infoWindow, _ppoint);
        });
    }
</script>

</html>