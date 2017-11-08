<?php
require "../inc/config.php";
require "../inc/function.class.php";

$arr="";

$page=$_REQUEST[pagenum];//get page
$start=$page*$setinfo[newsnum];// 1*10  2*10

if($_REQUEST[ndir]==0){
//如果为0查所有中文目录新闻 fatherid=1	
$strSQL = "select a.title,a.intro,a.id_newsinfo as id,b.lang,a.id_newsdir,a.intro
           from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir 
		   where a.dele=1 and b.lang=1 and b.fatherid='1'  order by a.ordernum desc limit $start,$setinfo[newsnum]" ;
		   
}else{
//指定目录的新闻
$strSQL = "select title,intro,id_newsinfo as id,id_newsdir from newsinfo  where dele=1 and id_newsdir=$_REQUEST[ndir] order by ordernum desc limit $start,$setinfo[newsnum]" ;
}

$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();

$arr[info]='';
for($i=0;$i<sizeof($arrnews);$i++){

$arr[info].='<div class="productWrapper img_gradient  clearfix " style=" padding-left:5px;"><div class="thumbInfo mvs" style="width:100%;"><a href="/news/newsview.php/'.$arrnews[$i][id].'/'.$arrnews[$i][id_newsdir].'/.html" class="newsName deep_bold_red return_true mtm">'.$arrnews[$i][title].'<p class="mbm">'.$arrnews[$i][intro].'</p></a></div></div>';

}   

$arr[pagenum]=$page+1;

$myjson= json_encode($arr);
echo $myjson;

?>
