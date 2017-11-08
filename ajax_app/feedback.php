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
				<h2 class="uppercase_bold pam"> 留言反馈 </h2>
			</div>
			<span class="drop_shadow"></span>
            
			
			<div class="content-inner mam" style="padding-bottom:15px;">
				
                     <div id="feedback"><br>

          <div class="feedbackline">电话：&nbsp;&nbsp;&nbsp;&nbsp;<input id="tel" type="text"  style="width:40%"></div>
          <div class="feedbackline">内容：&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="msgcontent"></textarea></div>
          <div class="feedbackline">姓名：&nbsp;&nbsp;&nbsp;&nbsp;<input id="name" type="text"  style="width:50%"></div>
          <div class="feedbackline">邮箱：&nbsp;&nbsp;&nbsp;&nbsp;<input id="email" type="text" style="width:40%"></div>

        </div>
              <style type="text/css">
      #feedback textarea{ width:70%; height:120px;}
	  .feedbackline{ padding:5px;}
      </style>
        
            
				
			</div>
            
            <div style="padding-bottom:10px; margin:0 auto; width:100px;">
            <input name="111" value="发送留言" type="button" onClick="sendmsg()">
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

