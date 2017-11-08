<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


//取出中文所有产品
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,a.id_proddir,b.lang from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 and b.lang=0
		   order by a.ordernum desc limit 0,$setinfo[productnum]" ;
$objDB->Execute($strSQL);
$arrprod=$objDB->GetRows();

?>