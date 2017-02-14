<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($action == 'my') { ?>
<?php include template('header-widget', $module);?>
<form action="friend.php">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="from" value="<?php echo $from;?>"/>
<div class="tt">
<?php echo $fields_select;?>&nbsp;
<input type="text" size="40" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<input type="submit" value="搜 索" class="btn"/>
<input type="button" value="重 搜" class="btn" onclick="Go('friend.php?action=<?php echo $action;?>&from=<?php echo $from;?>');"/>
</div>
</form>
<?php if($lists) { ?>
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th width="26"></th>
<th>公司</th>
<th>姓名</th>
<th><?php if($from=='sms') { ?>手机<?php } else { ?>会员<?php } ?>
</th>
<?php if($DT['im_web']) { ?><th>在线</th><?php } ?>
<th><input type="checkbox" id="c_0" onclick="_check();"/></th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" title="<?php echo $v['note'];?>">
<td><img src="<?php echo useravatar($v['username'], 'small');?>" width="20" height="20"/></td>
<td align="left">&nbsp;<a href="<?php echo userurl($v['username']);?>" target="_blank" class="t"><?php echo $v['company'];?></a></td>
<td><?php echo $v['truename'];?></td>
<td id="v_<?php echo $v['itemid'];?>"><?php if($from=='sms') { ?><?php echo $v['mobile'];?><?php } else { ?><?php echo $v['username'];?><?php } ?>
</td>
<?php if($DT['im_web']) { ?><td><?php echo im_web($v['username']);?></td><?php } ?>
<td><input type="checkbox" id="c_<?php echo $v['itemid'];?>" onclick="_send(<?php echo $v['itemid'];?>);"/></td>
</tr>
<?php } } ?>
</table>
</div>
<?php if($page) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<div style="text-align:center;">
<input type="button" value="确 定" class="btn" onclick="window.parent.cDialog();"/>&nbsp;&nbsp;
<input type="button" value="关 闭" class="btn" onclick="window.parent.cDialog();"/>
</div>
<script type="text/javascript">
var itemids = [<?php if(is_array($lists)) { foreach($lists as $i => $t) { ?><?php if($i) { ?>,<?php } ?>
'<?php echo $t['itemid'];?>'<?php } } ?>];
<?php if($from == 'sms') { ?>
function _send(id) {
var v = Dd('v_'+id).innerHTML;
if(parent.Dd('mob').value && parent.Dd('mob').value.indexOf("\n") == -1) parent.Dd('mob').value = parent.Dd('mob').value+"\n";
if(Dd('c_'+id).checked) {
if(parent.Dd('mob').value.indexOf(v) == -1) parent.Dd('mob').value = parent.Dd('mob').value+v+"\n";
} else {
if(parent.Dd('mob').value.indexOf(v) != -1) parent.Dd('mob').value = parent.Dd('mob').value.replace(v+"\n", '');
}
}
function _check() {
for(var i = 0; i < itemids.length; i++) {
itemid = itemids[i];
Dd('c_'+itemid).checked = Dd('c_0').checked ? true :false;
_send(itemid);
}
}
if(parent.Dd('mob').value) {
s = parent.Dd('mob').value+"\n";
for(var i = 0; i < itemids.length; i++) {
itemid = itemids[i];
f = Dd('v_'+itemid).innerHTML+"\n";
if(s.indexOf(f) != -1) Dd('c_'+itemid).checked = true;
}
}
<?php } else { ?>
var max = <?php echo $MOD['maxtouser'];?>;
function _send(id) {
var v = Dd('v_'+id).innerHTML;
if(parent.Dd('touser').value && parent.Dd('touser').value.indexOf(' ') == -1) parent.Dd('touser').value = parent.Dd('touser').value+' ';
if(Dd('c_'+id).checked) {
if(max && substr_count(parent.Dd('touser').value, ' ') >= max) {
Dd('c_'+id).checked = false;
return alert('最多可以选择'+max+'个收件人');
}
if(parent.Dd('touser').value.indexOf(v) == -1) parent.Dd('touser').value = parent.Dd('touser').value+v+' ';
} else {
if(parent.Dd('touser').value.indexOf(v) != -1) parent.Dd('touser').value = parent.Dd('touser').value.replace(v+' ', '');
}
}
function _check() {
for(var i = 0; i < itemids.length; i++) {
itemid = itemids[i];
if(Dd('c_0').checked) {
if(max && substr_count(parent.Dd('touser').value, ' ') >= max) {
break;
} else {
Dd('c_'+itemid).checked = true;
_send(itemid);
}
} else {
Dd('c_'+itemid).checked = false;
_send(itemid);
}
}
}
if(parent.Dd('touser').value) {
s = parent.Dd('touser').value+' ';
for(var i = 0; i < itemids.length; i++) {
itemid = itemids[i];
f = Dd('v_'+itemid).innerHTML+' ';
if(s.indexOf(f) != -1) Dd('c_'+itemid).checked = true;
}
}
<?php } ?>
</script>
<?php } else { ?>
<center><?php if($kw) { ?>未搜索到商友<?php } else { ?>暂无商友<?php } ?>
</center>
<?php } ?>
</body>
</html>
<?php } else { ?>
<?php include template('header', $module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="friend.php?action=add"><span>添加商友</span></a></td>
<td class="tab" id="home"><a href="friend.php?action=index"><span>我的商友</span></a></td>
<td class="tab" id="type"><a href="javascript:Dwidget('type.php?item=friend', '[商友分类]', 600, 300);"><span>商友分类</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="friend.php" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="5" cellspacing="1" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><span id="type_box"><?php echo $type_select;?></span>&nbsp; <a href="javascript:var type_item='friend-<?php echo $_userid;?>',type_name='post[typeid]',type_default='<?php echo $L['default_type'];?>',type_id=<?php echo $typeid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=friend', '[商友分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 姓名</td>
<td class="tr"><input type="text" size="20" name="post[truename]" id="truename" value="<?php echo $truename;?>"/> <?php echo dstyle('post[style]');?> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">会员名</td>
<td class="tr"><input type="text" size="20" name="post[username]" id="username" value="<?php echo $username;?>"/> <input type="button" class="btn_b" value="显示资料" onclick="Go('friend.php?action=add&username='+Dd('username').value);"/></td>
</tr>
<tr>
<td class="tl">公司名称</td>
<td class="tr"><input type="text" size="40" name="post[company]" id="company" value="<?php echo $company;?>"/></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><input type="text" size="20" name="post[mobile]" id="mobile"/></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><input type="text" size="40" name="post[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">Email</td>
<td class="tr"><input type="text" size="30" name="post[email]" id="email"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input type="text" size="30" name="post[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="40" name="post[note]" id="note"/></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 添 加 " class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('friend');m('add');</script>
<?php } else if($action == 'edit') { ?>
<form method="post" action="friend.php" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="5" cellspacing="1" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><span id="type_box"><?php echo $type_select;?></span>&nbsp; <a href="javascript:var type_item='friend-<?php echo $_userid;?>',type_name='post[typeid]',type_default='<?php echo $L['default_type'];?>',type_id=<?php echo $typeid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=friend', '[商友分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl">显示顺序</td>
<td class="tr f_gray"><input type="text" size="3" name="post[listorder]" id="listorder" value="<?php echo $listorder;?>"/> 请填写数字，数字越大越靠前</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 姓名</td>
<td class="tr"><input type="text" size="20" name="post[truename]" id="truename" value="<?php echo $truename;?>"/> <?php echo dstyle('post[style]', $style);?> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">会员名</td>
<td class="tr"><input type="text" size="20" name="post[username]" id="username" value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td class="tl">公司名称</td>
<td class="tr"><input type="text" size="40" name="post[company]" id="company" value="<?php echo $company;?>"/></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><input type="text" size="20" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>"/></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><input type="text" size="40" name="post[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">Email</td>
<td class="tr"><input type="text" size="30" name="post[email]" id="email" value="<?php echo $email;?>"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input type="text" size="30" name="post[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="40" name="post[note]" id="note" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 修 改 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 取 消 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('friend');m('home');</script>
<?php } else { ?>
<form action="friend.php">
<div class="tt">
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>
<input type="button" value=" 重 搜 " class="btn" onclick="Go('friend.php');"/>
</div>
</form>
<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#E8E8E8">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%2==0) { ?><tr><?php } ?>
<td valign="top" width="50%" bgcolor="#FFFFFF" onmouseover="this.style.backgroundColor='#F5F5F5';" onmouseout="this.style.backgroundColor='#FFFFFF';" title="<?php echo $v['note'];?>">
<?php if($v) { ?>
<table cellpadding="2" cellspacing="2" width="96%" align="center">
<tr>
<td height="24"><strong><?php echo $v['dcompany'];?></strong></td>
</tr>
<tr>
<td height="22"><?php echo $v['truename'];?><?php if($v['career']) { ?> (<?php echo $v['career'];?>)<?php } ?>
</td>
</tr>
<tr>
<td height="20">电话：<?php echo $v['telephone'];?></td>
</tr>
<tr>
<td height="20">手机：<?php echo $v['mobile'];?></td>
</tr>
<tr>
<td height="20">
<span class="f_r" title="添加时间 <?php echo $v['adddate'];?>">
<a href="friend.php?typeid=<?php echo $v['typeid'];?>" class="t">[<?php echo $v['type'];?>]</a>&nbsp;
<a href="?action=edit&itemid=<?php echo $v['itemid'];?>" class="t">[修改]</a>&nbsp;
<a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');" class="t">[删除]</a>&nbsp;
</span>
<?php if($v['homepage']) { ?><a href="<?php echo $v['homepage'];?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/homepage.gif" title="公司主页" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($DT['sms'] && $v['mobile']) { ?><a href="sms.php?action=add&mob=<?php echo $v['mobile'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/mobile.gif" title="发送短信" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['username']) { ?><a href="message.php?action=send&touser=<?php echo $v['username'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="发送站内信" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['email']) { ?><a href="sendmail.php?email=<?php echo $v['email'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="发送Email <?php echo $v['email'];?>" alt="" align="absmiddle"/></a>&nbsp;<?php } ?>
<?php if($v['username'] && $DT['im_web']) { ?><?php echo im_web($v['username']);?>&nbsp;<?php } ?>
<?php if($v['qq'] && $DT['im_qq']) { ?><?php echo im_qq($v['qq']);?>&nbsp;<?php } ?>
<?php if($v['ali'] && $DT['im_ali']) { ?><?php echo im_ali($v['ali']);?>&nbsp;<?php } ?>
<?php if($v['msn'] && $DT['im_msn']) { ?><?php echo im_msn($v['msn']);?>&nbsp;<?php } ?>
<?php if($v['skype'] && $DT['im_skype']) { ?><?php echo im_skype($v['skype']);?>&nbsp;<?php } ?>
</td>
</tr>
</table>
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
<?php if($k%2==1) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php if($MG['friend_limit']) { ?>
<div class="limit">商友上限 <span class="f_b f_red"><?php echo $MG['friend_limit'];?></span> 人&nbsp;&nbsp;&nbsp;当前已加 <span class="f_b"><?php echo $limit_used;?></span> 人&nbsp;&nbsp;&nbsp;还可以加 <span class="f_b f_blue"><?php echo $limit_free;?></span> 人</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('friend');m('home');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
if(Dd('truename').value == '') {
Dmsg('请填写姓名', 'truename');
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', $module);?>
<?php } ?>
