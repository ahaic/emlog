<?php
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="mainleft">
<p class="breadcrumb">当前位置：<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> » 
<?php if(isset($_GET['plugin'])){ $log_title=$navibar[addslashes($_GET['plugin'])]['title'];} ?><?php echo $log_title; ?></p>
<span class="entry"><h1 id="entrytitl"><p class="title"><?php echo $log_title; ?></p></h1>
<div class="neiwen">
<p><?php echo $log_content; ?><p>
<p><?php blog_att($logid); ?></p>
</div>
</span>
<span class="comments-template">
<div id="commentsbox">
<?php blog_comments($comments); ?>
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
</div>
</span>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>