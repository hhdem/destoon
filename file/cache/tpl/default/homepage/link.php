<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a></div>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="px13 lh18">
<table width="98%" cellpadding="3" cellspacing="3" align="center">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%3==0) { ?><tr align="center"><?php } ?>
<td width="33%"><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<?php if($k%3==2) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
</div>
<?php include template('footer', $template);?>