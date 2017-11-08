<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

//取出所有fatherid为8的新闻目录 英文
$getnewsdir2=getnewsdir2(8);//取出新闻二级目录

$ndir=$getvars[1];//获取伪静态传递参数

//根据目录查找新闻
$strSQL = "select title,id_newsinfo as id from newsinfo  where dele=1 and id_newsdir=$ndir order by ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();



?>