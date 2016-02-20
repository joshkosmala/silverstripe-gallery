(function($) {
    $(document).ready(function(){
		$("ul#Galleries li h3").click(function(){$("ul#Galleries #GalleryPreview").slideToggle()});    //"ul#Galleries li#CoverImage").hide()});
	//	$("ul#Galleries li#CoverImage").hover(function{$(this).toggle});
		
//		$("ul#Galleries li#CoverImage").hover(function{$(this).slideDown(500);$(this).slideUp(500)});
//		$("ul#Galleries li#CoverImage").hover(function{$(this).hide("slide", { direction: "down" }, 1000)});
	})
})(jQuery);