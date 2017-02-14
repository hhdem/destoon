<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <a href="<?php echo $MOD['linkurl'];?>search.php">搜索</a></div>
</div>
<div class="m">
<div class="left_box" style="border-top:none;">
<div class="type">
<a href="<?php echo $MOD['linkurl'];?>search.php?action=group&kw=<?php echo urlencode($kw);?>" class="<?php if($action=='group') { ?>type_1<?php } else { ?>type_2<?php } ?>
">商圈搜索</a>
<a href="<?php echo $MOD['linkurl'];?>search.php?action=post&kw=<?php echo urlencode($kw);?>" class="<?php if($action=='post') { ?>type_1<?php } else { ?>type_2<?php } ?>
">帖子搜索</a>
<a href="<?php echo $MOD['linkurl'];?>search.php?action=reply&kw=<?php echo urlencode($kw);?>" class="<?php if($action=='reply') { ?>type_1<?php } else { ?>type_2<?php } ?>
">回复搜索</a>
</div>
<div class="b10">&nbsp;</div>
<?php if($action == 'group') { ?>
<form action="<?php echo $MOD['linkurl'];?>search.php">
<input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
<div style="padding:10px 0 10px 10px;">
<table cellpadding="3" cellspacing="3">
<tr>
<td width="80" align="right">关 键 词：</td>
<td>
<input type="text" size="80" name="kw" value="<?php echo $kw;?>" style="padding:3px 0 3px 1px;"/>
</td>
</tr>
<tr>
<td align="right">所属分类：</td>
<td><?php echo $category_select;?></td>
</tr>
<?php if($DT['city']) { ?>
<tr>
<td align="right">所在地区：</td>
<td>
<?php echo $area_select;?>
</td>
</tr>
<?php } ?>
<tr>
<td></td>
<td>
<input type="image" src="<?php echo DT_SKIN;?>image/btn_search.gif"/>
<a href="<?php echo $MOD['linkurl'];?>search.php?action=<?php echo $action;?>"><img src="<?php echo DT_SKIN;?>image/btn_reset_search.gif"/></a>
</td>
</tr>
</table>
</div>
</form>
<?php } else if($action == 'reply') { ?>
<form action="<?php echo $MOD['linkurl'];?>search.php">
<input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
<div style="padding:10px 0 10px 10px;">
<table cellpadding="3" cellspacing="3">
<tr>
<td width="80" align="right">关 键 词：</td>
<td><input type="text" size="80" name="kw" value="<?php echo $kw;?>" style="padding:3px 0 3px 1px;"/></td>
</tr>
<tr>
<td align="right">作者：</td>
<td><input type="text" size="10" name="username" value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td align="right">发表日期：</td>
<td><?php echo dcalendar('fromdate', $fromdate, '');?> 至 <?php echo dcalendar('todate', $todate, '');?></td>
</tr>
<tr>
<td></td>
<td>
<input type="image" src="<?php echo DT_SKIN;?>image/btn_search.gif"/>
<a href="<?php echo $MOD['linkurl'];?>search.php?action=<?php echo $action;?>"><img src="<?php echo DT_SKIN;?>image/btn_reset_search.gif"/></a>
</td>
</tr>
</table>
</div>
</form>
<?php } else { ?>
<form action="<?php echo $MOD['linkurl'];?>search.php">
<input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
<div style="padding:10px 0 10px 10px;">
<table cellpadding="3" cellspacing="3">
<tr>
<td width="80" align="right">关 键 词：</td>
<td><input type="text" size="80" name="kw" value="<?php echo $kw;?>" style="padding:3px 0 3px 1px;"/></td>
</tr>
<tr>
<td align="right">作者：</td>
<td><input type="text" size="10" name="username" value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td align="right">发表日期：</td>
<td><?php echo dcalendar('fromdate', $fromdate, '');?> 至 <?php echo dcalendar('todate', $todate, '');?></td>
</tr>
<tr>
<td></td>
<td>
<input type="image" src="<?php echo DT_SKIN;?>image/btn_search.gif"/>
<a href="<?php echo $MOD['linkurl'];?>search.php?action=<?php echo $action;?>"><img src="<?php echo DT_SKIN;?>image/btn_reset_search.gif"/></a>
</td>
</tr>
</table>
</div>
<?php if($CP) { ?>
<?php if(is_array($PPT)) { foreach($PPT as $p) { ?>
<div class="ppt">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class="ppt_l" valign="top">按<?php echo $p['name'];?></td>
<td class="ppt_r" valign="top">
<input type="hidden" name="ppt_<?php echo $p['oid'];?>" id="ppt_<?php echo $p['oid'];?>" value="<?php echo $p['select'];?>"/>
<a href="###" onclick="Dd('ppt_<?php echo $p['oid'];?>').value='';Dd('fsearch').submit();"><?php if($p['select']=='') { ?><span>全部</span><?php } else { ?>全部<?php } ?>
</a>
<?php if(is_array($p['options'])) { foreach($p['options'] as $o) { ?>
&nbsp;|&nbsp;<a href="###" onclick="Dd('ppt_<?php echo $p['oid'];?>').value='<?php echo $o;?>';Dd('fsearch').submit();"><?php if($p['select']==$o) { ?><span><?php echo $o;?></span><?php } else { ?><?php echo $o;?><?php } ?>
</a>
<?php } } ?>
</td>
</tr>
</table>
</div>
<?php } } ?>
<?php } ?>
</form>
<?php } ?>
</div>
</div>
<div class="m b10"></div>
<div class="m">
<?php if($action == 'group') { ?>
<?php if($tags) { ?>
<div class="group_list">
<table cellpadding="6" cellspacing="1" width="100%" bgcolor="#DDDDDD">
<tr bgcolor="#F1F1F1">
<th width="40"></th>
<th>商圈</th>
<th width="100">主题</th>
<th width="100">粉丝</th>
<th width="100">圈主</th>
<th width="100">版主</th>
</tr>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<tr bgcolor="#FFFFFF" align="center">
<td height="40"><a href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" width="36" alt="<?php echo $t['alt'];?>"/></a></td>
<td align="left"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" class="px14 b"><?php echo $t['title'];?><?php echo $MOD['seo_name'];?></a><?php if($t['introduce']) { ?><p><?php echo $t['introduce'];?></p><?php } ?>
</td>
<td><?php echo $t['post'];?></td>
<td><?php echo $t['fans'];?></td>
<td><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['username'];?></a></td>
<td>
<select onchange="if(this.value)window.open(this.value);">
<?php if($r['managers']) { ?>
<option value="">版主列表</option>
<?php if(is_array($r['managers'])) { foreach($r['managers'] as $manager) { ?>
<option value="<?php echo userurl($manager);?>"><?php echo $manager;?></option>
<?php } } ?>
<?php } else { ?>
<option value="">暂无版主</option>
<?php } ?>
</select>
</td>
</tr>
<?php } } ?>
</table>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<?php include template('noresult', 'message');?>
<?php } ?>
<?php } else if($action == 'reply') { ?>
<?php if($tags) { ?>
<div class="reply_list">
<table cellpadding="0" cellspacing="0">
<tr bgcolor="#F1F1F1">
<td height="30">&nbsp;&nbsp;&nbsp;&nbsp;回复内容</td>
<td width="150">回复人</td>
<td width="150">回复时间</td>
</tr>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<tr>
<td><div><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" class="px14"><?php echo $t['title'];?></a></div></td>
<td><a href="<?php echo $MOD['linkurl'];?>search.php?action=<?php echo $action;?>&kw=<?php echo urlencode($kw);?>&username=<?php echo $t['username'];?>"><em><?php echo $t['username'];?></em></a></td>
<td><em><?php echo $t['adddate'];?></em></td>
</tr>
<?php } } ?>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<?php include template('noresult', 'message');?>
<?php } ?>
<?php } else { ?>
<?php if($page==1 && $kw) { ?>
<?php echo ad($moduleid,$catid,$kw,6);?>
<?php echo load('m'.$moduleid.'_k'.urlencode($kw).'.htm');?>
<?php } ?>
<?php if($tags) { ?>
<?php include template('list-'.$module, 'tag');?>
<?php } else { ?>
<?php include template('noresult', 'message');?>
<?php } ?>
<?php } ?>
</div>
<?php include template('footer');?>