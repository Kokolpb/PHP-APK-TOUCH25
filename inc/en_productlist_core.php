<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

$pdir1=$getvars[1];//获取伪静态传递参数
$pdir2=$getvars[2];//获取伪静态传递参数

if($pdir2=='.html'){//如果产品2级目录未得到参数则 则查找一级目录下的所有产品
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,a.id_proddir,b.lang from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 and b.lang=0 and b.fatherid=$pdir1 
		   order by a.ordernum desc limit 0,$setinfo[productnum]" ;
$objDB->Execute($strSQL);
$arrprod=$objDB->GetRows();

$navipdir=$pdir1;//如果2级目录不存在 则导航为1级目录
$pdir2=0;

}else{
//根据2级目录搜索产品	
$strSQL = "select  title,intro,id_prodinfo as pid,id_proddir from productinfo where id_proddir=$pdir2 and dele='1' order by ordernum desc  limit 0,$setinfo[productnum]" ;
$objDB->Execute($strSQL);
$arrprod=$objDB->GetRows();	

$navipdir=$pdir2;//如果2级目录存在 则导航为当前2级目录
	
}



?>