<?php 
/*
* 碎语部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="mainleft">
<p class="breadcrumb">当前位置：<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> » <a><?php echo Option::get('twnavi');?></a> » <?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
    <a href="<?php echo BLOG_URL . 'admin/twitter.php' ?>">发布碎语</a><?php endif; ?></p>
<span class="comments-template">
<div id="commentsbox">
<h3 id="comments">[ 有<?php echo $twnum; ?>条碎语 ]</h3>
<?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    ?>
<ol class="commentlist">
<li class="comment odd alt thread-even depth-<?php echo $tid;?>" id="comment-<?php echo $tid;?>">
	<div id="div-comment-<?php echo $tid;?>" class="comment-body">
		<div class="comment-author vcard">
		<img alt="" src="<?php echo $avatar; ?>" class="avatar avatar-32 photo" height="32" width="32" />		
		<cite class="fn"><?php echo $author; ?></cite> 
		<span class="says">说：</span>
		</div>
		<div class="comment-meta commentmetadata"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');"><?php echo $val['date'];?></a>
		</div>
		<p><?php echo $val['t'];?></p>
		<div class="reply">
		<a class="comment-reply-link" href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a>
		</div>
	</div>
</li>
     <ol id="r_<?php echo $tid;?>" class="r"></ol>
      <div class="huifu" id="rp_<?php echo $tid;?>">   
        <textarea id="rtext_<?php echo $tid; ?>"></textarea>
           <div class="tinfo" style="display:<?php if(ROLE == 'admin' || ROLE == 'writer'){echo 'none';}?>">
           </div><br />
		  <span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /><?php echo $rcode; ?></span>
          昵称:<input type="text" class="text" id="rname_<?php echo $tid; ?>" value="" size="22" tabindex="1"/><input class="button_p" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" name="submit" type="submit" id="tSubmit" tabindex="5" value="提 交" />
          <span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span>       
       </div>
</ol>
<?php endforeach;?>
<span class="pagination"><?php echo $pageurl;?></span>
</span>
</div>
</div>
<?php
 include View::getView('side');?>
<?php include View::getView('footer');
?>