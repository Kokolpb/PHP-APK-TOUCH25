<?php
require "../inc/config.php";
require "../inc/function.class.php";

$footertxt=getlayoutinfo(3,'intro');//页脚文字
$footertxt=nl2br($footertxt[intro]);
$menubottomicon=getlayoutpic(8,0);//页脚菜单图标



$logo='
    <style type="text/css">
    .icons {background-image:url("'.$siteurl.'/upload/layout/'.getlayoutpic(6,0).'");}
	div.header h1 a{background-image:url("'.$siteurl.'/upload/layout/'.getlayoutpic(1,0).'");}
    </style> 
';



//bannerpic

$getpicnuminfo=getlayoutpicnuminfo(2,9,'opicname as pic');
$bannerpic='';
for($i=0;$i<sizeof($getpicnuminfo);$i++){
$bannerpic.='<li class="item'.$i.'"><img src="'.$siteurl.'/upload/layout/'.$getpicnuminfo[$i][pic].'" alt="" border="0" /></li>';
}


$banner='
<div class="hero_holder">
		
   <div class="scrollable">
    
     <ul class="items">
           '.$bannerpic.'
    </ul>
   </div>
   
</div>


';
// end bannerpic



///////////////////////////////////////content
$str='';
$str.='<div id="content">';

$str.='		<ul class="nav clearfix">';

    $getallpagesetinfo=getallpagesetinfo(1,'2','title,id_pageset as id');//取所有版面1中文 （2只显示首页 1所有页）  0关闭 3只在内页
	for($i=0;$i<sizeof($getallpagesetinfo);$i++){

		//公司简介
		if($getallpagesetinfo[$i][id]==20){
               $getinner=getallpagesetinfo(1,'3','title,id_pageset as id');//取版面中文所有内页

$str.='           <li class="white_panel pam">';
$str.='           <a href="#" id="homeicon0'.$i.'" class="arrows top_lvl"><span class="icons">'.$getallpagesetinfo[$i][title].'</span></a>';
$str.='           <ul class="browse_by" style="display: block; ">';
$str.=' 					<li class="kitchen_list mbm">';
$str.=' 						<ul>';
                for($j=0;$j<sizeof($getinner);$j++){
					 				
$str.='	<li class="mvs"><a href="javascript:void(0)" onclick="goaboutpage(\'aboutview.html\','.$getinner[$j][id].',\'\',\'\')" class="red_lvl link_lvl pvm">'.$getinner[$j][title].'</a></li>';
                      }
$str.='</ul>
				</li>
					
		</ul>
		</li>';
            
            
 }elseif($getallpagesetinfo[$i][id]==19){//如果是产品取出产品二级目录
	       $getproductdir1=getproductdir1(1);//取1级目录
 
    
$str.='	    		<li class="white_panel pam">';
$str.='				<a href="#" id="homeicon0<?=$i;?>" class="arrows top_lvl"><span class="icons">'.$getallpagesetinfo[$i][title].'('.getproductnum(1,0).')</span></a>
				<ul class="browse_by">';

                 for($j=0;$j<sizeof($getproductdir1);$j++){//重复当前一级目录
			        $getproductdir2=getproductdir2($getproductdir1[$j][id]);//根据ID取二级目录

$str.='						<li class="kitchen_list mbm">
						<a href="#" class="mid_lvl ptm">'.$getproductdir1[$j][name].'('.getpdir1num($getproductdir1[$j][id]).')</a>

						<ul>';
                        for($k=0;$k<sizeof($getproductdir2);$k++){
															
$str.='								<li class="mvs"><a href="javascript:void(0)" onclick="goproductlist(\'productlist.html\','.$getproductdir2[$k][id].',\'\',\'\')"  class="red_lvl link_lvl pvm">'.$getproductdir2[$k][name].'('.getproductnum(1,$getproductdir2[$k][id]).')</a></li>';
                            }
$str.='							</ul>
                      
                        
					</li>';
                      }
                    
$str.='					</ul>
               
			</li> ';
            
            
     }elseif($getallpagesetinfo[$i][id]==2){//如果是新闻取出二级目录
	       $getnewsdir2=getnewsdir2(1);//取出新闻二级目录
	 
    
 $str.='     <li class="white_panel pam">
				<a href="#" id="homeicon0'.$i.'" class="arrows top_lvl"><span class="icons">'.$getallpagesetinfo[$i][title].'('.getnewsnum(1,0).')</span></a>
				<ul class="browse_by" style="display: block; ">
					<li class="kitchen_list mbm">
						<ul>';
 for($j=0;$j<sizeof($getnewsdir2);$j++){
					       		
 $str.=' 	<li class="mvs"><a href="javascript:void(0)"  onclick="gonewslist(\'newslist.html\','.$getnewsdir2[$j][id].',\'\',\'\')" class="red_lvl link_lvl pvm">'.$getnewsdir2[$j][name].'('.getnewsnum(1,$getnewsdir2[$j][id]).')</a></li>';
                            }
 $str.=' 						</ul>
					</li>
					
				</ul>
			</li>';
       
               
        }else{ 
         
	 $str.='		<li class="white_panel pam">
				<a href="javascript:void(0)" onclick="goaboutpage(\'aboutview.html\','.$getallpagesetinfo[$i][id].',\'\',\'\')" id="homeicon0'.$i.'" class="arrows return_true top_lvl"><span class="icons">'.$getallpagesetinfo[$i][title].'</span></a>
			</li>';
          }}
		
$str.=	'	</ul>
	
	</div>';

////////////////////////////////////////////////////////////////////////

//页脚固定菜单
$menufixed='

<style>
#menufixed{position:fixed;bottom:0px;width:100%;height:50px; background-color:#000;}
#menufixed ul{list-style:none; }
#menufixed li{float:left; text-align:center;width:20%;height:50px;line-height:15px;background-color:#AF1D35}
#menufixed li a{padding-top:3px; color:#fff; font-size:14px; font-weight:bold; text-decoration:none}
#menufixed .icon{ margin-top:5px;background:url('.$siteurl.'/upload/layout/'.$menubottomicon.') no-repeat;text-align:center; width:100%;height:20px;}
#menufixed .tel{ background-position:center -80px;}
#menufixed .email{ background-position:center 0px;}
#menufixed .map{ background-position:center -105px;}
#menufixed .msg{ background-position:center -25px;}
#menufixed .share{ background-position:center -52px;}

</style>

<div id="menufixed">
<ul>
<li><a href="tel:'.$setinfo[tel].'"><div class="icon tel"></div>电话</a></li>
<li><a href="mailto:'.$setinfo[email].'"><div class="icon email"></div>邮箱</a></li>
<li><a href="map.html"><div class="icon map"></div>地图</a></li>
<li><a href="feedback.html"><div class="icon msg"></div>留言</a></li>
<li><a href="share.html"><div class="icon share"></div>分享</a></li>
</ul>
</div>



';


///////////////////////////////////////////////////////////



$arr[info].='<div class="page"><div class="header black_gradient"><!-- start header --><h1 class="pam"><a href="index.html" class="ir">LOGO</a></h1><a href="javascript:void(0)" class="search_toggle icons"><span class="arrows r-white prm">搜索产品</span></a><div class="search_wrap phm"><form id="product-search" action="#" method="post" accept-charset="utf-8"><label for="product-search-input" data-role="none">产品名称</label><input type="hidden" name="from" value="home" data-role="none" /><input type="text" name="search_key" id="product-search-input" autocapitalize="off" autocorrect="off" class="default" data-role="none" /><button type="button" data-role="none" class="bevel_button red"  onclick="gosearch(\'search.html\',\'\',\'\',\'\');">Search</button></form></div></div><!-- end header -->'.$banner.$str.'<!-- start footer <div data-role="footer"> --><div class="footer black_gradient"><div class="copyright pvm clearfix">'.$footertxt.'</div><div style="height:50px;"></div></div><!-- end footer-->    </div>'.$logo.$menufixed;




$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

