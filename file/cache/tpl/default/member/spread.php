<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>购买排名</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>已通过<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="word" value="<?php echo $word;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">类型：</td>
<td class="tr"><a href="<?php echo $MODULE[$mid]['linkurl'];?>" class="t"><?php echo $MODULE[$mid]['name'];?>排名</a></td>
</tr>
<tr>
<td class="tl">关键词：</td>
<td class="tr"><strong><?php echo $word;?></strong></td>
</tr>
<tr>
<td class="tl">起价：</td>
<td class="tr f_red f_b"><?php echo $price;?><?php echo $unit;?></td>
</tr>
<tr>
<td class="tl">加价幅度：</td>
<td class="tr f_b"><?php if($step) { ?><?php echo $step;?><?php echo $unit;?><?php } else { ?>不限<?php } ?>
</td>
</tr>
<tr>
<td class="tl">出价：</td>
<td class="tr"><input type="text" name="buy_price" value="<?php echo $price;?>" size="10" id="price" onkeyup="CA();"/></td>
</tr>
<tr>
<td class="tl">购买时长：</td>
<td class="tr">
<select name="buy_month" id="month" onchange="CA();">
<?php for($i=1;$i<=$month;$i++){?>
<option value="<?php echo $i;?>"><?php echo $i;?>月</option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td class="tl">信息ID：</td>
<td class="tr">
<input type="text" name="buy_tid" value="<?php if($mid==4) { ?><?php echo $_userid;?><?php } ?>
" size="10" id="key_id" onfocus="select_item(<?php echo $mid;?>, 'member');"/> <a href="javascript:select_item(<?php echo $mid;?>, 'member');" class="t">选择..</a>  <span id="dkey_id" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">应付总价：</td>
<td class="tr f_red f_b" id="payment"><?php echo $price;?><?php echo $unit;?></td>
</tr>
<?php if($currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>余额：</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $unit;?></span>&nbsp;&nbsp;<a href="charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<tr>
<td class="tl">支付密码：</td>
<td class="tr"><?php include template('password', 'chip');?></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额：</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $unit;?></span>&nbsp;&nbsp;<a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr"><input type="submit" name="submit" value="确定购买" class="btn_g"/>&nbsp;
<input type="button" value="重新选择" class="btn" onclick="Go('<?php echo $EXT['spread_url'];?>');"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function CA() {
if(Dd('price').value.match(/^[0-9]{1,}$/)) {
Dd('payment').innerHTML = Dd('price').value*Dd('month').value + '<?php echo $unit;?>';
} else {
Dd('price').value = '<?php echo $price;?>';
}
}
function check() {
var p = Dd('price').value;
if(p < <?php echo $price;?>) {
alert('出价不能低于起价');
Dd('price').focus();
return false;
}
if((p-<?php echo $price;?>)%<?php echo $step;?> != 0) {
alert('请按加价幅度加价');
Dd('price').focus();
return false;
}
<?php if($currency == 'money') { ?>
if(p*Dd('month').value > <?php echo $_money;?>) {
alert('帐户余额不足，请先充值');
return false;
}
<?php } else { ?>
if(p*Dd('month').value > <?php echo $_credit;?>) {
alert('您的<?php echo $DT['credit_name'];?>不足，请先购买');
return false;
}
<?php } ?>
if(Dd('key_id').value.length < 1) {
alert('请填写信息ID');
Dd('key_id').focus();
return false;
}
<?php if($currency == 'money') { ?>
if(Dd('password').value.length < 6) {
alert('请填写支付密码');
Dd('password').focus();
return false;
}
<?php } ?>
}
</script>
<script type="text/javascript">s('spread');m('add');</script>
<?php } else { ?>
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th>关键词</th>
<th>模块</th>
<th>出价</th>
<th>单位</th>
<th>开始日期</th>
<th>结束日期</th>
<th>剩余(天)</th>
<th>投放状态</th>
<th>申请时间</th>
<th>信息</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><a href="<?php echo $EXT['spread_url'];?><?php echo rewrite('index.php?kw='.urlencode($v['word']));?>" target="_blank" class="b"><?php echo $v['word'];?></a></td>
<td><a href="<?php echo $MODULE[$v['mid']]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($v['word']));?>" target="_blank" class="b" rel="nofollow"><?php echo $MODULE[$v['mid']]['name'];?></a></td>
<td><?php echo $v['price'];?></td>
<td><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?>
</td>
<td><?php echo timetodate($v['fromtime'], 3);?></td>
<td><?php echo timetodate($v['totime'], 3);?></td>
<td<?php if($v['days']<5) { ?> class="f_red"<?php } ?>
><?php echo $v['days'];?></td>
<td><?php echo $v['process'];?></td>
<td class="f_gray px11"><?php echo timetodate($v['addtime'], 5);?></td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $v['mid'];?>&itemid=<?php echo $v['tid'];?>" target="_blank" class="b">直达</a></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('spread');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php include template('footer', $module);?>