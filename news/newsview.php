<?php
require "../inc/cn_newsview_core.php";
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php if($str[pagetitle]!=''){echo $str[pagetitle];}else{echo $setinfo[title];}?></title>
<meta name="keywords" content="<?php if($str[keywords]!=''){echo $str[keywords];}else{echo $setinfo[keywords];}?>" />
<meta name="description" content="<?php if($str[description]!=''){echo $str[description];}else{echo $setinfo[description];}?>" />


	<link rel="stylesheet" href="/inc/css/mobile.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="/inc/css/iphone4.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="/inc/css/banner.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/inc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/inc/js/global.js" ></script>
    
    <style type="text/css">
	div.header h1 a{background-image:url('/upload/layout/<?=getlayoutpic(1,0);?>');}/*LOGO*/
    </style>    
    

<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>


</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?> id="home">

<div class="page">
	
<? require "../header.php"; ?>   

<div id="content">
			<div class="head_panel smaller clearfix">
				<p class="breadcrumbs phm">
					<a class="home-link" href="/">首页</a>
				</p>
				<h2 class="uppercase_bold pam"><span class="displayName1">新闻动态 》 <? $getnewsdir=getnewsdir($ndir,'name');echo $getnewsdir[name];?></span></h2>
			</div>
			<span class="drop_shadow"></span>
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
                    <h1 style=" padding:10px 0;"><?=$onenews[title];?></h1>
                    <?=$onenews[content];?>  

				
			</div>
            
            <div style="padding-bottom:10px; margin:0 auto; width:100px;">
            <a href="javascript:void(0)"  onClick=' $("html,body").animate( {scrollTop:0},"slow",function() {return false;});' id="homeicon09" ><span class="icons" style="height:25px;">返回顶部</span></a>
            </div>
            
		</div>
	

<? require "../footer.php"; ?>   


</div>
</body>
</html>