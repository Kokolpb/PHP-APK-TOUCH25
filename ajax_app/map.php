<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";






$arr[info].='



<div class="page">
	
'.$header.'

   

<div id="content">
			<div class="head_panel smaller clearfix">
				<p class="breadcrumbs phm">
					<a class="home-link" href="/">首页</a>
				</p>
				<h2 class="uppercase_bold pam">地图</h2>
			</div>
			<span class="drop_shadow"></span>
            
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
                      '.$setinfo[mapcode].'
            
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

