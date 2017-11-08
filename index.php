<?php
require "./inc/cn_index_core.php";
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


	<link rel="stylesheet" href="./inc/css/mobile.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="./inc/css/iphone4.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="./inc/css/banner.css" type="text/css" media="screen" charset="utf-8" />

    <script src="./inc/js/jquery.min.js"></script>
    <script type="text/javascript" src="./inc/js/global.js" ></script>

    
    <style type="text/css">
    .icons {background-image:url('/upload/layout/<?=getlayoutpic(6,0);?>');}/*更换首页菜单左侧图标*/
	div.header h1 a{background-image:url('/upload/layout/<?=getlayoutpic(1,0);?>');}/*LOGO*/
	
#menufixed{position:fixed;bottom:0px;width:100%;height:50px; background-color:#000;}
#menufixed ul{list-style:none; }
#menufixed li{float:left; text-align:center;width:20%;height:50px;line-height:15px;background-color:#AF1D35}
#menufixed li a{padding-top:3px; color:#fff; font-size:14px; font-weight:bold; text-decoration:none}
#menufixed .icon{ margin-top:5px;background:url(/upload/layout/<?=getlayoutpic(8,0);?>) no-repeat;text-align:center; width:100%;height:20px;}/*页脚菜单图标*/
#menufixed .tel{ background-position:center -80px;}
#menufixed .email{ background-position:center 0px;}
#menufixed .map{ background-position:center -105px;}
#menufixed .msg{ background-position:center -25px;}
#menufixed .share{ background-position:center -52px;}
	
	
    </style>    
    

<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>


</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?> id="home">

<div class="page">
	
  <? require "header.php"; ?>   

	<div id="content">

		<ul class="nav clearfix">
	<?
    $getallpagesetinfo=getallpagesetinfo(1,'2','title,id_pageset as id');//取所有版面1中文 （2只显示首页 1所有页）  0关闭 3只在内页
	for($i=0;$i<sizeof($getallpagesetinfo);$i++){
         //id为6文件名为CONTACT.PHP   ID=2案例展示 否则ABOUT.PHP
		$flienameurl='/about/aboutview.php/'.$getallpagesetinfo[$i][id].'/.html';//默认关于我们
		//公司简介
		if($getallpagesetinfo[$i][id]==20){
               $getinner=getallpagesetinfo(1,'3','title,id_pageset as id');//取版面中文所有内页
	?>  
           <li class="white_panel pam">
           <a href="#" id="homeicon0<?=$i;?>" class="arrows top_lvl"><span class="icons"><?=$getallpagesetinfo[$i][title]?></span></a>
				<ul class="browse_by" style="display: block; ">
					<li class="kitchen_list mbm">
						<ul>
                      <? for($j=0;$j<sizeof($getinner);$j++){
					   $flienameurl='/about/aboutview.php/'.$getinner[$j][id].'/.html';
					  ?>
							<li class="mvs"><a href="<?=$flienameurl;?>" class="red_lvl link_lvl pvm"><?=$getinner[$j][title]?></a></li>
                      <? }?>
						</ul>
					</li>
					
				</ul>
			</li>
            
            
     <? }elseif($getallpagesetinfo[$i][id]==19){//如果是产品取出产品二级目录
	       $getproductdir1=getproductdir1(1);//取1级目录
	?>   
    
    		<li class="white_panel pam">
				<a href="#" id="homeicon0<?=$i;?>" class="arrows top_lvl"><span class="icons"><?=$getallpagesetinfo[$i][title]?>(<?=getproductnum(1,0)?>)</span></a>
				<ul class="browse_by">
                 <?
                 for($j=0;$j<sizeof($getproductdir1);$j++){//重复当前一级目录
			        $getproductdir2=getproductdir2($getproductdir1[$j][id]);//根据ID取二级目录
				?>
					<li class="kitchen_list mbm">
						<a href="#" class="mid_lvl ptm"><?=$getproductdir1[$j][name];?>(<?=getpdir1num($getproductdir1[$j][id])?>)</a>

						<ul>
                           <? for($k=0;$k<sizeof($getproductdir2);$k++){
								 $flienameurl='/product/productlist.php/'.$getproductdir2[$k][id].'/.html';
							?>
							<li class="mvs"><a href="<?=$flienameurl;?>" class="red_lvl link_lvl pvm"><?=$getproductdir2[$k][name]?>(<?=getproductnum(1,$getproductdir2[$k][id]);//1为中文目录的指定ID的数量?>)</a></li>
                            <? }?>
						</ul>
                      
                        
					</li>
                     <? }?>
                    
				</ul>
               
			</li> 
            
            
     <? }elseif($getallpagesetinfo[$i][id]==2){//如果是新闻取出二级目录
	       $getnewsdir2=getnewsdir2(1);//取出新闻二级目录
	?>  
    
           <li class="white_panel pam">
				<a href="#" id="homeicon0<?=$i;?>" class="arrows top_lvl"><span class="icons"><?=$getallpagesetinfo[$i][title]?>(<?=getnewsnum(1,0)?>)</span></a>
				<ul class="browse_by" style="display: block; ">
					<li class="kitchen_list mbm">
						<ul>
<? for($j=0;$j<sizeof($getnewsdir2);$j++){
					        $flienameurl='/news/newslist.php/'.$getnewsdir2[$j][id].'/.html';
						 ?>
							<li class="mvs"><a href="<?=$flienameurl;?>" class="red_lvl link_lvl pvm"><?=$getnewsdir2[$j][name]?>(<?=getnewsnum(1,$getnewsdir2[$j][id])?>)</a></li>
                            <? }?>
						</ul>
					</li>
					
				</ul>
			</li>
       
               
         <? }else{?>    
         
			<li class="white_panel pam">
				<a href="<?=$flienameurl;?>" id="homeicon0<?=$i;?>" class="arrows return_true top_lvl"><span class="icons"><?=$getallpagesetinfo[$i][title]?></span></a>
			</li>
         <? }}?>	
		
		</ul>
	
	</div>
	

<? require "footer.php"; ?>   

<div style="height:40px;"></div>
</div>



<div id="menufixed">
<ul>
<li><a href="tel:<?=$setinfo[tel];?>"><div class="icon tel"></div>电话</a></li>
<li><a href="mailto:<?=$setinfo[email];?>"><div class="icon email"></div>邮箱</a></li>
<li><a href="/about/map.php"><div class="icon map"></div>地图</a></li>
<li><a href="/about/feedback.php"><div class="icon msg"></div>留言</a></li>
<li><a href="/about/share.php"><div class="icon share"></div>分享</a></li>
</ul>
</div>


</body>
</html>