<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>添加提醒</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>已通过<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<form method="post" action="?" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="post[mid]" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">商机类型</td>
<td class="tr f_b"><?php echo $MODULE[$mid]['name'];?></td>
</tr>
<tr>
<td class="tl">关键词</td>
<td class="tr"><input type="text" name="post[word]" id="word" size="30" value="<?php echo $word;?>" maxlength="30"/><span id="dword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">行业分类</td>
<td class="tr"><div id="catesch"></div><?php echo ajax_category_select('post[catid]', '请选择', $catid, $mid, $DT_TOUCH ? '' : 'size="2" style="height:120px;width:180px;"');?><span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">所在地区</td>
<td class="tr"><?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?> <span id="dareaid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">发送频率</td>
<td class="tr">
<select name="post[rate]">
<option value="0"<?php if($rate==0) { ?> selected<?php } ?>
>不限</option>
<option value="1"<?php if($rate==1) { ?> selected<?php } ?>
>1天</option>
<option value="3"<?php if($rate==3) { ?> selected<?php } ?>
>3天</option>
<option value="7"<?php if($rate==7) { ?> selected<?php } ?>
>7天</option>
<option value="15"<?php if($rate==15) { ?> selected<?php } ?>
>15天</option>
<option value="30"<?php if($rate==30) { ?> selected<?php } ?>
>30天</option>
</select>
</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 确 定 " class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('alert');m('add');</script>
<?php } else if($action=='choose') { ?>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 请选择商机类型</td>
<td class="tr">
<?php if(is_array($mids)) { foreach($mids as $v) { ?>
<input type="radio" name="mid" value="<?php echo $v;?>" id="mid_<?php echo $v;?>" onclick="Go('?action=add&mid=<?php echo $v;?>');"/><label for="mid_<?php echo $v;?>" onclick="Go('?action=add&mid=<?php echo $v;?>');"> <?php echo $MODULE[$v]['name'];?></label>&nbsp;&nbsp;
<?php } } ?>
</td>
</tr>
</table>
<script type="text/javascript">s('alert');m('add');</script>
<?php } else { ?>
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th>类别</th>
<th>关键词</th>
<th>行业</th>
<th>地区</th>
<th>添加时间</th>
<th>上次发送</th>
<th>频率</th>
<th width="60">管理</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><a href="<?php echo $MODULE[$v['mid']]['linkurl'];?>" class="t" target="_blank"><?php echo $MODULE[$v['mid']]['name'];?></a></td>
<td><?php if($v['word']) { ?><a href="<?php echo $MODULE[$v['mid']]['linkurl'];?>search.php?kw=<?php echo urlencode($v['word']);?>" class="t" target="_blank"><?php echo $v['word'];?></a><?php } else { ?>不限<?php } ?>
</td>
<td><?php if($v['catid']) { ?><?php echo $v['cate'];?><?php } else { ?>不限<?php } ?>
</td>
<td><?php if($v['areaid']) { ?><a href="<?php echo $MODULE[$v['mid']]['linkurl'];?>search.php?areaid=<?php echo $v['areaid'];?>" target="_blank"><?php echo area_pos($v['areaid'], '-');?></a><?php } else { ?>不限<?php } ?>
</td>
<td class="px11 f_gray"><?php echo timetodate($v['addtime'], 5);?></td>
<?php if($v['sendtime']) { ?>
<td class="px11 f_gray"><?php echo timetodate($v['sendtime'], 5);?></td>
<?php } else { ?>
<td class="f_gray">从未</td>
<?php } ?>
<td class="f_red"><?php if($v['rate']) { ?><?php echo $v['rate'];?>天<?php } else { ?>不限<?php } ?>
</td>
<td><a href="?action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/edit.png" title="修改" alt=""/></a>
<a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="if(!confirm('确定要删除吗？此操作将不可撤销')) return false;"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/delete.png" title="删除" alt=""/></a></td>
</tr>
<?php } } ?>
</table>
</div>
<?php if($MG['alert_limit']) { ?>
<div class="limit">总共可添加 <span class="f_b f_red"><?php echo $MG['alert_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前已添加 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以添加 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条</div>
<?php } ?>
<br/>
<span class="f_gray">&nbsp;&nbsp;<strong>提示</strong>：如果无法正常收到邮件，请将 <span class="f_blue"><?php echo $DT['mail_sender'];?></span> 加入您的邮件白名单。</span>
<br/>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('alert');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php include template('footer', 'member');?>