jQuery(function($){
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts
 
	jQuery(window).scroll(function(){
		return ;

		
		
		var data = {
			'action': 'loadmore',
			'query': myc_loadmore_params.posts,
			'page' : myc_loadmore_params.current_page
		};
		//alert(jQuery(document).scrollTop()+" - "+jQuery(document).height()+" - "+bottomOffset);
		
		if( jQuery(document).scrollTop() > ( jQuery(document).height() - bottomOffset ) && canBeLoaded == true ){
			console.log('Scroll value-'+jQuery(document).scrollTop());
			console.log('Document height-'+jQuery(document).height());
			console.log('Offset-'+bottomOffset);
			$.ajax({
				url : myc_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
				},
				success:function(data){
					if( data ) {
						$('.stories').append( data ); // where to insert posts
						canBeLoaded = true; // the ajax is completed, now we can run it again
						myc_loadmore_params.current_page++;
					}
				}
			});
		}
	});
});