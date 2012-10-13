<?php
/*
Template Name:asylmf
Description:高仿雨林木风软件门户网站 ……
Version:1.2
Author:舞城
Author Url:http://www.iphcn.com
Sidebar Amount:1
ForEmlog:4.1.0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $blogtitle; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>style.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/common_tpl.js" type="text/javascript"></script>
<?php doAction('index_head'); ?> 
</head>
<body>
<div id="nav1">
<p class="description"><a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>"><?php echo $blogname; ?></a></p>
<ul class="login">
<?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
<li></li>
<li><a href="<?php echo BLOG_URL; ?>admin/">管理</a></li>
<li><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
<?php else: ?>
<li><a href="<?php echo BLOG_URL; ?>admin/">登录</a></li>
<?php endif; ?>
</ul>
<div class="menu-menua-container">
<ul id="menu-menua" class="menu1">
<?php if($istwitter == 'y'):?>
<li class="<?php echo $curpage == CURPAGE_TW ? 'current' : 'menu-item';?>"><a href="<?php echo BLOG_URL; ?>t/"><?php echo Option::get('twnavi');?></a></li>
<?php endif;?>
</ul></div></div>
<div id="header">
<p class="logo"><a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>"><?php echo $bloginfo; ?></a></p>
<p class="topbanner"><a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>"><img src="<?php echo TEMPLATE_URL; ?>images/468banner.jpg" alt=""/></a></p>
</div>
<div id="nav2">
<ul><li><a href="<?php echo BLOG_URL; ?>">首页</a></li>
<?php foreach ($navibar as $key => $val):
	 if ($val['hide'] == 'y'){continue;}
	 if (empty($val['url'])){$val['url'] = Url::log($key);}
	 ?>
<li class="<?php echo isset($logid) && $key == $logid ? 'current' : 'cat-item';?>"><a href="<?php echo $val['url']; ?>" target="<?php echo $val['is_blank']; ?>"><?php echo $val['title']; ?></a></li>
<?php endforeach;?>
<?php doAction('navbar', '<li class="cat-item">', '</li>'); ?>
</ul>
</div>
<div id="searchbar">
<span class="searchbotton">
<form name="keyform" id="searchform" method="get" action="<?php echo BLOG_URL; ?>">
<input type="text" value="" name="keyword" id="s" size="23" />
<input type="submit" value="" class="search_btn" id="logserch_logserch" />
</form>
</span>
<span class="tags">
<ul>
<?php {global $CACHE;$tag_cache = $CACHE->readCache('tags');?>
<li>热门标签:</li>
<?php shuffle($tag_cache); $tag_cache = array_slice($tag_cache,0,4);foreach($tag_cache as $value): $color=dechex(rand(0,16777215));?>
<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:52px;">
<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志" style="color:#<?php echo $color; ?>"><?php echo $value['tagname']; ?></a>
</span><?php endforeach; ?>
<?php }?>
</ul>
</span>
<span class="rss"><a href="<?php echo BLOG_URL; ?>rss.php" />订阅RSS</a></span>
</div>
<div id="content">