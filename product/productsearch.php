<?php
require "../inc/cn_productsearch_core.php";
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

<script>
function nextproducts() {
               $.post('/product/ajax_getproducts.php',{pagenum:$('#pagenum').text(),pdir2:$('#pdir2').text(),pdir1:$('#pdir1').text()},function(data){
                            var myjson = '';eval('myjson=' + data + ';');
							if(myjson.info!=''){
								 $("#type-productlist").append(myjson.info);
								 $("#pagenum").text(myjson.pagenum);
								 $('ul').listview('refresh'); 
								}else{
					              return false;
								}
							
							});
}
</script>
</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?> id="home">

<div class="page">
	
<? require "../header.php"; ?>   

<div id="content">
		<div class="head_panel smaller clearfix">
			<p class="breadcrumbs phm">
				<a class="home-link" href="/">Home</a>
			</p>
			<h2 class="uppercase_bold pam"><span class="displayName1">产品中心 》 搜索产品</span></h2>
			
			<div class="criteria_options pam">
				
				
				
				<div class="sort_by_select_menu">
										
				</div>
			</div>
		</div>
		<hr class="wapOnly">
       
	   <? require "../sub_banner.php"; ?>  

		
   <div class="content-module clearfix" id="type-productlist">

<? for($i=0;$i<sizeof($arrprod);$i++){?>
<div class="productWrapper img_gradient  clearfix ">
				<div class="thumb pam">
					<a class="return_true" href="/product/productview.php/<?=$arrprod[$i][pid]?>/<?=$arrprod[$i][id_proddir]?>/.html">
					<img src="/upload/product/<?=getproductpic($arrprod[$i][pid])?>" alt="">
					</a>
				</div>
			
	<div class="thumbInfo mvs" style="220px">
		<a href="/product/productview.php/<?=$arrprod[$i][pid]?>/<?=$arrprod[$i][id_proddir]?>/.html" class="newsName deep_bold_red return_true mtm"><?=$arrprod[$i][title]?>
		<p class="prod_model_num pvs"><?=$arrprod[$i][intro];?></p></a>
	</div>
</div>
<hr class="wapOnly">
<? }?>  

	</div>	
    


<? require "../footer.php"; ?>   


</div>
</body>
</html>