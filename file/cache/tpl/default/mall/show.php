<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m">
<div class="left_box">
<div class="pos">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($CAT, ' &raquo; ');?> &raquo;</div>
<div class="b10 c_b"></div>
<table width="100%">
<tr>
<td width="10"> </td>
<td>
<table width="100%">
<tr>
<td colspan="3"><h1 class="title_trade" id="title"><?php echo $title;?></h1></td>
</tr>
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
<table width="100%" cellpadding="5" cellspacing="5">
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
<td><?php if($brand) { ?><a href="<?php echo $MOD['linkurl'];?>search.php?fields=4&kw=<?php echo urlencode($brand);?>" target="_blank" class="b" rel="nofollow"><?php echo $brand;?></a><?php } else { ?>未填写<?php } ?>
</td>
</tr>
<tr>
<td>销量：</td>
<td><a href="#order" onclick="Mshow('order');" class="b">累计出售 <span class="f_orange"><?php echo $sales;?></span> <?php echo $unit;?></a></td>
</tr>
<tr>
<td>评价：</td>
<td><a href="#comment" onclick="Mshow('comment');" class="b">已有 <span class="f_orange"><?php echo $comments;?></span> 条评价</a></td>
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
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" alt="" title="<?php echo $v['relate_title'];?>"/></a></div>
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
<?php if($amount) { ?>
<?php if($status == 3) { ?>
<tr>
<td>数量：</td>
<td class="f_gray"><img src="<?php echo DT_SKIN;?>image/arrow_l.gif" width="16" height="8" alt="减少" class="c_p" onclick="Malter('-', <?php echo $a1;?>, <?php echo $amount;?>);"/> <input type="text" value="<?php echo $a1;?>" size="4" class="cc_inp" id="amount" onkeyup="Malter('', <?php echo $a1;?>, <?php echo $amount;?>);"/> <img src="<?php echo DT_SKIN;?>image/arrow_r.gif" width="16" height="8" alt="增加" class="c_p" onclick="Malter('+', <?php echo $a1;?>, <?php echo $amount;?>);"/><?php echo $unit;?> 库存<?php echo $amount;?><?php echo $unit;?></td>
</tr>
<tr>
<td colspan="2">
<img src="<?php echo DT_SKIN;?>image/btn_tobuy.gif" alt="立即购买" class="c_p" onclick="BuyNow();"/>
&nbsp;
<img src="<?php echo DT_SKIN;?>image/btn_addcart.gif" alt="加入购物车" class="c_p" onclick="AddCart();"/>
</td>
</tr>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品已下架</strong></td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
<td></td>
<td><strong class="f_red px14">该商品库存不足</strong></td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>
</td>
<td width="10"> </td>
<td width="300" valign="top">
<div class="contact_head">公司基本资料信息</div>
<div class="contact_body" id="contact"><?php include template('contact', 'chip');?></div>
<?php if(!$username) { ?>
<br/>
&nbsp;<strong class="f_red">注意</strong>:发布人未在本站注册，建议优先选择<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><strong><?php echo VIP;?>会员</strong></a>
<?php } ?>
</div>
</td>
<td width="10"> </td>
</tr>
</table>
<div class="b10">&nbsp;</div>
</div>
</div>
<div class="m">
<div class="b10">&nbsp;</div>
<div class="mall_tab">
<ul>
<li class="mall_tab_2" id="t_detail"><a href="#detail" onclick="Mshow('detail');">商品详情</a></li>
<li class="mall_tab_1" id="t_comment"><a href="#comment" onclick="Mshow('comment');">评价详情(<?php echo $comments;?>)</a></li>
<li class="mall_tab_1" id="t_order"><a href="#order" onclick="Mshow('order');">交易记录(<?php echo $orders;?>)</a></li>
</ul>
</div>
<div class="mall_c" style="display:;" id="c_detail">
<?php if($CP) { ?><?php include template('property', 'chip');?><?php } ?>
<div class="content c_b" id="content"><?php echo $content;?></div>
</div>
<div class="mall_c" style="display:none;" id="c_comment">
<center>正在载入评论详细...</center>
</div>
<div class="mall_c" style="display:none;" id="c_order">
<center>正在载入交易记录...</center>
</div>
</div>
<div class="m">
<br/>
<center>
[ <a href="<?php echo $MOD['linkurl'];?>search.php">商品搜索</a> ]&nbsp;
[ <a href="javascript:SendFav();">加入收藏</a> ]&nbsp;
[ <a href="javascript:SendPage();">告诉好友</a> ]&nbsp;
[ <a href="javascript:Print();">打印本文</a> ]&nbsp;
[ <a href="javascript:SendReport();">违规举报</a> ]&nbsp;
[ <a href="javascript:window.close()">关闭窗口</a> ]
</center>
<br/>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<script type="text/javascript">
var mallurl = '<?php echo $MOD['linkurl'];?>';
var mallid = <?php echo $itemid;?>;
var n_c = <?php echo $comments;?>;
var n_o = <?php echo $orders;?>;
var c_c = Dd('c_comment').innerHTML;
var c_o = Dd('c_order').innerHTML;
var s_s = {'1':0,'2':0,'3':0};
var m_l = {
no_comment:'暂无评论',
no_order:'暂无交易',
no_goods:'商品不存在或已下架',
no_self:'不能添加自己的商品',
lastone:''
};
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/mall.js"></script>
<script type="text/javascript">
<?php if($P1) { ?>addE(1);<?php } ?>
<?php if($P2) { ?>addE(2);<?php } ?>
<?php if($P3) { ?>addE(3);<?php } ?>
if(window.location.href.indexOf('#') != -1) {
var t = window.location.href.split('#');
try {Mshow(t[1]);} catch(e) {}
}
</script>
<?php include template('footer');?>