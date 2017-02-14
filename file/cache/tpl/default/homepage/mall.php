<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> &raquo; <?php echo $title;?><?php } ?>
</div>
<?php if($itemid) { ?>
<?php echo load('mall.css');?>
<div class="main_head"><div><strong><?php echo $title;?></strong></div></div>
<div class="main_body">
<table width="100%" align="center">
<tr>
<td width="250" valign="top">
<div id="mid_pos"></div>
<div id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));">
<img src="<?php echo $albums['0'];?>" width="240" height="180" id="mid_pic"/><span id="zoomer"></span>
</div>
<div class="b5"></div>
<div>
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');" class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>
" id="t_<?php echo $k;?>"/><?php } } ?>
</div>
<div class="b5"></div>
<div onclick="PAlbum(Dd('mid_pic'));" class="c_b t_c c_p"><img src="<?php echo DT_SKIN;?>image/ico_zoom.gif" width="16" height="16" align="absmiddle"/> 点击图片查看原图</div>
</td>
<td width="15"> </td>
<td valign="top">
<div id="big_div" style="display:none;"><img src="" id="big_pic"/></div>
<?php if($a2) { ?>
<div class="step_price">
<table width="100%" cellpadding="6" cellspacing="0">
<tr>
<td>起批</td>
<td><?php echo $a1;?>-<?php echo $a2;?><?php echo $unit;?></td>
<?php if($a3) { ?>
<td><?php echo $a2+1;?>-<?php echo $a3;?><?php echo $unit;?></td>
<td><?php echo $a3;?><?php echo $unit;?>以上</td>
<?php } else { ?>
<td><?php echo $a2+1;?><?php echo $unit;?>以上</td>
<?php } ?>
</tr>
<tr>
<td>价格</td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px13"><?php echo $p1;?></span></td>
<?php if($a3) { ?>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px13"><?php echo $p2;?></span></td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px13"><?php echo $p3;?></span></td>
<?php } else { ?>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px13"><?php echo $p2;?></span></td>
<?php } ?>
</tr>
</table>
</div>
<?php } ?>
<table width="100%" cellpadding="4" cellspacing="4">
<?php if(!$a2) { ?>
<tr>
<td>单价：</td>
<td class="f_price"><?php echo $DT['money_sign'];?><span class="px16"><?php echo $price;?></span></td>
</tr>
<?php } ?>
<?php if($express_name_1 == '包邮') { ?>
<tr>
<td>物流：</td>
<td>
<?php if($fee_start_1>0) { ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>&nbsp;&nbsp;<?php } ?>
满<?php echo $fee_start_1;?>包邮
<?php } else { ?>
包邮
<?php } ?>
</td>
</tr>
<?php } else if($fee_start_1>0 || $fee_start_2>0 || $fee_start_3>0) { ?>
<tr>
<td>物流：</td>
<td class="f_gray">
<?php if($fee_start_1>0) { ?> <?php echo $express_name_1;?>:<?php echo $fee_start_1;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_2>0) { ?> <?php echo $express_name_2;?>:<?php echo $fee_start_2;?>&nbsp;&nbsp;<?php } ?>
<?php if($fee_start_3>0) { ?> <?php echo $express_name_3;?>:<?php echo $fee_start_3;?>&nbsp;&nbsp;<?php } ?>
</td>
</tr>
<?php } ?>
<?php if($cod) { ?>
<tr>
<td>到付：</td>
<td>支持货到付款</td>
</tr>
<?php } ?>
<tr>
<td>品牌：</td>
<td><?php if($brand) { ?><a href="<?php echo $MOD['linkurl'];?>search.php?fields=4&kw=<?php echo urlencode($brand);?>" target="_blank" rel="nofollow"><?php echo $brand;?></a><?php } else { ?>未填写<?php } ?>
</td>
</tr>
<tr>
<td>地区：</td>
<td><?php echo area_pos($areaid, '');?></td>
</tr>
<tr>
<td>销量：</td>
<td><a href="<?php echo $linkurl;?>#order" target="_blank">累计出售 <span class="f_orange"><?php echo $sales;?></span> 件，<?php echo $orders;?> 个订单</a></td>
</tr>
<tr>
<td>评价：</td>
<td><a href="<?php echo $linkurl;?>#comment" target="_blank">已有 <span class="f_orange"><?php echo $comments;?></span> 条评价</a></td>
</tr>
<tr>
<td>库存：</td>
<td>还剩 <span class="f_orange"><?php echo $amount;?></span> 件</td>
</tr>
<tr>
<td>人气：</td>
<td>已有 <span class="f_orange"><span id="hits"><?php echo $hits;?></span></span> 人关注</td>
</tr>
<tr>
<td width="50">更新：</td>
<td><?php echo $editdate;?></td>
</tr>
<?php if($RL) { ?>
<tr>
<td><?php echo $relate_name;?>：</td>
<td>
<?php if(is_array($RL)) { foreach($RL as $v) { ?>
<div class="relate_<?php if($itemid==$v['itemid']) { ?>2<?php } else { ?>1<?php } ?>
"><?php if($itemid==$v['itemid']) { ?><em></em><?php } ?>
<a href="<?php echo userurl($username, 'file=mall&itemid='.$v['itemid']);?>"><img src="<?php echo $v['thumb'];?>" alt="" title="<?php echo $v['relate_title'];?>"/></a></div>
<?php } } ?>
</td>
</tr>
<?php } ?>
<?php if($P1) { ?>
<tr>
<td><?php echo $n1;?>：</td>
<td id="p1">
<ul>
<?php if(is_array($P1)) { foreach($P1 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P2) { ?>
<tr>
<td><?php echo $n2;?>：</td>
<td id="p2">
<ul>
<?php if(is_array($P2)) { foreach($P2 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($P3) { ?>
<tr>
<td><?php echo $n3;?>：</td>
<td id="p3">
<ul>
<?php if(is_array($P3)) { foreach($P3 as $i => $v) { ?>
<li class="nv_<?php if($i==0) { ?>2<?php } else { ?>1<?php } ?>
"><?php echo $v;?></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } ?>
<?php if($status == 4) { ?>
<tr>
<td></td>
<td><strong class="f_red">该商品已下架</strong></td>
</tr>
<?php } ?>
</table>
<?php if($status == 3 && $amount > 0) { ?>
<div>
<img src="<?php echo DT_SKIN;?>image/btn_tobuy.gif" alt="立即购买" class="c_p" onclick="BuyNow();"/>
&nbsp;
<img src="<?php echo DT_SKIN;?>image/btn_addcart.gif" alt="加入购物车" class="c_p" onclick="AddCart();"/>
</div>
<?php } ?>
</td>
</tr>
</table>
</div>
<div class="main_head"><div><strong>详细信息</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript">
var s_s = {'1':0,'2':0,'3':0};
function addE(i) {
$('#p'+i+' li').mouseover(function() {
if(this.className == 'nv_1') this.className = 'nv_3';
});
$('#p'+i+' li').mouseout(function() {
if(this.className == 'nv_3') this.className = 'nv_1';
});
$('#p'+i+' li').click(function() {
$('#p'+i+' li')[s_s[i]].className = 'nv_1';
this.className = 'nv_2';
s_s[i] = $(this).index();
});
}
<?php if($p1) { ?>addE(1);<?php } ?>
<?php if($p2) { ?>addE(2);<?php } ?>
<?php if($p3) { ?>addE(3);<?php } ?>
function BuyNow() {
Go('<?php echo $MOD['linkurl'];?>buy.php?itemid=<?php echo $itemid;?>&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3]);
}
function AddCart() {
Go('<?php echo $MOD['linkurl'];?>cart.php?itemid=<?php echo $itemid;?>&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3]);
}
</script>
<?php } else { ?>
<div class="main_head">
<div>
<span class="f_r f_n px12">
<?php if($view) { ?>
<a href="<?php echo userurl($username, 'file=mall&typeid='.$typeid, $domain);?>">以橱窗方式浏览</a> | <strong>以目录方式浏览</strong>
<?php } else { ?>
<strong>以橱窗方式浏览</strong> | <a href="<?php echo userurl($username, 'file=mall&view=1&typeid='.$typeid, $domain);?>">以目录方式浏览</a>
<?php } ?>
</span>
<strong>商品列表</strong>
</div>
</div>
<div class="main_body">
<?php if($view) { ?>
<table cellpadding="5" cellspacing="1" width="100%" align="center">
<tr bgcolor="#F1F1F1">
<th width="100">图片</th>
<th>标 题</th>
<th width="110">更新时间</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center"<?php if($k%2==1) { ?> bgcolor="#FBFBFB"<?php } ?>
>
<td height="100"><a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" width="80" height="80" alt="" style="border:#C0C0C0 1px solid;"/></a></td>
<td align="left" class="lh18"><a href="<?php echo $v['linkurl'];?>" class="px13"><?php echo $v['title'];?></a><br/>
价格：<?php echo $DT['money_sign'];?><strong class="f_red"><?php echo $v['price'];?></strong><br/>
品牌：<?php echo $v['brand'];?>&nbsp;销量：<?php echo $v['orders'];?>&nbsp;评论：<?php echo $v['comments'];?>
</td>
<td><?php echo timetodate($v['edittime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%" height="180">
<div class="thumb" onmouseover="this.className='thumb thumb_on';" onmouseout="this.className='thumb';">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" width="100" height="100" alt="<?php echo $v['alt'];?>"/></a>
<div><a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></div>
<span class="f_price"><?php echo $DT['money_sign'];?><?php echo $v['price'];?></span>
</div>
</td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
</div>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').innerHTML = '<strong>'+Dd('name_<?php echo $typeid;?>').innerHTML+'</strong>';}catch (e){}
</script>
<?php } ?>
<?php include template('footer', $template);?>