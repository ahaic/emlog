<?php 
/*
* 侧边栏
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
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
<div class="squarebanner"><h2 class="sidetitl">最新美图</h2>
<ul><?php index_list("rand",1,"y",127,127,"y","n","n",30,4);?></ul>
</div>
<div class="sidebox"><h2 class="sidetitl">最热文章</h2>
<ul><?php index_list("td",1,"n",130,100,"y","y","n",30,6);?></ul>
</div>
<div class="sidebox"><h2 class="sidetitl">最新留言</h2>
<ul><?php tab_newcomm();?></ul>
</div>
<ul>
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>
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