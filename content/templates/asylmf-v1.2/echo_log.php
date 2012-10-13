<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="mainleft">
<span class="entry">
<h1 id="entrytitl"><p class="title">当前位置：<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> » <?php echo $log_title; ?></p></h1>
    <div class="entitle"><h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
    <p>作者：<?php blog_author($author); ?>&nbsp;&nbsp;时间：<?php echo gmdate('Y-n-j l', $date); ?>
	&nbsp;&nbsp;分类：<?php blog_sort($logid); ?>&nbsp;&nbsp;评论数：<?php echo $comnum; ?>条</a>&nbsp;&nbsp;<?php editflg($logid,$author);?>&nbsp;&nbsp;
	</p>
    </div>
   <div class="neiwen">
		<?php echo $log_content; ?>
		<?php doAction('log_related', $logData); ?>
     <span class="entags"><?php blog_tag($logid); ?></span><span class="entags"><?php blog_att($logid); ?><br /></span>
     <p class="copy">转载请保留出处 - <strong><a href="<?php echo Url::log($logid); ?>" title="<?php echo Url::log($logid); ?>"><?php echo Url::log($logid); ?></a></strong></p>
	 <p class="copy">引用地址 - <strong><?php blog_trackback($tb, $tb_url, $allow_tb); ?></strong></p>
   </div>
</span>
<span class="ennav"><?php neighbor_log($neighborLog); ?></span>
<span class="relatemore"><h2>更多相关阅读</h2>
<ul><?php index_list("sorttopall","sortid","y",130,100,"y","y","n",29,4);?></ul>
</span>
<span class="enmore"><h2>更多推荐阅读</h2>
<ul><?php index_list("sortranddate","sortid","n",130,100,"y","y","n",90,8);?></ul>
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