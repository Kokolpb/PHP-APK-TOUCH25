<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";



$newsid=$_REQUEST[newsviewid];
$ndir=$_REQUEST[newsviewdir2];



$pageid=2;//版面管理新闻默认PAGEID=2
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题 等

//新闻内容
$strSQL = "select title,content from newsinfo where id_newsinfo='".$newsid."'  " ;
$objDB->Execute($strSQL);
$onenews=$objDB->fields();

$getnewsdir=getnewsdir($ndir,'name');//新闻目录
///////////////////////////////////////////////////




$arr[info].='

<div class="page">
	
'.$header.'

   

<div id="content">
			<div class="head_panel smaller clearfix">
				<p class="breadcrumbs phm">
					<a class="home-link" href="index.html">首页</a>
				</p>
				<h2 class="uppercase_bold pam"><span class="displayName1">新闻动态 》 '. $getnewsdir[name].'</span></h2>
			</div>
			<span class="drop_shadow"></span>
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
                    <h1 style=" padding:10px 0;">'.$onenews[title].'</h1>
                   '.$onenews[content].'
				    
			</div>
            
            <div style="padding-bottom:10px; margin:0 auto; width:100px;">
            <a href="javascript:void(0)"  onClick=\'$("html,body").animate( {scrollTop:0},"slow",function() {return false;});\' id="homeicon09" ><span class="icons" style="height:25px;">返回顶部</span></a>
            </div>
            
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

