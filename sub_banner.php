
     
<script type="text/javascript" src="/inc/js/jquery.nivo.slider.js"></script>
<link rel="stylesheet" href="/inc/css/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript">
$(window).load(function() {
  $('#slider').nivoSlider({
  effect:'fade', // Specify sets like: 'fold,fade,sliceDown' or choose 'random' for mixed effects
  animSpeed:1500, // Slide transition speed
  pauseTime:5000, // How long each slide will show
  pauseOnHover:true,
  directionNav:true, // Next & Prev navigation
  directionNavHide:true, // Only show on hover
  controlNav:false // 1,2,3... navigation
  });
});
</script>
<!--nivo slider script ends--> 
<div class="collections_top_include product-action-links">
	<span class="drop_shadow"></span>
	
    
      <div id="slider" class="nivoSlider"> 
             <? $getpicnuminfo=getpagesetpicnuminfo($pageid,9,'opicname as pic,title');//版面管理 9张图片 即图片最大量 
			    for($i=0;$i<sizeof($getpicnuminfo);$i++){
            ?>
              <img src="/upload/layout/<?=$getpicnuminfo[$i][pic]?>" class="feature_image"  alt="image" title="#htmlcaption-<?=$i;?>">
             <? }?>
      </div>
    <? for($i=0;$i<sizeof($getpicnuminfo);$i++){?>
	<p class="nivo-html-caption" id="htmlcaption-<?=$i;?>"><?=$getpicnuminfo[$i][title]?></p>
    <? }?>
	
</div>