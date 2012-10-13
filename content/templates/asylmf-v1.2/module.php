<?php 
/*
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<li class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</div>
	</li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<li class="sidebox"><h2 class="sidetitl"><?php echo $title; ?></h2>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li class="sidebox"><h2 class="sidetitl"><?php echo $title; ?></h2>
	<div id="blogtags">
	<?php shuffle($tag_cache); foreach($tag_cache as $value): $color=dechex(rand(0,16777215));?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志" style="color:#<?php echo $color; ?>"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</div>
	</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="blogsort">
	<?php foreach($sort_cache as $value): ?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	</li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新碎语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<li><?php echo $value['t']; ?><p><?php echo smartDate($value['date']); ?> </p></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
	<?php endif;?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="newcomment">
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($com_cache as $value):
	$url = Url::log($value['gid']).'#'.$value['cid'];
	?>
	<li id="comment"><?php echo $value['name']; ?>:<a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新日志
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul>
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：随机日志
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<li class="sidebox"><h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="logserch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>">
	<input name="keyword"  type="text" value="" style="width:260px;"/>
	<input type="submit" id="logserch_logserch" value="搜索" />
	</form>
	</ul>
	</li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<li class="sidebox"><h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	<div class="sidebox">
    <h2 class="sidetitl"><?php echo $title; ?></h2>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? '<strong style="color:red">[推荐]</strong>' : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文件附件
function blog_att($blogid){
	global $CACHE;
	$log_cache_atts = $CACHE->readCache('logatts');
	$att = '';
	if(!empty($log_cache_atts[$blogid])){
		$att .= '附件下载：';
		foreach($log_cache_atts[$blogid] as $val){
			$att .= '<br /><a href="'.BLOG_URL.$val['url'].'" target="_blank">'.$val['filename'].'</a> '.$val['size'];
		}
	}
	echo $att;
}
?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<p>上一篇：<a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></p>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
	<?php endif;?>
	<?php if($nextLog):?>
	<p>下一篇：<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a></p>
	<?php endif;?>
<?php }?>
<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
	<a name="tb"></a>
	<?php endif; ?>
	<?php foreach($tb as $key=>$value):?>
		<ul id="trackback">
		<li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
		<li>BLOG: <?php echo $value['blog_name'];?></li><li><?php echo $value['date'];?></li>
		</ul>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：博客评论列表
function blog_comments($comments){
	extract($comments);
	if($commentStacks): $commnum = count($comments);?>
<h3 id="comments"><?php echo $commnum; ?> 条评论</h3>
<?php endif; ?>
<?php
 $isGravatar = Option::get('isgravatar');
 foreach($commentStacks as $cid):
 $comment = $comments[$cid];
 $comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
?>
<ol class="commentlist">
<li class="comment odd alt thread-even depth-<?php echo($comment['level']);?>" id="comment-<?php echo $comment['cid']; ?>">
    <a name="<?php echo $comment['cid']; ?>"></a>
	<div id="div-comment-<?php echo $comment['cid']; ?>" class="comment-body">
		<?php if($isGravatar == 'y'): ?><div class="comment-author vcard">
		<img alt='' src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32" />		
		<cite class="fn"><?php echo $comment['poster']; ?></cite> 
		<span class="says">说：</span></div><?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="#comment-<?php echo $comment['cid']; ?>"><?php echo $comment['date']; ?></a></div>
		<p><?php echo $comment['content']; ?></p>
		<div class="reply">
		<a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
		</div>
<?php blog_comments_children($comments, $comment['children']); ?>
</li>
</ol>
<?php endforeach; ?>
<span class="pagination">
<div class='pagination'>
<?php echo $commentPageUrl;?>
</div>
</span>
<?php }?>
<?php
//blog：博客子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<ul class='children'>
<li class="comment odd alt depth-<?php echo($comment['level'])+1;?> parent" id="comment-<?php echo $comment['cid']; ?>">
<a name="<?php echo $comment['cid']; ?>"></a>
	<div id="div-comment-<?php echo $comment['cid']; ?>" class="comment-body">
		<?php if($isGravatar == 'y'): ?><div class="comment-author vcard">
		<img alt='' src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32" />
		<cite class="fn"><?php echo $comment['poster']; ?></cite> <span class="says">说：</span></div><?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="#comment-<?php echo $comment['cid']; ?>"><?php echo $comment['date']; ?></a>
		</div>
		<p><?php echo $comment['content']; ?></p>
		<?php if($comment['level'] < 4): ?><div class="reply">
		<a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
		<?php endif; ?>
	</div>
	<?php blog_comments_children($comments, $comment['children']);?>
</li>
</ul>
<?php endforeach; ?>
<span class="pagination">
<div class='pagination'>
<?php echo $commentPageUrl;?>
</div>
</span>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-form">
     <div id="respond">
        <div class="cancel-comment-reply">
        <a id="cancel-comment-reply-link" style="display:none;" href="javascript:void(0);" onclick="cancelReply()">点击这里取消回复</a>
		</div>      
<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
<?php if(ROLE == 'visitor'): ?>
<p><input type="text" name="comname" id="author" value="<?php echo $ckname; ?>" size="22" tabindex="1"/>&nbsp;&nbsp;<strong>名字(必填)</strong></p>
<p><input type="text" name="commail" id="email" value="<?php echo $ckmail; ?>" size="22" tabindex="2" />&nbsp;&nbsp;<strong>邮箱(必填)</strong></p>
<p><input type="text" name="comurl" id="url" value="<?php echo $ckurl; ?>" size="22" tabindex="3" />&nbsp;&nbsp;<strong>网站</strong></p>
<?php endif; ?>     
<textarea name="comment" id="comment" cols="100%" rows="8" tabindex="4"></textarea><br />
<?php echo $verifyCode; ?><input name="submit" type="submit" id="commentSubmit" tabindex="5" value="提 交" />
<input type="hidden" name="pid" id="comment-pid" value="0" />        
</form>       
</div>
</div>
<?php endif; ?>
<?php }?>
<?php 
//版权信息输出
function copyright(){
	echo'<div id="footer">';
	echo'<p class="alignright">Powered by <a href="http://www.emlog.net/" title="emlog '.Option::EMLOG_VERSION.'">emlog</a>. Theme by DonLiang.<a href="http://www.iphcn.com" title="舞城网">D&C</a>.</p>';
};?>
<?php 
//首页幻灯片输出
function index_list($way = "nw",$sort,$pic="y",$width,$height,$li="y",$ti="y",$ex="y",$day,$num=3){
	$date = time() - 3600 * 24 * $day;
	if($way=="nw"){//最新发表
        $order = "hide='n' and type='blog' ORDER BY date DESC";
	}if($way=='hd'){//时间段回复总排行
		$order = "hide='n' and type='blog' and date > {$date} ORDER BY comnum DESC";
	}if($way=='td'){//时间段浏览总排行
		$order = "hide='n' and type='blog' and date > {$date} ORDER BY views DESC";
	}if($way=='top'){//置顶文章
		$order = "hide='n' and type='blog' and top='y' ORDER BY date DESC";
	}if($way=="rand"){//总时间随机排行
        $order = "hide='n' and type='blog' ORDER BY rand()";
    }if($way=='sorttopall'){//分类总时间浏览排行
		$order = "hide='n' and type='blog' and sortid=$sort ORDER BY views DESC";
	}if($way=='sortranddate'){//分类时间段随机排行
		$order = "hide='n' and type='blog' and sortid=$sort and date > {$date} ORDER BY rand() DESC";
	}
	$db = MySql::getInstance();
	$sql = "SELECT gid,title,date,content,excerpt FROM ".DB_PREFIX."blog WHERE $order LIMIT 0,$num";
	$log = $db->query($sql);
	while($row = $db->fetch_array($log)) {
	preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $row['content'], $img);
	$imgsrc = !empty($img[1]) ? $img[1][0] : '';
	if($li=="y"){
	echo'<li>';
	}if($pic=="y"){
	echo'<a href="'.Url::log($row['gid']).'" target="_blank">';
	if($imgsrc){echo '<img src="'.$imgsrc.'" width="'.$width.'" height="'.$height.'" title="'.$row['title'].'"/>';}
	else {echo '<img src="'.TEMPLATE_URL.'images/default.gif" width="'.$width.'" height="'.$height.'" title="'.$row['title'].'"/>';}
	echo'</a>';
	}if($ti=="y"){
	echo'<a href="'.Url::log($row['gid']).'" title="'.$row['title'].'" target="_blank">'.$row['title'].'</a>';
    }if($li=="y"){
	echo '</li>';
	}if($ex=="y"){
	echo '<p>'.subString(strip_tags($row['excerpt'],$img),0,145).'</p>';
    }
	}
}?>
<?php
//边栏tab：最新留言
function tab_newcomm($logid = null,$get_total="5"){
	global $CACHE;
	$timezone = Option::get('timezone');
	$com_cache = $CACHE->readCache('comment');
    $cmt = array();
    if($logid == null){
        $cmt=$com_cache;
    }else{
        $db=MySql::getInstance();
        $sql = "SELECT cid,gid,date,poster,mail,comment FROM " . DB_PREFIX . "comment WHERE hide='n' and gid=$logid ORDER BY date DESC LIMIT 0, $get_total";
        $ret= $db->query($sql);
        while($row = $db->fetch_array($ret)){
            $cmt[] = array(
                'cid' => $row['cid'],
                'gid' => $row['gid'],
                'name' => htmlspecialchars($row['poster']),
                'mail' => $row['mail'],
                'date' => $row['date'],
                'content' => htmlClean(subString($row['comment'], 0, 36), false)
            ); }
        }
    if(count($cmt)==0){
        echo $logid == null ? "暂无评论":"暂无留言";
    }else{
    $count=0;
	foreach($cmt as $key=>$value):
    if($count==$get_total)break;
    if($logid==null && $value['gid']==$guestbook_id)continue;
    $gface_url = "http://www.gravatar.com/avatar/".md5($value['mail'])."?size=30&d=".TEMPLATE_URL."images/ava_d.gif";
	$cmt_url = Url::log($value['gid']).'#comment-'.$value['cid'];
?>
<li>
<img alt="" src="<?php echo $gface_url; ?>" class="avatar avatar-30 photo" width="30" /><?php echo $value['name']; ?><br />
<a href="<?php echo $cmt_url; ?>"><?php echo $value['content']; ?></a>
</li>
<?php $count++; endforeach; }?>
<?php }?>