<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<?php if($type == 3) { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=index"><span>我的对话</span></a></td>
<td class="tab"><a href="message.php?action=setting" target="_blank"><span>黑名单</span></a></td>
</table>
</div>
<form action="?" onsubmit="return check();" target="_blank" id="dform">
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 输入会员名</td>
<td class="tr">
<input type="text" size="20" name="touser" id="touser"/> 
<input type="submit" value=" 发起对话 " class="btn_g"/>
<span id="dtouser" class="f_red"></span></td>
</tr>
</table>
</form>
<style type="text/css">
#chat-list table {width:400px;margin:10px 0 0 5px;}
.chat_list li {height:20px;line-height:20px;overflow:hidden;color:#908E9B;padding:0 5px 0 0;}
.chat_list span {float:right;color:#908E9B;}
.chat_list em {float:right;color:#FFFFFF;font-style:normal;background:#FF6600;border-radius:50%;color:#FFFFFF;font-size:10px;display:block;_display:inline-block;height:15px;line-height:15px;padding:0 3px;}
.chat_on {background:#FAFAFA;}
.chat_offline {opacity:0.3;filter:Alpha(Opacity=30);}
</style>
<div class="chat_list">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td style="width:400px;line-height:30px;border-bottom:#DDDDDD 1px solid;padding:0 0 0 5px;"><strong>最新对话</strong></td>
<td width="10">&nbsp;</td>
<td>&nbsp;</td>
<tr>
<td valign="top" id="chat-list"></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</div>
<script type="text/javascript">
function check() {
if(Dd('touser').value.length < 2) {
Dmsg('请输入会员名', 'touser');
return false;
}
return true;
}
function Lchat() {
$('#chat-list').load('chat.php?action=list&reload=<?php echo $DT_TIME;?>', function() {
$('#chat-list table').bind('mouseover', function(event) {
$(this).css('background-color', '#FAFAFA');
});
$('#chat-list table').bind('mouseout', function(event) {
$(this).css('background-color', '');
});
});
}
$(document).ready(function() {
Lchat();
setInterval(function() {
Lchat();
}, 10000);
});
</script>
<?php } else { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat.css"/>
<script type="text/javascript">
if(window.screen.width<1200){c(0);Dh('side');Dd('side_oh').className = 'side_s';}
var chat_id = '<?php echo $chat_id;?>';
var chat_poll = <?php echo $chat_poll;?>*1000;
var chat_maxlen = <?php echo $MOD['chat_maxlen'];?>;
var chat_mintime = <?php echo $MOD['chat_mintime'];?>;
var chat_type = <?php echo $type;?>;
var chat_last = <?php echo $DT_TIME;?>;
var chat_title = document.title;
var chat_lang = {
ec1:'按Enter键发送消息，按Ctrl+Enter键换行',
ec2:'按Ctrl+Enter键发送消息，按Enter键换行',
tip:'提示：系统不长久保存您的对话记录，关闭对话窗口将可能导致记录丢失，如果需要保存，请在交谈完毕之后点保存按钮',
last:'ok'
};
var chat_head1 = '<?php echo useravatar($_username);?>';
var chat_head0 = '<?php echo useravatar($user['username']);?>';
var chat_home1 = '<?php echo userurl($_username);?>';
var chat_home0 = '<?php echo userurl($user['username']);?>';
</script>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<div id="chat"></div>
<div id="font" style="display:none;">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td width="8" height="30"></td>
<td width="120">
<select id="font_s" onchange="font_init();">
<option value="0">大小</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="16">16</option>
<option value="18">18</option>
<option value="20">20</option>
<option value="24">24</option>
</select>&nbsp;
<select id="font_c" onchange="font_init();">
<option value="0">颜色</option>
<option value="1" style="background:#000000;">黑</option>
<option value="2" style="background:#FF0000;">红</option>
<option value="3" style="background:#0000FF;">蓝</option>
<option value="4" style="background:#008040;">绿</option>
<option value="5" style="background:#FF6600;">橙</option>
<option value="6" style="background:#FF00FF;">粉</option>
</select>
</td>
<td class="tool_a" id="tool_font_b" onclick="this.className=this.className=='tool_a' ? 'tool_b' : 'tool_a';font_init();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_font_b.gif" width="16" height="16" title="加粗"/></td>
<td class="tool_a" id="tool_font_i" onclick="this.className=this.className=='tool_a' ? 'tool_b' : 'tool_a';font_init();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_font_i.gif" width="16" height="16" title="倾斜"/></td>
<td class="tool_a" id="tool_font_u" onclick="this.className=this.className=='tool_a' ? 'tool_b' : 'tool_a';font_init();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_font_u.gif" width="16" height="16" title="下划线"/></td>
<td>&nbsp;</td>
<td class="c_p" width="15" onclick="font_hide();" title="点击关闭"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/close.gif"/></td>
</tr>
</table>
</div>
<div id="tool">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td width="4">
<div id="face" style="display:none;">
<div><span onclick="face_hide();" title="点击关闭"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/close.gif"/></span><strong>选择表情</strong></div>
<?php if($faces) { ?>
<table cellspacing="0" cellpadding="0" title="点击选择">
<?php if(is_array($faces)) { foreach($faces as $k => $v) { ?>
<?php if($k%10==0) { ?><tr><?php } ?>
<td onmouseover="this.style.backgroundColor='#E3EEF3';" onmouseout="this.style.backgroundColor='';"><img src="face/<?php echo $v;?>.gif" onclick="face_into('<?php echo $v;?>');"/></td>
<?php if($k%10==9) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
</div>
</td>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="if(Dd('font').style.display=='none')this.className='tool_a';" id="tool_font" onclick="font_show();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_font.gif" width="16" height="16" title="设置文字颜色和格式"/></td>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="if(Dd('face').style.display=='none')this.className='tool_a';" id="tool_face" onclick="face_show();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_face.gif" width="16" height="16" title="表情"/></td>
<?php if($MOD['chat_file'] && $MG['upload']) { ?>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="this.className='tool_a';" id="tool_file" onclick="Dfile(<?php echo $moduleid;?>, '', 'chat', '<?php echo $MOD['chat_ext'];?>');"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_file.gif" width="16" height="16" title="传文件"/></td>
<?php } ?>
<td>&nbsp;</td>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="this.className='tool_a';" id="tool_log" onclick="chat_log();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_log.gif" width="16" height="16" title="查看对话记录"/></td>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="this.className='tool_a';" id="tool_save" onclick="chat_save();"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_save.gif" width="16" height="16" title="保存对话记录"/></td>
<td class="tool_a" onmouseover="this.className='tool_b';" onmouseout="this.className='tool_a';" id="tool_clear" onclick="Dd('chat').innerHTML='';"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_clear.gif" width="16" height="16" title="清屏"/></td>
</tr>
</table>
</div>
<div class="word"><textarea id="word" onkeydown="return chat_key(event);" onfocus="Dh('ec');font_hide();face_hide();new_tip_stop();" class="f_gray" onclick="if(this.value==chat_lang.tip)this.value='';this.className='';"></textarea><script type="text/javascript">Dd('word').value=chat_lang.tip;</script></div>
<div id="btns">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td width="5"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_foot_l.gif" width="5" height="30"/></td>
<td><div id="tip" style="display:none;"></div></td>
<td>&nbsp;</td>
<td width="62"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_c1.gif" width="69" height="21" onmouseover="this.src='image/chat_c2.gif';" onmouseout="this.src='image/chat_c1.gif';" onclick="chat_off();"/></td>
<td width="8"> </td>
<td width="62"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_s1.gif" width="62" height="21" onmouseover="this.src='image/chat_s2.gif';" onmouseout="this.src='image/chat_s1.gif';" onclick="chat_send();" id="chat_s"/></td>
<td width="21"><div id="ec" style="display:none;" onmouseover="Ds('ec');" onmouseout="Dh('ec');">
<span id="ec1"><a href="javascript:ec_set(1);">按Enter键发送消息</a></span>
<span id="ec2"><a href="javascript:ec_set(2);">按Ctrl+Enter键发送消息</a></span>
</div><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_e1.gif" width="21" height="21" onmouseover="this.src='image/chat_e2.gif';" onmouseout="this.src='image/chat_e1.gif';" onclick="Ds('ec');"/></td>
<td width="5"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/chat_foot_r.gif" width="5" height="30"/></td>
</tr>
</table>
</div>
<div id="sd"></div>
<form method="post" action="?" id="chat_send" target="send">
<input type="hidden" name="action" value="send"/>
<input type="hidden" name="chatid" value="<?php echo $chatid;?>"/>
<input type="hidden" name="font_s" value="" id="font_s_id"/>
<input type="hidden" name="font_c" value="" id="font_c_id"/>
<input type="hidden" name="font_b" value="" id="font_b_id"/>
<input type="hidden" name="font_i" value="" id="font_i_id"/>
<input type="hidden" name="font_u" value="" id="font_u_id"/>
<input type="hidden" name="word" value="" id="word_id"/>
</form>
<form method="post" action="?" id="chat_down" target="send">
<input type="hidden" name="action" value="down"/>
<input type="hidden" name="chatid" value="<?php echo $chatid;?>"/>
<input type="hidden" name="username" value="<?php echo $user['username'];?>"/>
<input type="hidden" name="data" value="" id="down_data"/>
</form>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/chat.js"></script>
<?php if($MOD['chat_file'] && $MG['upload']) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/clear.js"></script><?php } ?>
</td>
<td width="8">&nbsp;</td>
<td valign="top" class="i_rt">
<div class="i_head">
<strong>对方信息</strong>
</div>
<div class="i_body">
<div class="i_user">
<table cellpadding="6" cellspacing="0" width="100%">
<tr>
<td class="i_user_l"><img src="<?php echo useravatar($user['username']);?>" width="48" height="48"/></td>
<td style="line-height:24px;">&nbsp;<strong><?php echo $user['username'];?></strong> <?php if($online == 1) { ?><span class="f_red">在线</span><?php } else { ?><span class="f_gray">离线</span><?php } ?>
<br/>
&nbsp;<a href="<?php echo $user['linkurl'];?>" target="_blank" class="t"><?php echo $user['company'];?></a>
</td>
</tr>
<tr>
<td class="i_user_l">认证情况：</td>
<td<?php if($user['validated']) { ?> title="企业资料通过<?php echo $user['validator'];?>认证"<?php } ?>
>
<?php if($user['vip']) { ?>&nbsp;<img src="<?php echo DT_SKIN;?>image/vip_<?php echo $user['vip'];?>.gif" align="absmiddle" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $user['vip'];?>级"/><?php } ?>
<?php if($user['vcompany']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/v_company.gif" width="16" height="16" align="absmiddle" title="通过工商认证"/><?php } ?>
<?php if($user['vtruename']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/v_truename.gif" width="16" height="16" align="absmiddle" title="通过实名认证"/><?php } ?>
<?php if($user['vbank']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/v_bank.gif" width="16" height="16" align="absmiddle" title="通过银行帐号认证"/><?php } ?>
<?php if($user['vmobile']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/v_mobile.gif" width="16" height="16" align="absmiddle" title="通过手机认证"/><?php } ?>
<?php if($user['vemail']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/v_email.gif" width="16" height="16" align="absmiddle" title="通过邮件认证"/><?php } ?>
&nbsp;
</td>
</tr>
<tr>
<td class="i_user_l">公司地址：</td>
<td><?php echo $user['address'];?>&nbsp;</td>
</tr>
<?php if($user['postcode']) { ?>
<tr>
<td class="i_user_l">邮政编码：</td>
<td><?php echo $user['postcode'];?></td>
</tr>
<?php } ?>
<tr>
<td class="i_user_l">公司电话：</td>
<td><?php echo $user['telephone'];?></td>
</tr>
<?php if($user['fax']) { ?>
<tr>
<td class="i_user_l">公司传真：</td>
<td><?php echo $user['fax'];?></td>
</tr>
<?php } ?>
<?php if($user['mail']) { ?>
<tr>
<td class="i_user_l">电子邮件：</td>
<td><?php echo $user['mail'];?></td>
</tr>
<?php } ?>
<?php if($user['truename']) { ?>
<tr>
<td class="i_user_l">联 系 人：</td>
<td><?php echo $user['truename'];?> （<?php if($user['gender']==1) { ?>先生<?php } else { ?>女士<?php } ?>
）</td>
</tr>
<?php } ?>
<?php if($user['department']) { ?>
<tr>
<td class="i_user_l">部门职位：</td>
<td><?php echo $user['department'];?><?php if($user['career']) { ?> （<?php echo $user['career'];?>）<?php } ?>
</td>
</tr>
<?php } ?>
<?php if($user['mobile']) { ?>
<tr>
<td class="i_user_l">手机号码：</td>
<td><?php echo $user['mobile'];?><?php if($DT['sms'] && $user['vmobile']) { ?>&nbsp;&nbsp;<a href="sms.php?action=add&auth=<?php echo encrypt($user['mobile'], DT_KEY.'SMS');?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/sendsms.gif" align="absmiddle" title="发送短信" alt=""/></a><?php } ?>
</td>
</tr>
<?php } ?>
<tr>
<td class="i_user_l">即时通讯：</td>
<td>
<?php if($user['qq'] && $DT['im_qq']) { ?><?php echo im_qq($user['qq']);?>&nbsp;<?php } ?>
<?php if($user['ali'] && $DT['im_ali']) { ?><?php echo im_ali($user['ali']);?>&nbsp;<?php } ?>
<?php if($user['msn'] && $DT['im_msn']) { ?><?php echo im_msn($user['msn']);?>&nbsp;<?php } ?>
<?php if($user['skype'] && $DT['im_skype']) { ?><?php echo im_skype($user['skype']);?>&nbsp;<?php } ?>
&nbsp;<a href="?action=black&username=<?php echo $user['username'];?>" class="t" onclick="return confirm('确定要屏蔽Ta吗？您将不再收到Ta的消息');">[屏蔽Ta]</a>
</td>
</tr>
<?php if(($type == 2 || $type == 4) && $chat['forward']) { ?>
<tr>
<td class="i_user_l">来源页面：</td>
<td><a href="<?php echo $chat['forward'];?>" target="_blank" class="l">点击访问</a></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</td>
</tr>
</table>
<?php } ?>
<script type="text/javascript">s('chats');</script>
<?php include template('footer', $module);?>