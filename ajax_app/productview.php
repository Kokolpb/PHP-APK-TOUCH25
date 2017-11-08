<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";




$pid=$_REQUEST[pid];//获取伪静态传递参数    产品ID
$pdir2=$_REQUEST[pdir2];//获取伪静态传递参数  产品相关目录ID

$pageid=19;//版面管理新闻默认PAGEID=19
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题 等


//产品内容
$strSQL = "select title,intro,content from productinfo where id_prodinfo='".$pid."'  " ;
$objDB->Execute($strSQL);
$oneproduct=$objDB->fields();

//////////////////////////////////////////////
$getdir=getpdir($pdir2,'name');//根据2级目录获取二级目录名


///////////////////////////////////////////////////




$arr[info].='
<div class="page">
	
'.$header.'

   

<div id="content">
			<div class="head_panel smaller clearfix">
				<p class="breadcrumbs phm">
					<a class="home-link" href="index.html">首页</a>
				</p>
			<h2 class="uppercase_bold pam"><span class="displayName1">产品中心 》 '.$getdir[name].' </span></h2>
			</div>
			<span class="drop_shadow"></span>
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
                    <h1 style=" padding:10px 0;"> '.$oneproduct[title].' </h1>
                     '.$oneproduct[content].'
				
			</div>
            
            <div style="padding-bottom:10px; margin:0 auto; width:100px;">
            <a href="javascript:void(0)"  onClick=\'$("html,body").animate( {scrollTop:0},"slow",function() {return false;});\' id="homeicon09" ><span class="icons" style="height:25px;">返回顶部</span></a>
            </div>
            
		</div>
	
'.$footer.'


</div>


    <style type="text/css">
	div.header h1 a{background-image:url(\''.$siteurl.'/upload/layout/'.$logopic.'\');}/*LOGO*/
    </style>  


';




$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

