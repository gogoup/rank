<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dashboard - Bootstrap Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/rank/Public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/rank/Public/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    
    <link href="/rank/Public/css/font-awesome.css" rel="stylesheet" />
    
    <link href="/rank/Public/css/adminia.css" rel="stylesheet" /> 
    <link href="/rank/Public/css/adminia-responsive.css" rel="stylesheet" /> 
    
    <link href="/rank/Public/css/pages/login.css" rel="stylesheet" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	
	<div class="navbar navbar-fixed-top">
		
		<div class="navbar-inner">
			
			<div class="container">
				
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 				
				</a>
				
				<a class="brand" href="../Index">Adminia Admin</a>
				
				<div class="nav-collapse">
				
					<ul class="nav pull-right">
						
						<li class="">
							
							<a href="javascript:;"><i class="icon-chevron-left"></i> Back to Homepage</a>
						</li>
					</ul>
					
				</div> <!-- /nav-collapse -->
				
			</div> <!-- /container -->
			
		</div> <!-- /navbar-inner -->
		
	</div> <!-- /navbar -->


	<div id="login-container">
		<div id="login-header">
			
			<h3>Login</h3>
			
		</div> <!-- /login-header -->
		
		<div id="login-content" class="clearfix">
		
		<form name="login" action="<?php echo U('Common/login');?>" method="post"/>
			<fieldset>
				<div class="control-group">
					<label class="control-label" for="username">用户名</label>
					<div class="controls">
						<input type="text" class="" id="username" name="name" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">密码</label>
					<div class="controls">
						<input type="password" class="" id="password" name="pwd" />
					</div>
				</div>
			</fieldset>
					
			<div id="remember-me" class="pull-left">
				<input type="checkbox" name="remember" id="remember" />
				<label id="remember-label" for="remember">Remember Me</label>
			</div>
			
			<div class="pull-right">
				<button type="submit" class="btn btn-warning btn-large">
					Login
				</button>
			</div>
		</form>
				
	</div> <!-- /login-content -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/rank/Public/js/jquery-1.7.2.min.js"></script>


<script src="/rank/Public/js/bootstrap.js"></script>

  </body>
</html>