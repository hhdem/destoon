<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php echo $COM['company'];?><?php } ?>
</title>
<?php if($head_keywords) { ?><meta name="keywords" content="<?php echo $head_keywords;?>"/><?php } ?>
<?php if($head_description) { ?><meta name="description" content="<?php echo $head_description;?>"/><?php } ?>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
<meta name="template" content="<?php echo $template;?>"/>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/common.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $HSPATH;?>style.css"/>
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/homepage.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<script type="text/javascript">
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
<?php if($itemid && $DT['anticopy']) { ?>
document.oncontextmenu=function(e){return false;};
document.onselectstart=function(e){return false;};
<?php } ?>
</script>
<?php if($css) { ?><style type="text/css"><?php echo $css;?></style><?php } ?>
</head>
<body<?php if($bgcolor || $background) { ?> style="background:<?php if($bgcolor) { ?><?php echo $bgcolor;?><?php } ?>
<?php if($background) { ?>url('<?php echo $background;?>') no-repeat center 0<?php } ?>
;"<?php } ?>
>
<div class="m"><div class="top" id="top"><script type="text/javascript">addFav('收藏本页');</script> | <a href="<?php echo $COM['linkurl'];?>" onclick="javascript:try{this.style.behavior='url(#default#homepage)';this.setHomePage(location.href);}catch(e){}return false;">设为主页</a> | <a href="<?php echo DT_PATH;?>api/shortcut.php?itemid=<?php echo $userid;?>" rel="nofollow">保存桌面</a><?php if($EXT['mobile_enable']) { ?> | <a href="javascript:Go('<?php echo $EXT['mobile_url'];?>index.php?moduleid=4&username=<?php echo $username;?>');">手机版</a><?php } ?>
<?php if($head_mobile) { ?> | <a href="javascript:Dqrcode();">二维码</a><?php } ?>
</div></div>
<?php if($head_mobile) { ?><div id="destoon_qrcode" style="display:none;"></div><?php } ?>
<div class="m">
<div class="sign">
<?php if($COM['vip']) { ?>
<div><strong><?php echo $COM['year'];?></strong><span title="指数满分为10"><?php echo $COM['vip'];?></span></div>
<?php } else { ?>
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/free_bg.gif" alt="普通会员"/>
<?php } ?>
</div>
<div class="head">
<?php if($logo) { ?><div class="logo"><a href="<?php echo $COM['linkurl'];?>"><img src="<?php echo $logo;?>" alt="<?php echo $COM['company'];?>" onload="if(this.width>300)this.width=300;"/></a></div><?php } ?>
<div>
<h1><?php echo $COM['company'];?></h1>
<h4><?php echo dsubstr($COM['business'], $logo ? 60 : 80, '...');?></h4>
</div>
</div>
</div>
<div class="m">
<div class="menu" id="menu"<?php if(count($MENU)>8) { ?> style="height:60px;"<?php } ?>
>
<ul>
<li class="<?php if($file=='homepage') { ?>menu_on<?php } else { ?>menu_li<?php } ?>
"><a href="<?php echo $COM['linkurl'];?>"><span>网站首页</span></a></li>
<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
<li class="<?php if($file==$menu_file[$k]) { ?>menu_on<?php } else { ?>menu_li<?php } ?>
"><a href="<?php echo $v['linkurl'];?>"><span><?php echo $v['name'];?></span></a></li>
<?php } } ?>
</ul>
</div>
</div>
<?php if($bannert || $banner) { ?>
<div class="m">
<div class="banner">
<?php if($bannert == 2) { ?>
<div id="slide_banner" style="width:<?php echo $bannerw;?>px;height:<?php echo $bannerh;?>px;background:#FAFAFA;overflow:hidden;">
<a href="###"><img src="<?php echo $banner1;?>" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" alt=""/></a>
<a href="###"><img src="<?php echo $banner2;?>" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" alt=""/></a>
<?php if($banner3) { ?><a href="###"><img src="<?php echo $banner3;?>" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" alt=""/></a><?php } ?>
<?php if($banner4) { ?><a href="###"><img src="<?php echo $banner4;?>" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" alt=""/></a><?php } ?>
<?php if($banner5) { ?><a href="###"><img src="<?php echo $banner5;?>" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" alt=""/></a><?php } ?>
</div>
<?php echo load('slide.js');?>
<script type="text/javascript">new dslide('slide_banner');</script>
<?php } else if($bannert == 1) { ?>
<embed src="<?php echo $bannerf;?>" quality="high" loop="true" extendspage="http://get.adobe.com/flashplayer/" type="application/x-shockwave-flash" width="<?php echo $bannerw;?>" height="<?php echo $bannerh;?>" allowscriptaccess="never"></embed>
<?php } else if($banner) { ?>
<img src="<?php echo $banner;?>" width="100%"/>
<?php } ?>
</div>
</div>
<?php } ?>
<div class="m">
<div class="pos" id="pos">
<span class="f_r">
<script type="text/javascript">show_date();</script>
</span>
<span id="position"></span>
</div>
</div>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php if($side_pos==0) { ?>
<td width="<?php echo $side_width;?>" valign="top" id="side"><?php include template('side', $template);?></td>
<td width="10" id="split"></td>
<?php } ?>
<td valign="top" id="main">