
var delta = {

	
	labelToValue: function(elmID) {
		if($('#'+elmID).length){
			var targetElm = $('#'+elmID);
			var targetLabel = $('label[for="'+ elmID +'"]');
			
			targetLabel.hide();
			targetElm.val(targetLabel.text());
		}
	},
	
	searchBar: function() {
		$('div.search_wrap').hide();
		
		$('a.search_toggle').click(function(){
			
			if($(this).hasClass("open")){
				$(this).removeClass("open");
				$('div.search_wrap').slideUp('fast');
			}else{
				$(this).addClass("open");
				$('div.search_wrap').slideDown('fast');
			}
			
			$(this).children("span.arrows").toggleClass("r-white");
			$(this).children("span.arrows").toggleClass("d-red");
			
			return false;
			
		});
	},
	
	menuAccordion: function() {
		var $homePageNav = $('body#home ul.nav a');
		var $prodCollection = $('#prod_collections');
		var $nav = $('.nav');
		var $browseBy = $prodCollection.parent().find('.browse_by');
		var $kitchenCollection = $('#kitchen-collection');
		var $bathCollection = $('#bath-collection');

		

		$('a.top_lvl, a.mid_lvl').each(function() {
			$(this).addClass("r-black");
		});

		$('a.top_lvl').next("ul, div").each(function() {
			$(this).hide();
		});
			
		$('body#home ul.nav a').click(function(){
			
			if(($(this).hasClass("link_lvl"))||($(this).hasClass("return_true"))||($(this).hasClass("plain_text_link"))||($(this).attr("rel")=="external")){
				return true;
			}
			else if($(this).next().is(':hidden')) { //If immediate next container is closed...
				$(this).addClass('d-black');
				//$('ul.nav li a.top_lvl').removeClass('active').next().slideUp('fast');
				$(this).toggleClass('active').next().slideDown('fast');
				
				return false;
			}
			else{
				$(this).toggleClass('active').removeClass('d-black').next().slideToggle('fast');

				return false;
			}
			
		});
			
		$('ul.nav a').not("body#home ul.nav a").click(function(){

			if(($(this).hasClass("link_lvl"))||($(this).hasClass("return_true"))||($(this).hasClass("plain_text_link"))||($(this).attr("rel")=="external")){
				
				return true;
				
			}else{

				if($(this).hasClass("d-black")){
					$(this).removeClass("d-black");
					$(this).next('ul, div').slideUp('fast');
				}else{
					$(this).addClass("d-black");
					$(this).next('ul, div').slideDown('fast');
				}
				
				return false;
			}
			
		});

		if(window.location.search.indexOf('open=kitchen') >= 0){
			$prodCollection.toggleClass('active');
			$browseBy.show();
			$bathCollection.hide();

			$('body').animate({
				scrollTop: $kitchenCollection.offset().top - 20
			});

		}else if(window.location.search.indexOf('open=bath') >= 0){
			$prodCollection.toggleClass('active');
			$browseBy.show();
			$kitchenCollection.hide();
			
			$('body').animate({
				scrollTop: $bathCollection.offset().top - 20
			});
		}
	}
	
	
};

$(document).ready(function(){
	delta.labelToValue('product-search-input');
	delta.searchBar();
	delta.menuAccordion();

});