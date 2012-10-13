<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<div style="clear:both;"></div>
<div id="footerbar">
<?php echo $footer_info; ?>
&nbsp; &nbsp;&nbsp; &nbsp;
Powered by <a href="/admin.php" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a> 


<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> 
<p>地址:江苏省常州市农机市场C区118#  &nbsp; &nbsp; 电话:0519-85117850 &nbsp; &nbsp;  电邮: cz85117850@163.com &nbsp; &nbsp;Copyright ©2012</p>
<?php doAction('index_footer'); ?>
</div><!--end #footerbar-->
</div><!--end #wrap-->
</body>
</html>