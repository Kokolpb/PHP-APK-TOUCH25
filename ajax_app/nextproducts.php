<?php
require "../inc/config.php";
require "../inc/function.class.php";


$arr="";

$page=$_REQUEST[pagenum];//get page
$start=$page*$setinfo[productnum];// 1*10  2*10 起始位置

if($_REQUEST[pdir1]==0 && $_REQUEST[pdir2]==0){
//如果为0查所有中文目录产品	
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,b.lang,b.fatherid,a.id_proddir from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 and b.lang=1 
		   order by a.ordernum desc limit $start,$setinfo[productnum]" ;
}

if($_REQUEST[pdir1]!=0 && $_REQUEST[pdir2]==0){
//一级目录存在 二级目录不存在 则查找一级目录下的所有产品
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,b.lang,b.fatherid,a.id_proddir from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 and b.lang=1 and b.fatherid=$_REQUEST[pdir1]
		   order by a.ordernum desc limit $start,$setinfo[productnum]" ;	
}



if($_REQUEST[pdir2]!=0){
//指定二级目录的所有产品
$strSQL = "select title,intro,id_prodinfo as pid,id_proddir from productinfo  where dele=1 and id_proddir=$_REQUEST[pdir2] order by ordernum desc limit $start,$setinfo[productnum]" ;	
}

$objDB->Execute($strSQL);
$arrproducts=$objDB->GetRows();

$arr[info]='';
for($i=0;$i<sizeof($arrproducts);$i++){
  $getpic=getproductpic($arrproducts[$i][pid]);//产品图片	
  
$arr[info].='<div class="productWrapper img_gradient  clearfix "><div class="thumb pam"><a class="return_true" href="javascript:void(0)" onclick=\'goproductview("productview.html","'.$arrproducts[$i][pid].'","'.$arrproducts[$i][id_proddir].'","");\' ><img src="'.$siteurl.'/upload/product/'.$getpic.'" alt=""></a></div><div class="thumbInfo mvs" style="220px"><a href="javascript:void(0)" onclick=\'goproductview("productview.html","'.$arrproducts[$i][pid].'","'.$arrproducts[$i][id_proddir].'","");\'  class="newsName deep_bold_red return_true mtm">'.$arrproducts[$i][title].'<p class="prod_model_num pvs">'.$arrproducts[$i][intro].'</p></a></div></div><hr class="wapOnly">';


  
}   

$arr[pagenum]=$page+1;

$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

