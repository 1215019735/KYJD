<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <title>后台管理系统</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/Public/Admin/CSS/bootstrap.min.css" />
  <link rel="stylesheet" href="/Public/Admin/CSS/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="/Public/Admin/CSS/fullcalendar.css" />
  <link rel="stylesheet" href="/Public/Admin/CSS/matrix-style.css" />
  <link rel="stylesheet" href="/Public/Admin/CSS/matrix-media.css" />
  <link rel="stylesheet" href="/Public/Admin/CSS/jquery.gritter.css" />
  <link rel="stylesheet" href="/Public/Static/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="/Public/Static/font-awesome-4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="/Public/Static/kindeditor/plugins/code/prettify.css" />
  <link rel="stylesheet" href="/Public/Static/kindeditor/themes/default/default.css" />
  <link rel="icon" href="/Public/Admin/Images/icon.png" type="image/x-icon" />
  <script src="/Public/Admin/JS/jquery-1.80.js"></script>
  <script src="/Public/Static/jquery-validation/dist/jquery.validate.js"></script>
  <script src="/Public/Static/jquery-validation/src/localization/messages_zh.js"></script>
</head>

<body>
  <div class="alert alert-success" style="position:fixed;top:0;z-index:999;left: 0;right: 0;margin: auto;width: 50%;display: none;">
    <strong>操作成功！</strong> 两秒后自动刷新
  </div>
  <!--Header-part-->
  <div id="header">
    <h1><a href="">Matrix Admin</a></h1>
  </div>
  <!--close-Header-part-->

  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li class="dropdown" id="profile-messages"><a title="" href="javascript:void(0)" data-toggle="dropdown" data-target="#profile-messages"
          class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">欢迎 <?php echo ($_SESSION['admin']['truename']); ?></span><b
            class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('Index/EditPwd');?>"><i class="fa fa-user" aria-hidden="true"></i> 修改密码</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo U('Admin/Index');?>"><i class="fa fa-users" aria-hidden="true"></i> 管理员</a></li>
          <li class="divider"></li>
          <li><a href="javascript:void(0)" id="logs" ajax-url="<?php echo U('Index/ClearLogs');?>" onclick="common.confAction('#logs',{},'确定清除？')"><i
                class="icon icon-refresh"></i>
              清除日志</a></li>
          <li class="divider"></li>
          <li><a href="javascript:void(0)" id="layout" ajax-url="<?php echo U('Index/Layout');?>" onclick="common.confAction('#layout',{},'确定退出？')"><i
                class="fa fa-power-off" aria-hidden="true"></i> 退出登录</a></li>
        </ul>
      </li>
      <li class="dropdown" id="profile-messages"><a href="javascript:void(0);" id="cache" ajax-url="<?php echo U('Index/ClearCache');?>"
          onclick="common.confAction('#cache',{},'确定清除？')" data-target="#profile-messages" class="dropdown-toggle"> <i
            class="icon icon-refresh"></i> <span class="text">清除缓存</span></a>
      </li>
      <li class="dropdown" id="profile-messages"><a title="" href="<?php echo U('/');?>" data-target="#profile-messages" class="dropdown-toggle"
          target="_blank"><i class="fa fa-home aria-hidden=" true"> </i> <span class="text">网站首页</span></a>
      </li>
    </ul>
  </div>


  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <!--close-top-serch-->
  <!--sidebar-menu-->
  <div id="sidebar"><a href="javascript:void(0)" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li class="submenu">
        <a href="javascript:void(0)"><i class="fa fa-home aria-hidden=" true"></i> <span>首页</span></a>
        <ul>
          <li><a href="<?php echo U('Index/Index');?>">系统信息</a></li>
          <li><a href="<?php echo U('Admin/Index');?>">管理员</a></li>
          <li><a href="<?php echo U('Index/Copy');?>">版权管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-eye" aria-hidden="true"></i> <span>酒店展示</span></a>
        <ul>
          <li><a href="<?php echo U('Show/Index');?>">酒店展示管理</a></li>
          <li><a href="<?php echo U('Show/In');?>">内部展示管理</a></li>
          <li><a href="<?php echo U('Show/Category');?>">分类管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-server" aria-hidden="true"></i> <span>服务设施</span></a>
        <ul>
          <li><a href="<?php echo U('Server/Index');?>">服务设施管理</a></li>
          <li><a href="<?php echo U('Server/Category');?>">分类管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>新闻资讯</span></a>
        <ul>
          <li><a href="<?php echo U('News/Index');?>">新闻资讯管理</a></li>
          <li><a href="<?php echo U('News/Category');?>">分类管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-map-marker" aria-hidden="true"></i> <span>地图</span></a>
        <ul>
          <li><a href="<?php echo U('Map/Index');?>">地图坐标管理</a></li>
          <li><a href="<?php echo U('Nav/Index');?>">地图导航管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-usd" aria-hidden="true"></i> <span>价格</span></a>
        <ul>
          <li><a href="<?php echo U('Price/Index');?>">价格管理</a></li>
          <li><a href="<?php echo U('Price/Room');?>">房型管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i> <span>订单</span></a>
        <ul>
          <li><a href="<?php echo U('Pay/Index');?>">订单管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i> <span>页面</span></a>
        <ul>
          <li><a href="<?php echo U('About/Index');?>">关于我们管理</a></li>
          <li><a href="<?php echo U('Zp/Index');?>">人才招聘管理</a></li>
          <li><a href="<?php echo U('Jx/Index');?>">酒店精选管理</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="javascript:void(0)"><i class="fa fa-star" aria-hidden="true"></i> <span>其他</span></a>
        <ul>
          <li><a href="<?php echo U('Code/Index');?>">微信二维码</a></li>
          <li><a href="<?php echo U('Backups/Index');?>">数据备份</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!--sidebar-menu-->

  
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="javascript:void(0)" title="Go to Home" class="tip-bottom"><i class="icon-home"></i><span>首页</span></a>
                <a href="<?php echo U('Index');?>" class="tip-bottom"><span>酒店展示-管理</span></a>
                <a href="<?php echo U('Edit');?>" class="current">修改-酒店展示</a></div>
            <h1>酒店展示-修改页面</h1>
        </div>
        <hr />
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>酒店展示</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">选择分类 :</label>
                                    <div class="controls">
                                        <select name="category">
                                            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == $category): ?><option value="<?php echo ($vo["id"]); ?>" selected><?php echo ($vo["str"]); echo ($vo["name"]); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["str"]); echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">图片 :</label>
                                    <div class="controls">
                                        <input type="text" id="url" name="img" value="<?php echo ($data["img"]); ?>" />
                                        <button id="image" class="btn btn-success" type="button">选择图片</button>
                                        <div id="imageView">
                                            <img src="<?php echo ($data["img"]); ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">预览 :</label>
                                    <div class="controls">
                                        <textarea name="preview" style="width:90.6%;height:100px;"><?php echo ($data["preview"]); ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容 :</label>
                                    <div class="controls">
                                        <textarea id="Show_Edit" name="content" style="width:91.48936170212765%;height:300px;">
                                            <?php echo ($data["content"]); ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">预览-英文版 :</label>
                                    <div class="controls">
                                        <textarea name="epreview" style="width:90.6%;height:100px;"><?php echo ($data["epreview"]); ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容-英文版 :</label>
                                    <div class="controls">
                                        <textarea id="Show_EEdit" name="econtent" style="width:91.48936170212765%;height:300px;">
                                            <?php echo ($data["econtent"]); ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">排序 :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" style="width: 100px;" required digits="true"
                                            max="1000000" min="0" name="orderid" value="<?php echo ($data["orderid"]); ?>" />
                                        <p class="helper-block">100000以内数字（倒序）</p>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="btn-group" style="margin-left:180px;">
                                        <button class="btn btn-success"><i class="icon-ok"></i> 保存</button>
                                        <button type="button" class="btn btn-success" onclick="history.back()"><i class="icon-chevron-left"></i>
                                            取消</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/Public/Static/kindeditor/kindeditor-all.js"></script>
    <script src="/Public/Static/kindeditor/lang/zh-CN.js"></script>
    <script src="/Public/Static/kindeditor/plugins/code/prettify.js"></script>
    <script>
        $(document).ready(function () {
            var editor;
            KindEditor.ready(function (K) {
                editor = K.create('textarea[id="Show_Edit"]', {
                    allowPreviewEmoticons: false,
                    allowImageUpload: true,
                    allowFileManager: true,
                    uploadJson: '/Public/Static/kindeditor/php/upload_json.php',
                    cssPath: '/Public/Static/kindeditor/plugins/code/prettify.css',
                    uploadJson: '/Public/Static/kindeditor/php/upload_json.php',
                    fileManagerJson: '/Public/Static/kindeditor/php/file_manager_json.php',
                    afterCreate: function () {
                        var self = this;
                        K.ctrl(document, 13, function () {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                        K.ctrl(self.edit.doc, 13, function () {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                    }
                });
                prettyPrint();

                //上传图片
                K('#image').click(function () {
                    editor.loadPlugin('image', function () {
                        editor.plugin.imageDialog({
                            showRemote: false,
                            imageUrl: K('#url').val(),
                            clickFn: function (url, title, width, height,
                                border, align) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/Admin/Index/Thumb',
                                    data: {
                                        'width': 589,
                                        'height': 432,
                                        'url': url
                                    },
                                    dataType: 'JSON',
                                    success: function (data) {
                                        $("#licensecheck").html("");
                                        var div = K('#imageView');
                                        div.html('');
                                        div.append('<img src="' + data + '" />');
                                        K('#url').val(data);
                                        editor.hideDialog();
                                    }
                                });
                            }
                        });
                    });
                });
            });

            var Eeditor;
            KindEditor.ready(function (K) {
                Eeditor = K.create('textarea[id="Show_EEdit"]', {
                    allowPreviewEmoticons: false,
                    allowImageUpload: true,
                    allowFileManager: true,
                    uploadJson: '/Public/Static/kindeditor/php/upload_json.php',
                    cssPath: '/Public/Static/kindeditor/plugins/code/prettify.css',
                    uploadJson: '/Public/Static/kindeditor/php/upload_json.php',
                    fileManagerJson: '/Public/Static/kindeditor/php/file_manager_json.php',
                    afterCreate: function () {
                        var self = this;
                        K.ctrl(document, 13, function () {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                        K.ctrl(self.edit.doc, 13, function () {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                    }
                });
                prettyPrint();
            });

            //表单验证
            $().ready(function () {
                $('#form').validate();
            });
        });
    </script>

  <!-- 模态框（Modal） -->
  <div class="modal fade" id="loadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="width:150px;margin: auto;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="text-align:center;">
          <img src="/Public/Admin/Images/spinner.gif" /> 加载中...
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal -->
  </div>

</body>

<script src="/Public/Admin/JS/bootstrap.min.js"></script>
<script src="/Public/Admin/JS/matrix.js"></script>
<script src="/Public/Admin/JS/MyAjax.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage(newURL) {

    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {

      // if url is "-", it is this page -- reset the menu:
      if (newURL == "-") {
        resetMenu();
      }
      // else, send page to designated URL            
      else {
        document.location.href = newURL;
      }
    }
  }

  // resets the menu selection upon entry to this page:
  function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
  }
</script>
</body>

</html>