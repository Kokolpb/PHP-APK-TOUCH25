<?php
require "../inc/config.php";
require "../inc/function.class.php";



$getpicnuminfo=getlayoutpicnuminfo(9,9,'opicname as pic');//layoutid=9 9张图片 即图片最大量

$str="";
for($i=0;$i<sizeof($getpicnuminfo);$i++){
	 $str.='<li><img src="'.$siteurl.'/upload/layout/'.$getpicnuminfo[$i][pic].'" /></li>'; 
 }




$arr[info].='

        <div class="homeslider">
          <ul class="slides">
           
		   '.$str.'
             
          </ul>
        </div>

      <div id="welcomebtn" ><a onclick="javascript:getindex();">启动</a></div>

';




$myjson= json_encode($arr);
echo $_GET['jsoncallback'].'('.$myjson.')';

?>

