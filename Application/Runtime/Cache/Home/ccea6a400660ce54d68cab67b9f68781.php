<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>项目管理</title>    
    <!-- {include file="Comm:css"} -->
    <link href="/tp/Public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/tp/Public/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="/tp/Public/css/font-awesome.css" rel="stylesheet" />
    <link href="/tp/Public/css/adminia.css" rel="stylesheet" /> 
    <link href="/tp/Public/css/adminia-responsive.css" rel="stylesheet" /> 
    <link href="/tp/Public/css/pages/login.css" rel="stylesheet" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<body>
	
<div class="navbar navbar-fixed-top" style="background-color: blue;">
	
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="./">项目文件管理系统</a>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					
					<li class="">
						
						<a href="javascript:;"><i class="icon-chevron-left"></i> 返回首页 </a>
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->


<div id="login-container">
	
	
	<div id="login-header">
		
		<h1><i>Login</i></h1>
		
	</div> <!-- /login-header -->
	
	<div id="login-content" class="clearfix">
	
	<form action="./" />
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="username">用户名</label>
						<div class="controls">
							<input type="text" class="" id="username" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">密码</label>
						<div class="controls">
							<input type="password" class="" id="password" />
						</div>
					</div>
				</fieldset>
				
				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">
						Login
					</button>
				</div>
			</form>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			
			<p>新用户请先注册<a href="javascript:;"> 注 册 </a></p>
			
			<p>查看密码提示 <a href="forgot_password.html"> 检 索 </a></p>
			
		</div> <!-- /login-extra -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/jquery-1.7.2.min.js"></script>


<script src="./js/bootstrap.js"></script>

  </body>
</html>