<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "common.php";


$pageid=19;//版面管理新闻默认PAGEID=19
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题 等

$pdir2=$_REQUEST[pdir2];//获取传递参数
if($pdir2==''){$pdir2='2';}
//根据2级目录搜索产品	
$strSQL = "select  title,intro,id_prodinfo as pid,id_proddir from productinfo where id_proddir=$pdir2 and dele='1' order by ordernum desc  limit 0,$setinfo[productnum]" ;
$objDB->Execute($strSQL);
$arrprod=$objDB->GetRows();	

///////////////////////////////////////////////////

//bannerpic
$getpicnuminfo=getpagesetpicnuminfo($pageid,9,'opicname as pic,title');//版面管理 9张图片 即图片最大量 
for($i=0;$i<sizeof($getpicnuminfo);$i++){
  $bannerpic.='<img src="'.$siteurl.'/upload/layout/'.$getpicnuminfo[$i][pic].'" class="feature_image"  alt="image" title="#htmlcaption-'.$i.'">';
  $bannertxt.='<p class="nivo-html-caption" id="htmlcaption-'.$i.'">'.$getpicnuminfo[$i][title].'</p>';
   }

///////////////////////////////////////////////////
//组装产品
$str='';
for($i=0;$i<sizeof($arrprod);$i++){
$str.='<div class="productWrapper img_gradient  clearfix ">
				<div class="thumb pam">
					<a class="return_true" href="javascript:void(0)" onclick=\'goproductview("productview.html","'.$arrprod[$i][pid].'","'.$arrprod[$i][id_proddir].'","");\'>
					<img src="'.$siteurl.'/upload/product/'.getproductpic($arrprod[$i][pid]).'" alt="">
					</a>
				</div>
			
	<div class="thumbInfo mvs" style="220px">
		<a href="javascript:void(0)" onclick=\'goproductview("productview.html","'.$arrprod[$i][pid].'","'.$arrprod[$i][id_proddir].'","");\' class="newsName deep_bold_red return_true mtm">'.$arrprod[$i][title].'
		<p class="prod_model_num pvs">'.$arrprod[$i][intro].'</p></a>
	</div>
</div>
<hr class="wapOnly">';
 } 


//////////////////////////////////////////////
$getdir=getpdir($pdir2,'name');//根据2级目录获取二级目录名





//////////////////////////////////////////



$arr[info].='

<div class="page">
	
'.$header.'

   

<div id="content">
		<div class="head_panel smaller clearfix">
			<p class="breadcrumbs phm">
				<a class="home-link" href="index.html">首页</a>
			</p>
			<h2 class="uppercase_bold pam"><span class="displayName1">产品中心 》 '.$getdir[name].' </span></h2>
			
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

		
   <div class="content-module clearfix" id="type-productlist">

    '.$str.'

	</div>	
    
  <div class="productWrapper img_gradient  clearfix ">
	<div class="thumbInfo mvs"   style="width:100%; text-align:center">
		<a  href="javascript:void(0)"  onClick="app_nextproducts();" class="newsName">
		<p class="mbm">获取更多</p>
		</a>
	</div>
<div id="pagenum" style="display:none">1</div>
<div id="pdir2" style="display:none">2</div>   
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

