<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$pageid=19;//版面管理新闻默认PAGEID=19
$str=getpagesetinfo($pageid,'title,content,intro,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题 等



if(isset($_POST[search_key]) && trim($_POST[search_key])!=''){$tag=$_POST[search_key];}

//搜索2级目录下所有产品
$strSQL = "select  a.title,a.intro,a.id_prodinfo as pid,b.lang,a.id_proddir from productinfo as a left join productdir as b on a.id_proddir=b.id_proddir where a.title like '%$tag%' and a.dele='1' and b.lang='1' order by a.ordernum desc" ;
$objDB->Execute($strSQL);
$arrprod=$objDB->GetRows();

?>