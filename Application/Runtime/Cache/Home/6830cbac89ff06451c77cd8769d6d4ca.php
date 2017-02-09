<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ThinkCMF">
<tc_include file="Public:head" />
<style>
.control-label{
	font-weight: bold;
	float: left;
	width: 70px;
}
</style>
</head>
<body class="body-white" id="top">
	<tc_include file="Public:nav" />

		<div class="container tc-main">
                <div class="row">
                
                <div class="tabs offset2 span8">
                               <!-- <ul class="nav nav-tabs">
                                   <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-list-alt"></i>个人中心</a></li>
                               </ul> -->
                               <div class="tab-content">
                                   <div class="tab-pane active" id="one">
                                   		<div class="span3">
						                	<a href="javascript:;">
						                	<?php if(empty($avatar)): ?><img src="__TMPL__/Public/images/headicon_128.png" class="headicon"/>
								            <?php else: ?>
								            <img src="<?php echo sp_get_user_avatar_url($avatar);?>" class="headicon"/><?php endif; ?>
								          	</a>
							          	</div>
							          	<div class="span3">
					               			<div class="control-group">
					               				<label class="control-label" for="input-user_nicename">昵称</label>
					               				<div class="controls">
					               					<?php echo ((isset($user_nicename) && ($user_nicename !== ""))?($user_nicename):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-sex">性别</label>
					               				<div class="controls">
					               				<?php $sexs=array("0"=>"保密","1"=>"程序猿","2"=>"程序媛"); ?>
					               					<?php echo ($sexs[$sex]); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-birthday">生日</label>
					               				<div class="controls">
					               					<?php echo ((isset($birthday) && ($birthday !== ""))?($birthday):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-user_url">个人网址</label>
					               				<div class="controls">
					               					<?php echo ((isset($user_url) && ($user_url !== ""))?($user_url):'未填写'); ?>
					               				</div>
					               			</div>
					               			<div class="control-group">
					               				<label class="control-label" for="input-signature">个性签名</label>
					               				<div class="controls">
					               					<?php echo ((isset($signature) && ($signature !== ""))?($signature):'未填写'); ?>
					               				</div>
					               			</div>
					               		</div>
                                   </div>
                               </div>							
                 </div>
                </div>

		<tc_include file="Public:footer" />

	</div>
	<!-- /container -->

	<tc_include file="Public:scripts" />
</body>
</html>