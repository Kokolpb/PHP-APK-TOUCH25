<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";




$pageid=$_REQUEST[pageid];//获取传递参数
if(trim($pageid)==''){$pageid=1;}
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description'); 





//bannerpic
$getpicnuminfo=getpagesetpicnuminfo($pageid,9,'opicname as pic,title');//版面管理 9张图片 即图片最大量 
for($i=0;$i<sizeof($getpicnuminfo);$i++){
  $bannerpic.='<img src="'.$siteurl.'/upload/layout/'.$getpicnuminfo[$i][pic].'" class="feature_image"  alt="image" title="#htmlcaption-'.$i.'">';
  $bannertxt.='<p class="nivo-html-caption" id="htmlcaption-'.$i.'">'.$getpicnuminfo[$i][title].'</p>';
   }



$bannerstr='

<div class="collections_top_include product-action-links">
	<span class="drop_shadow"></span>
	
    
      <div id="slider" class="nivoSlider"> 
       '.$bannerpic.'
       </div>
    	'.$bannertxt.'
    	
</div>  

';


if($pageid==6){
	$mapcode=$setinfo[mapcode];//如果PAGEID=6 联系我们输出地图
	$bannerstr='';//联系我们页面 不显示BANNER 置空
	}
	else{
		$mapcode='';
	}

////////////////////////////////////////////////////////////////////////////////////////////////////

$arr[info].='

    <style type="text/css">
	div.header h1 a{background-image:url(\''.$siteurl.'/upload/layout/'.$logopic.'\');}/*LOGO*/
    </style>   

<div class="page">
	

'.$header.'
   

<div id="content">
			<div class="head_panel smaller clearfix">
				<p class="breadcrumbs phm">
					<a class="home-link" href="index.html">首页</a>
				</p>
				<h2 class="uppercase_bold pam">'.$str[title].'</h2>
			</div>
			<span class="drop_shadow"></span>
            

'.$bannerstr.'
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
				
            '.$mapcode.$str[content].'

				
			</div>
            
            <div style="padding-bottom:10px; margin:0 auto; width:100px;">
            <a href="javascript:void(0)"  onClick=\'$("html,body").animate( {scrollTop:0},"slow",function() {return false;});\' id="homeicon09" ><span class="icons" style="height:25px;">返回顶部</span></a>
            </div>
            
		</div>
	

'.$footer.'


</div>






';




$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

