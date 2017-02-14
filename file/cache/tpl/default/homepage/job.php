<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> &raquo; <?php echo $title;?><?php } ?>
</div>
<?php if($itemid) { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="title"><?php echo $title;?></div>
<div class="info">发布时间：<?php echo timetodate($addtime, 3);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<?php echo $hits;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MENU[$menuid]['linkurl'];?>">返回列表</a></div>
<div class="content">
<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#CCCCCC">
<tr bgcolor="#FFFFFF">
<td width="80">&nbsp;行业</td>
<td width="230">&nbsp;<?php echo $CATEGORY[$parentid]['catname'];?></td>
<td width="80">&nbsp;职位</td>
<td width="230">&nbsp;<?php echo $CATEGORY[$catid]['catname'];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;招聘部门</td>
<td>&nbsp;<?php echo $department;?></td>
<td>&nbsp;招聘人数</td>
<td>&nbsp;<?php if($total) { ?><?php echo $total;?>人<?php } else { ?>若干<?php } ?>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;工作地区</td>
<td>&nbsp;<?php echo area_pos($areaid, '');?></td>
<td>&nbsp;工作性质</td>
<td>&nbsp;<?php echo $TYPE[$type];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;性别要求</td>
<td>&nbsp;<?php echo $GENDER[$gender];?></td>
<td>&nbsp;婚姻要求</td>
<td>&nbsp;<?php echo $MARRIAGE[$marriage];?></td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;学历要求</td>
<td>&nbsp;<?php echo $EDUCATION[$education];?></td>
<td>&nbsp;工作经验</td>
<td>&nbsp;<?php if($experience) { ?><?php echo $experience;?>年以上<?php } else { ?>不限<?php } ?>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;招聘人数</td>
<td>&nbsp;<?php if($minage && $maxage) { ?><?php echo $minage;?>-<?php echo $maxage;?>岁<?php } else if($minage) { ?><?php echo $minage;?>岁以上<?php } else if($maxage) { ?><?php echo $maxage;?>岁以内<?php } else { ?>不限年龄<?php } ?>
</td>
<td>&nbsp;待遇水平</td>
<td>&nbsp;<?php if($minsalary && $maxsalary) { ?><?php echo $minsalary;?>-<?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月<?php } else if($minsalary) { ?><?php echo $minsalary;?><?php echo $DT['money_unit'];?>/月以上<?php } else if($maxsalary) { ?><?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月以内<?php } else { ?>面议<?php } ?>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td>&nbsp;更新日期</td>
<td>&nbsp;<?php echo timetodate($edittime, 3);?></td>
<td>&nbsp;有效期至</td>
<td>&nbsp;<?php if($totime) { ?><?php echo timetodate($totime, 3);?><?php } else { ?>长期有效<?php } ?>
<?php if($expired) { ?><span class="f_red">[已过期]</span><?php } ?>
</td>
</tr>
</table>
</div>
</div>
<div class="main_head"><div><strong>职位描述</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<?php if($could_contact) { ?>
<div class="main_head"><div><strong>联系方式</strong></div></div>
<div class="main_body">
<div class="px13 lh18">
<table width="98%" cellpadding="3" cellspacing="3" align="center">
<tr>
<td width="100">联 系 人：</td>
<td><?php echo $truename;?></td>
</tr>
<tr>
<td>联系电话：</td>
<td><?php if($domain) { ?><?php echo $telephone;?><?php } else { ?><?php echo anti_spam($telephone);?><?php } ?>
</td>
</tr>
<tr>
<td>电子邮件：</td>
<td><?php if($domain) { ?><?php echo $email;?><?php } else { ?><?php echo anti_spam($email);?><?php } ?>
</td>
</tr>
<?php if($mobile) { ?>
<tr>
<td>联系手机：</td>
<td><?php if($domain) { ?><?php echo $mobile;?><?php } else { ?><?php echo anti_spam($mobile);?><?php } ?>
</td>
</tr>
<?php } ?>
<?php if($qq) { ?>
<tr>
<td>联系QQ：</td>
<td><?php echo $qq;?></td>
</tr>
<?php } ?>
<?php if($msn) { ?>
<tr>
<td>联系MSN：</td>
<td><?php echo $msn;?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<?php } ?>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<?php } else { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<table cellpadding="2" cellspacing="1" width="100%" align="center">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr>
<td class="px13" height="25">&middot;<a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></td>
<td align="center">&nbsp;<?php echo $v['department'];?>&nbsp;</td>
<td align="center">&nbsp;<?php if($v['total']) { ?><?php echo $v['total'];?>人<?php } else { ?>若干<?php } ?>
&nbsp;</td>
<td align="center" width="80" class="f_gray px11"><?php echo timetodate($v['edittime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
</div>
<?php } ?>
<?php include template('footer', $template);?>