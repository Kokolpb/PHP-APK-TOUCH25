<?php
require "../inc/cn_newslist_core.php";
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

<script>

function nextnews() {
               $.post('/news/ajax_getnews.php',{pagenum:$('#pagenum').text(),ndir:$('#ndir').text()},function(data){
                            var myjson = '';eval('myjson=' + data + ';');
							if(myjson.info!=''){
								 $("#type-newslist").append(myjson.info);
								 $("#pagenum").text(myjson.pagenum);
								}else{
					              return false;
								}
							
							});
}
</script>
</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?> id="home">

<div class="page">
	
<? require "../header.php"; ?>   

<div id="content">
		<div class="head_panel smaller clearfix">
			<p class="breadcrumbs phm">
				<a class="home-link" href="/">Home</a>
			</p>
			<h2 class="uppercase_bold pam"><span class="displayName1">新闻动态 》 <? $getnewsdir=getnewsdir($ndir,'name');echo $getnewsdir[name];?></span></h2>
			
			<div class="criteria_options pam">
				
				
				
				<div class="sort_by_select_menu">
										
				</div>
			</div>
		</div>
		<hr class="wapOnly">
       
	   <? require "../sub_banner.php"; ?>  

		
		<div class="content-module clearfix" id="type-newslist">

 <? for($i=0;$i<sizeof($arrnews);$i++){?>
<div class="productWrapper img_gradient  clearfix " style=" padding-left:5px;">
	<div class="thumbInfo mvs"   style="width:100%;">
		<a href="/news/newsview.php/<?=$arrnews[$i][id]?>/<?=$arrnews[$i][id_newsdir]?>/.html" class="newsName deep_bold_red return_true mtm"> <?=$arrnews[$i][title]?>
		<p class="mbm"> <?=$arrnews[$i][intro]?></p>
		</a>
	</div>
</div>
 <? }?>  



	</div>	
    
  <div class="productWrapper img_gradient  clearfix ">
	<div class="thumbInfo mvs"   style="width:100%; text-align:center">
		<a  href="javascript:void(0)"  onClick="nextnews();" class="newsName">
		<p class="mbm">获取更多</p>
		</a>
	</div>
    <div id="pagenum" style="display:none">1</div>
    <div id="ndir" style="display:none"><?=$ndir;?></div>    
  </div>
    

<? require "../footer.php"; ?>   


</div>
</body>
</html>