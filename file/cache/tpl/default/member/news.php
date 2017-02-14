<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<script type="text/javascript">c(3);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>添加新闻</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab" id="s1"><a href="?status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<td class="tab" id="type"><a href="javascript:Dwidget('type.php?item=news', '[新闻分类]', 600, 300);"><span>新闻分类<span class="px10">(<?php echo $nums['0'];?>)</span></span></a></td>
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<?php if($action=='edit' && $status==1 && $note) { ?>
<tr>
<td class="tl">拒绝原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 新闻标题</td>
<td class="tr"><input name="post[title]" type="text" id="title" size="40" value="<?php echo $title;?>"/>  <?php echo dstyle('post[style]', $style);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 新闻内容</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '100%', 300);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">新闻分类</td>
<td class="tr"><span id="type_box"><?php echo $type_select;?></span>&nbsp; <a href="javascript:var type_item='news-<?php echo $_userid;?>',type_name='post[typeid]',type_default='<?php echo $L['default_type'];?>',type_id=<?php echo $typeid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=news', '[新闻分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 取 消 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">s('news');m(<?php if($action=='add') { ?>'add'<?php } else { ?>'s<?php echo $status;?>'<?php } ?>
);</script>
<?php } else { ?>
<form action="?">
<input type="hidden" name="status" value="<?php echo $status;?>"/>
<div class="tt">
&nbsp;<input type="text" size="60" name="kw" value="<?php echo $kw;?>" title="关键词"/> &nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>
<input type="button" value=" 重 置 " class="btn" onclick="Go('?status=<?php echo $status;?>');"/>
</div>
</form>
<form method="post">
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>分类</th>
<th>标题</th>
<th>添加时间</th>
<th>浏览</th>
<th width="40">修改</th>
<th width="40">删除</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td>&nbsp;<a href="?typeid=<?php echo $v['typeid'];?>"><?php echo $v['type'];?></a>&nbsp;</td>
<td height="30" align="left">&nbsp;&nbsp;&nbsp;<?php if($status==3) { ?><a href="<?php echo $v['linkurl'];?>" class="t" target="_blank"><?php } else { ?><a href="?action=edit&itemid=<?php echo $v['itemid'];?>" class="t"><?php } ?>
<?php echo $v['title'];?></a><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/why.gif" title="未通过原因"/></a><?php } ?>
</td>
<td class="px11 f_gray" title="更新时间 <?php echo $v['editdate'];?>"><?php echo $v['adddate'];?></td>
<td class="px11 f_gray"><?php echo $v['hits'];?></td>
<td><a href="?action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/edit.png" title="修改" alt=""/></a></td>
<td><a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="if(!confirm('确定要删除吗？此操作将不可撤销')) return false;"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/delete.png" title="删除" alt=""/></a></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="btns">
<input type="submit" value=" 删除选中 " class="btn" onclick="if(confirm('确定要删除选中新闻吗？')){this.form.action='?action=delete'}else{return false;}"/>
</div>
</form>
<?php if($MG['news_limit']) { ?>
<div class="limit">总共可发 <span class="f_b f_red"><?php echo $MG['news_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('news');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'title';
l = Dd(f).value.length;
if(l < 5 || l > 50) {
Dmsg('标题应为5-50字，当前已输入'+l+'字', f);
return false;
}
f = 'content';
l = FCKLen();
if(l < 50 || l > 5000) {
Dmsg('内容应为50-5000字，当前已输入'+l+'字', f);
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', 'member');?>