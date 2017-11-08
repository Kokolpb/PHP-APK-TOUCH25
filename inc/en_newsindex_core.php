<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


//取出所有fatherid为1的新闻目录
$getnewsdir2=getnewsdir2(8);//取出新闻二级目录

//取出所有英文新闻 fatherid=1
$strSQL = "select a.title,a.id_newsinfo as id,b.lang,a.id_newsdir 
           from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir 
		   where a.dele=1 and b.lang=0 and b.fatherid='8' 
		   order by a.ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();


?>