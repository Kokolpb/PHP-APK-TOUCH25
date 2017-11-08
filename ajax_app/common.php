<?php



$logopic=getlayoutpic(1,0);
$menubottomicon=getlayoutpic(8,0);//页脚菜单图标



$header='

<div class="header black_gradient"><!-- start header -->
	
	<h1 class="pam"><a href="index.html" class="ir">LOGO</a></h1>
	<a href="javascript:void(0)" class="search_toggle icons"><span class="arrows r-white prm">搜索产品</span></a>
	
	<div class="search_wrap phm">
		<form id="product-search" action="#" method="post" accept-charset="utf-8">
			<label for="product-search-input" data-role="none">产品名称</label>
			<input type="hidden" name="from" value="home" data-role="none" />						
			<input type="text" name="search_key" id="product-search-input" autocapitalize="off" autocorrect="off" class="default" data-role="none" />
			<button type="button" data-role="none" class="bevel_button red"  onclick="gosearch(\'search.html\',\'\',\'\',\'\');">Search</button>
			
		</form>
	</div>
	
</div><!-- end header -->

';

///////////////////////////////////////////////////////////////////////////////
//页脚固定菜单
$menufixed='

<style>
#menufixed{position:fixed;bottom:0px;width:100%;height:50px; background-color:#000;}
#menufixed ul{list-style:none; }
#menufixed li{float:left; text-align:center;width:20%;height:50px;line-height:15px;background-color:#AF1D35}
#menufixed li a{padding-top:3px; color:#fff; font-size:14px; font-weight:bold; text-decoration:none}
#menufixed .icon{ margin-top:5px;background:url('.$siteurl.'/upload/layout/'.$menubottomicon.') no-repeat;text-align:center; width:100%;height:20px;}
#menufixed .tel{ background-position:center -80px;}
#menufixed .email{ background-position:center 0px;}
#menufixed .map{ background-position:center -105px;}
#menufixed .msg{ background-position:center -25px;}
#menufixed .share{ background-position:center -52px;}

</style>

<div id="menufixed">
<ul>
<li><a href="tel:'.$setinfo[tel].'"><div class="icon tel"></div>电话</a></li>
<li><a href="mailto:'.$setinfo[email].'"><div class="icon email"></div>邮箱</a></li>
<li><a href="map.html"><div class="icon map"></div>地图</a></li>
<li><a href="feedback.html"><div class="icon msg"></div>留言</a></li>
<li><a href="share.html"><div class="icon share"></div>分享</a></li>
</ul>
</div>


';


///////////////////////////////////////////////////////////////////////////

$getlayoutinfo=getlayoutinfo(3,'intro');//获取页脚
$footer='

<!-- start footer <div data-role="footer"> -->
<div class="footer black_gradient">
	<div class="copyright pvm clearfix">
	'.nl2br($getlayoutinfo[intro]).'
	</div>
</div>
<!-- end footer-->    
<div style="height:50px;"></div>
'.$menufixed;









?>

