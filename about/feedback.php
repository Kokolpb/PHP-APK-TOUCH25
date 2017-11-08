<?php
require "../inc/cn_aboutview_core.php";
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
				<h2 class="uppercase_bold pam">留言反馈</h2>
			</div>
			<span class="drop_shadow"></span>
           
			
			<div class="content-inner mam" style="padding-bottom:15px; ">
				
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
	
    
        <script language="JavaScript">
function sendmsg() {
						if($.trim($("#tel").val())==''){alert('请输入您的电话号码');return false;}	
						if($.trim($("#msgcontent").val())==''){alert('请输入您的留言信息');return false;}	
						if($.trim($("#name").val())==''){alert('请输入您的姓名');return false;}
						
						$.post('/about/ajax_feedback.php',{tel:$("#tel").val(),content:$("#msgcontent").val(),name:$("#name").val(),email:$("#email").val()},function(data) {
                               var myjson = '';eval('myjson=' + data + ';');
                               alert(myjson.info);
							   window.location.href='/';
                         });

}
</script>   
    
    

<? require "../footer.php"; ?>   


</div>
</body>
</html>