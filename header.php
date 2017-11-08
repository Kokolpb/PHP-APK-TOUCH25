<div class="header black_gradient"><!-- start header -->
	
	<h1 class="pam"><a href="/" class="ir">LOGO</a></h1>
	<a href="/search.html" class="search_toggle icons"><span class="arrows r-white prm">搜索产品</span></a>
	
	<div class="search_wrap phm">
		<form id="product-search" action="/product/productsearch.php" method="post" accept-charset="utf-8">
			<label for="product-search-input" data-role="none">产品名称</label>
			<input type="hidden" name="from" value="home" data-role="none" />						
			<input type="text" name="search_key" id="product-search-input" autocapitalize="off" autocorrect="off" class="default" data-role="none" />
			<button type="submit" data-role="none" class="bevel_button red">Search</button>
			
		</form>
	</div>
	
</div><!-- end header -->

<? if(getcurrentfilename()=='index'){//只在首页出现?>

<div class="hero_holder">
		
   <div class="scrollable">
    <script src="/inc/js/jquery.tools.min.js"></script> 
     <ul class="items">
           <?
			   $getpicnuminfo=getlayoutpicnuminfo(2,9,'opicname as pic');//首页LAYHOUT ID=2 9张图片 即图片最大量
               for($i=0;$i<sizeof($getpicnuminfo);$i++){
            ?>
       <li class="item<?=$i?>"><img src="/upload/layout/<?=$getpicnuminfo[$i][pic]?>" alt="" border="0" /></li>
          <? }?>  
    </ul>
   </div>
   
</div>
<script> 
$(document).ready(function() {
  $(".scrollable").scrollable({circular: true, mousewheel: true}).navigator().autoscroll({
    interval: <?=$setinfo[bannertime];?>    
  }); 
});
</script> 	
<? }?>