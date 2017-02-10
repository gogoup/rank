<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dashboard - Bootstrap Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

	  <!--框架开始的css文件-->
<link href="/rank/Public/css/bootstrap.min.css" rel="stylesheet" />
<link href="/rank/Public/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="/rank/Public/css/font-awesome.css" rel="stylesheet" />
<link href="/rank/Public/css/adminia.css" rel="stylesheet" />
<link href="/rank/Public/css/adminia-responsive.css" rel="stylesheet" />
<link href="/rank/Public/css/pages/dashboard.css" rel="stylesheet" />
<!---->
<?php if(CONTROLLER_NAME == 'Items'): ?><link href="/rank/Public/css/pages/plans.css" rel="stylesheet" /><?php endif; ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="./">Adminia Admin</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li>
                        <a href="<?php echo U('Home/Common/logout');?>"><span class="badge badge-warning">退出</span></a>
                    </li>

                    <li class="divider-vertical"></li>

                </ul>
            </div> <!-- /nav-collapse -->
        </div> <!-- /container -->
    </div> <!-- /navbar-inner -->
</div> <!-- /navbar -->

<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>

<div id="content">
	
	<div class="container">
        <?php $a=$_SESSION['userinfo']['r_id'] ?>
		<div class="row">
            <?php if( $a < 3): ?><div class="span3">

    <div class="account-container">

        <div class="account-avatar">
            <img src="/rank/Public/img/headshot.png" alt="" class="thumbnail" />
        </div> <!-- /account-avatar -->

        <div class="account-details">

            <span class="account-name"><?php echo $_SESSION['userinfo']['u_name'] ?></span>

            <span class="account-role"><?php echo ($r_name); ?></span>

        </div> <!-- /account-details -->

    </div> <!-- /account-container -->

    <hr />

    <ul id="main-nav" class="nav nav-tabs nav-stacked">

        <li class="active">
            <a href="./">
                <i class="icon-home"></i>
               首页
            </a>
        </li>

        <li>
            <a href="<?php echo U('Home/Items/index');?>">
                <i class="icon-th-list"></i>
                项目管理
            </a>
        </li>

        <li>
            <a href="<?php echo U('Home/Link/index');?>">
                <i class="icon-pushpin"></i>
              成员管理
            </a>
        </li>

        <li>
            <a href="<?php echo U('Home/Discuss/index');?>">
                <i class="icon-th-list"></i>
                个人信息
            </a>
        </li>

    </ul>

</div> <!-- /span3 -->
             <?php else: ?>
                <div class="span3">

    <div class="account-container">

        <div class="account-avatar">
            <img src="/rank/Public/img/headshot.png" alt="" class="thumbnail" />
        </div> <!-- /account-avatar -->

        <div class="account-details">

            <span class="account-name"><?php echo $_SESSION['userinfo']['u_name'] ?></span>

            <span class="account-role"><?php echo ($r_name); ?></span>


        </div> <!-- /account-details -->

    </div> <!-- /account-container -->

    <hr />

    <ul id="main-nav" class="nav nav-tabs nav-stacked">
        <li class="active">
            <a href="<?php echo U('Index/index');?>">
                <i class="icon-home"></i>
                首页
            </a>
        </li>
   <?php if(is_array($project)): $i = 0; $__LIST__ = $project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="active">
            <a href="./">
                <i class="icon-home"></i>
                <?php echo ($menu["p_id"]); echo ($menu["p_name"]); ?>
            </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>

</div> <!-- /span3 --><?php endif; ?>

			<!DOCTYPE html>
<div class="span9">
	
	<h1 class="page-title">
		<i class="icon-home"></i>
		内容概况					
	</h1>
	
	<div class="widget">
							
		<div class="widget-header">
			<i class="icon-signal"></i>
			<h3>项目名称</h3>
		</div> <!-- /widget-header -->
											
		<div class="widget-content">
		我嘞个去 
		</div> <!-- /widget-content -->
	</div>
</div> <!-- /span9 -->
			
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /content -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--框架开始时的js文件-->
<script src="/rank/Public/js/jquery-1.7.2.min.js"></script>
<script src="/rank/Public/js/excanvas.min.js"></script>
<script src="/rank/Public/js/jquery.flot.js"></script>
<script src="/rank/Public/js/jquery.flot.pie.js"></script>
<script src="/rank/Public/js/jquery.flot.orderBars.js"></script>
<script src="/rank/Public/js/jquery.flot.resize.js"></script>
<script src="/rank/Public/js/bootstrap.js"></script>
<script src="/rank/Public/js/charts/bar.js"></script>

  </body>
</html>