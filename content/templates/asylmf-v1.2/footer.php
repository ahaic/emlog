<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div>
<div id="links"><ul><li>友情链接:</li>
<?php {global $CACHE; $link_cache = $CACHE->readCache('link');?>
<?php foreach($link_cache as $value): ?>
<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
<?php endforeach; ?>
<?php }?>
</ul>
</div>
<div id="nav3">
<div class="menu-menuc-container">
<ul id="menu-menuc" class="menu">
<li><a href="<?php echo BLOG_URL; ?>">首页</a></li>
<?php foreach ($navibar as $key => $val):if ($val['hide'] == 'y'){continue;}if (empty($val['url'])){$val['url'] = Url::log($key);} ?>
<li class="<?php echo isset($logid) && $key == $logid ? 'current' : 'menu-item';?>"><a href="<?php echo $val['url']; ?>" target="<?php echo $val['is_blank']; ?>"><?php echo $val['title']; ?></a></li>
<?php endforeach;?><?php doAction('navbar', '<li class="menu-item">', '</li>'); ?>
</ul>
</div>
</div>
<?php copyright();?>
<p class="alignleft">
Copyright &copy; 2011<a href="<?php echo BLOG_URL;?>" title="<?php echo $bloginfo;?>"><?php echo $blogname;?></a> All rights reserved.<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp;?></a></p>
<?php doAction('index_footer'); ?>
</div>
</body>
</html>