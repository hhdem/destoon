<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<script type="text/javascript">c(3);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>添加证书</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab" id="s1"><a href="?status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<td class="tab" id="s4"><a href="?status=4"><span>已过期<span class="px10">(<?php echo $nums['4'];?>)</span></span></a></td>
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
<td class="tl"><span class="f_red">*</span> 证书名称</td>
<td class="tr"><input name="post[title]" type="text" id="title" size="40" value="<?php echo $title;?>"/>  <?php echo dstyle('post[style]', $style);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 发证机构</td>
<td class="tr"><input type="text" size="40" name="post[authority]" id="authority" value="<?php echo $authority;?>"/> <span id="dauthority" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 发证日期</td>
<td class="tr"><?php echo dcalendar('post[fromtime]', $fromtime);?> <span id="dpostfromtime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">到期日期</td>
<td class="tr"><?php echo dcalendar('post[totime]', $totime);?> 不设置表示永久有效</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 证书图片</td>
<td class="tr">
<input type="hidden" name="post[thumb]" id="thumb" value="<?php echo $thumb;?>"/>
<table width="120">
<tr align="center" height="120" class="c_p">
<td width="120"><img src="<?php if($thumb) { ?><?php echo $thumb;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>
" width="100" height="100" id="showthumb" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,100, 100, Dd('thumb').value, true);}"/></td>
</tr>
<tr align="center" height="25">
<td><span onclick="Dalbum('',<?php echo $moduleid;?>,100, 100, Dd('thumb').value, true);" class="jt">[上传]</span>&nbsp;<span onclick="delAlbum('','wait');" class="jt">[删除]</span></td>
</tr>
</table>
 <span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">证书介绍</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '100%', 200);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 取 消 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">s('honor');m(<?php if($action=='add') { ?>'add'<?php } else { ?>'s<?php echo $status;?>'<?php } ?>
);</script>
<?php } else { ?>
<form action="?">
<input type="hidden" name="status" value="<?php echo $status;?>"/>
<div class="tt">
&nbsp;<input type="text" size="60" name="kw" value="<?php echo $kw;?>" title="关键词"/> &nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?status=<?php echo $status;?>');"/>
</div>
</form>
<form method="post">
<div class="ls">
<table cellspacing="0" cellpadding="0" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="120">证书</th>
<th>证书名称</th>
<th>发证机构</th>
<th>发证日期</th>
<th>到期日期</th>
<th width="40">修改</th>
<th width="40">删除</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td title="点击查看大图 添加时间: <?php echo $v['adddate'];?> 更新时间: <?php echo $v['editdate'];?>" style="padding:10px 0 10px 0;"><a href="<?php echo $v['image'];?>" target="_blank"><img src="<?php echo $v['thumb'];?>" width="100" height="100"/></a></td>
<td><?php echo $v['title'];?><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/why.gif" title="未通过原因"/></a><?php } ?>
</td>
<td><?php echo $v['authority'];?></td>
<td class="f_gray"><?php echo $v['fromdate'];?></td>
<td class="f_gray"><?php echo $v['todate'];?></td>
<td><a href="?action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/edit.png" title="修改" alt=""/></a></td>
<td><a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="if(!confirm('确定要删除吗？此操作将不可撤销')) return false;"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/delete.png" title="删除" alt=""/></a></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="btns">
<input type="submit" value=" 删除选中 " class="btn" onclick="if(confirm('确定要删除选中证书吗？')){this.form.action='?action=delete'}else{return false;}"/>
</div>
</form>
<?php if($MG['honor_limit']) { ?>
<div class="limit">总共可发 <span class="f_b f_red"><?php echo $MG['honor_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('honor');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
if(Dd('title').value == '') {
Dmsg('请填写证书名称', 'title');
return false;
}
if(Dd('authority').value == '') {
Dmsg('请填写发证机构', 'authority');
return false;
}
if(Dd('postfromtime').value == '') {
Dmsg('请选择发证日期', 'postfromtime');
return false;
}
if(Dd('postfromtime').value.replace(/-/g, '') > <?php echo $today;?>) {
Dmsg('发证日期尚未开始', 'postfromtime');
return false;
}
if(Dd('thumb').value == '') {
Dmsg('请上传证书图片', 'thumb', 1);
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', 'member');?>