<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>关于我们</title>
</head>

<body>
    <div class="public_page">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><h1><?php echo ($data["name"]); ?></h1>
            <hr class="public_rule" />
            <div class="public_page_content">
                <?php echo (htmlspecialchars_decode($data["content"])); ?>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>

</html>