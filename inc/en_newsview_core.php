<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

$newsid=$getvars[1];//获取伪静态传递参数
$ndir=$getvars[2];//获取伪静态传递参数

//取出所有fatherid为8的新闻目录
$getnewsdir2=getnewsdir2(8);//取出新闻二级目录

//新闻内容
$strSQL = "select title,content from newsinfo where id_newsinfo='".$newsid."'  " ;
$objDB->Execute($strSQL);
$onenews=$objDB->fields();


?>