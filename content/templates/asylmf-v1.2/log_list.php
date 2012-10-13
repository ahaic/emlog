<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.KinSlideshow-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$("#KinSlideshow").KinSlideshow();
})
</script>
<div id="mainleft">
<div class="kinpic">
       <div id="KinSlideshow" style="visibility:hidden;">
       <?php index_list("top",1,"y",600,300,"n","n","n",$timeday,5);?>
       </div></div>
<span class="entry">
		<h1 id="entrytitl">
        <p class="title"><a href="<?php echo BLOG_URL; ?>">最新分享</a>
<?php 
	if ($params[1]=='sort'){ 
		if(isset($_GET['sort'])){
			$sortname= $sort_cache[$_GET['sort']]['sortname'];
		}else{
			foreach($sort_cache as $val){
				if($val['alias']!='' && $params[2]==$val['alias']) $sortname= $val['sortname'];
			}
		}
?>
			 » <?php echo $sortname;?>
<?php }elseif ($params[1]=='tag'){ ?>
			 » <?php echo urldecode($params[2]);?>
<?php }elseif($params[1]=='author'){ ?>
			 » <?php echo blog_author($author);?>
<?php }elseif($params[1]=='keyword'){ ?>
             » <?php echo urldecode($params[2]);?>
<?php }elseif($params[1]=='record'){ ?>
             » <?php echo substr($params[2],0,4).'年'.substr($params[2],4,2).'月';?>
<?php }else{?><?php }?></p>
        </h1>
</span>
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $key=>$value):preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : '';
preg_match_all("|<embed[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $embed);$embedsrc = !empty($embed[1]) ? $embed[1][0] : '';?> 
<span class="wenzhang">
   <h1><p class="title"><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></p>
     <p class="pinglun"><?php echo gmdate('Y年n月j日', $value['date']); ?><a href="<?php echo $value['log_url']; ?>" rel="nofollow">  〖阅读全文〗</a></p>
   </h1>
                <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
				<?php if($imgsrc):?><img src="<?php echo $imgsrc; ?>" width="140" height="auto" alt="<?php echo $value['log_title']; ?>" />
	            <?php elseif($embedsrc):?><embed src="<?php echo $embedsrc; ?>" width="140" height="auto"  alt="<?php echo $value['log_title']; ?>" />
	            <?php else:?><img src="<?php echo TEMPLATE_URL; ?>images/default.gif" width="140" height="auto"  alt="<?php echo $value['log_title']; ?>" />
	            <?php endif;?></a>
    <p class="zhaiyao"><?php echo ''.subString(strip_tags($value['log_description'],$img),0,200).''; ?></p>
</span>
<?php endforeach; ?>
<span class="pagination">
<div class='pagination'>
<span class='current'><?php if($page_url): ?>第&nbsp;<?php echo $page; ?>&nbsp;页&nbsp;&nbsp;共&nbsp;<?php echo ceil($lognum/$index_lognum); ?>&nbsp;页<?php endif; ?></span><?php echo $page_url;?>
</div>
</span>
</div>
<div class="sidebar"><div class="sidenews">
<h2 class="sidetitl">站长推荐</h2>
<dl>
<dt class="newpic"><?php index_list("top",1,"y",130,100,"n","n","n",40,1);?></dt>
<dd class="newtitl"><?php index_list("top",1,"n",130,100,"n","y","n",40,1);?></dd>
<dd class="newentry"><?php index_list("top",1,"n",130,100,"n","n","y",40,1);?></dd>       
</dl>
<dl>
<dt class="newpic"><?php index_list("td",1,"y",130,100,"n","n","n",20,1);?></dt>
<dd class="newtitl"><?php index_list("td",1,"n",130,100,"n","y","n",20,1);?></dd>
<dd class="newentry"><?php index_list("td",1,"n",130,100,"n","n","y",20,1);?></dd>       
</dl>
<ul>
<?php index_list("rand",1,"n",130,100,"y","y","n",60,6);?>
</ul>
</div>
<div class="squarebanner"><h2 class="sidetitl">最新图文</h2>
<ul><?php index_list("rand",1,"y",130,120,"y","n","n",30,4);?></ul>
</div>
<div class="sidebox"><h2 class="sidetitl">最热文章</h2>
<ul><?php index_list("td",1,"n",130,100,"y","y","n",30,6);?></ul>
</div>
<div class="sidebox"><h2 class="sidetitl">最新留言</h2>
<ul><?php tab_newcomm();?></ul>
</div>
<ul>
   <?php widget_twitter("最新消息");?>
<div class="sidebox"><h2 class="sidetitl">广告赞助</h2>
<ul>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6188876196041059";
/* 舞城购物演示站日志广告 */
google_ad_slot = "6453835677";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</ul>
</div>
</ul>
</div>
<?php
 include View::getView('footer');
?>