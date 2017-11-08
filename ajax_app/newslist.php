<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";




$ndir=$_REQUEST[newsdir2];

//根据目录查找新闻
$strSQL = "select title,intro,id_newsinfo as id,id_newsdir from newsinfo  where dele=1 and id_newsdir=$ndir order by ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();


$pageid=2;//版面管理新闻默认PAGEID=2
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题


///////////////////////////////////////////////////

//bannerpic
$getpicnuminfo=getpagesetpicnuminfo($pageid,9,'opicname as pic,title');//版面管理 9张图片 即图片最大量 
for($i=0;$i<sizeof($getpicnuminfo);$i++){
  $bannerpic.='<img src="'.$siteurl.'/upload/layout/'.$getpicnuminfo[$i][pic].'" class="feature_image"  alt="image" title="#htmlcaption-'.$i.'">';
  $bannertxt.='<p class="nivo-html-caption" id="htmlcaption-'.$i.'">'.$getpicnuminfo[$i][title].'</p>';
   }

///////////////////////////////////////////////////

 for($i=0;$i<sizeof($arrnews);$i++){
$strnewslist.='<div class="productWrapper img_gradient  clearfix " style=" padding-left:5px;">
	<div class="thumbInfo mvs"   style="width:100%;">
		<a  href="javascript:void(0)"  onclick="gonewsview(\'newsview.html\','.$arrnews[$i][id].','.$arrnews[$i][id_newsdir].',\'\')" class="newsName deep_bold_red return_true mtm"> '.$arrnews[$i][title].'
		<p class="mbm">'.$arrnews[$i][intro].'</p>
		</a>
	</div>
</div>';
 } 

////////////////////////
$getnewsdir=getnewsdir($ndir,'name');//获取目录名称 


//////////////////////////////////////////



$arr[info].='

<div class="page">
	
'.$header.'

   

<div id="content">
		<div class="head_panel smaller clearfix">
			<p class="breadcrumbs phm">
				<a class="home-link" href="index.html">首页</a>
			</p>
			<h2 class="uppercase_bold pam"><span class="displayName1">新闻动态 》 '.$getnewsdir[name].'</span></h2>
			
			<div class="criteria_options pam">
				
				
				
				<div class="sort_by_select_menu">
										
				</div>
			</div>
		</div>
		<hr class="wapOnly">
       
	   
     

<div class="collections_top_include product-action-links">
	<span class="drop_shadow"></span>
	
    
      <div id="slider" class="nivoSlider"> 
       '.$bannerpic.'
       </div>
    	'.$bannertxt.'

    	
</div>  

		
	<div class="content-module clearfix" id="type-newslist">
     '.$strnewslist.'
	</div>	
    
  <div class="productWrapper img_gradient  clearfix ">
	<div class="thumbInfo mvs"   style="width:100%; text-align:center">
		<a  href="javascript:void(0)"  onClick="app_nextnews();" class="newsName">
		<p class="mbm">获取更多</p>
		</a>
	</div>
    <div id="pagenum" style="display:none">1</div>
    <div id="ndir" style="display:none">'.$ndir.'</div>    
  </div>
    

'.$footer.'


</div>




    <style type="text/css">
	div.header h1 a{background-image:url("'.$siteurl.'/upload/layout/'.$logopic.'");}/*LOGO*/
    </style>    





';




$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

