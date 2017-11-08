<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$pid=$getvars[1];//获取伪静态传递参数    产品ID
$pdir2=$getvars[2];//获取伪静态传递参数  产品相关目录ID

//根据2级目录查找上级目录

$strSQL = "select fatherid from productdir where dele=1 and id_proddir=$pdir2" ;
$objDB->Execute($strSQL);
$fatherid=$objDB->fields();

$pdir1=$fatherid[fatherid];//父目录ID


//产品内容
$strSQL = "select title,content from productinfo where id_prodinfo='".$pid."'  " ;
$objDB->Execute($strSQL);
$oneproduct=$objDB->fields();


?>