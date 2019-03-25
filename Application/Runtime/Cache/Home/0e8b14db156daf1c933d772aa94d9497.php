<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title>人才招聘</title>
</head>

<body>
    <div class="public_page">
        <h1>人才招聘</h1>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><ul>
                <li>招聘岗位：<?php echo ($data["posts"]); ?></li>
                <li>学历要求：<?php echo ($data["qualifications"]); ?></li>
                <li>发布时间：<?php echo ($data["times"]); ?></li>
            </ul>
            <hr class="public_rule" />
            <div class="public_page_content">
                <?php echo (htmlspecialchars_decode($data["content"])); ?>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>

</html>