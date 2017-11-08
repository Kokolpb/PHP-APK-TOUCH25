<!-- start footer <div data-role="footer"> -->
<div class="footer black_gradient">
	<div class="copyright pvm clearfix">
	<? $getlayoutinfo=getlayoutinfo(3,'intro');echo nl2br($getlayoutinfo[intro]);?>
    </div>
</div>
<!-- end footer--> 

    <style type="text/css">
#menufixed{position:fixed;bottom:0px;width:100%;height:50px; background-color:#000;}
#menufixed ul{list-style:none; }
#menufixed li{float:left; text-align:center;width:20%;height:50px;line-height:15px;background-color:#AF1D35}
#menufixed li a{padding-top:3px; color:#fff; font-size:14px; font-weight:bold; text-decoration:none}
#menufixed .icon{ margin-top:5px;background:url(/upload/layout/<?=getlayoutpic(8,0);?>) no-repeat;text-align:center; width:100%;height:20px;}/*页脚菜单图标*/
#menufixed .tel{ background-position:center -80px;}
#menufixed .email{ background-position:center 0px;}
#menufixed .map{ background-position:center -105px;}
#menufixed .msg{ background-position:center -25px;}
#menufixed .share{ background-position:center -52px;}
    </style> 

<div id="menufixed">
<ul>
<li><a href="tel:<?=$setinfo[tel];?>"><div class="icon tel"></div>电话</a></li>
<li><a href="mailto:<?=$setinfo[email];?>"><div class="icon email"></div>邮箱</a></li>
<li><a href="/about/map.php"><div class="icon map"></div>地图</a></li>
<li><a href="/about/feedback.php"><div class="icon msg"></div>留言</a></li>
<li><a href="/about/share.php"><div class="icon share"></div>分享</a></li>
</ul>
</div>

   