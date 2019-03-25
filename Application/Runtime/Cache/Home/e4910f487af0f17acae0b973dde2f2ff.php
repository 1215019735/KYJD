<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/Home/CSS/style.css">
    <title><?php echo ($data["title"]); ?></title>
</head>

<body>
    <div class="public_page">
        <h1><?php echo ($data["title"]); ?></h1>
        <ul class="clearfix">
            <li>发布时间：<?php echo ($data["times"]); ?></li>
            <li>浏览总数：<?php echo ($data["click"]); ?></li>
        </ul>
        <hr class="public_rule" />
        <div class="public_page_content">
            <?php echo (htmlspecialchars_decode($data["content"])); ?>
        </div>
    </div>
</body>

</html>