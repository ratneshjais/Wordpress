
jQuery(document).ready(function(){
	jQuery('body').on('click','.action',function(){
		var post_id= jQuery(this).parents('.story').data('post-id');
		if($(this).hasClass('NoModal')){
			return false;
		}
	if($(this).hasClass('videoModal')){

			
				jQuery('#preloader').show();

				jQuery.ajax({
					url:ajax_params.ajax_url,
					type:"POST",
					dataType:"json",
					data:{
						'action':"get_post_video",
						'post_id':post_id
					},

					success:function(data){
					$('body').find('img.loders').remove()


					
					jQuery('#videoModal .story-video').html('<iframe width="100%" height="470" src="'+data.video_url+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
					//console.log('ssdds');
						// jQuery('body #videoModal .story-video ').append('src',data.video_url);
						jQuery('body #videoModal').modal('show');

						$('#preloader').hide();
						jQuery('body').on('click','#videoModal',function(){
						
					//console.log('ssdds');
					
					});

					}



				});

	}else{
					
					
					jQuery.ajax({
						url:ajax_params.ajax_url,
						type:"POST",
						dataType:"json",
						data:{
							'action':"get_post_content",
							'post_id':post_id
						},



						success:function(data){
							
							jQuery('body #textModal .story-content p.excerpt').html(data.excerpt);
							jQuery('body #textModal .story-content p.content').html(data.content);
							jQuery('body #textModal .story-content h3').html(data.title);
							if(data.author_name){
								jQuery('body #textModal .story-content h4').html('Story of '+data.author_name);
							}else{
								jQuery('body #textModal .story-content h4').html('');
							}
							if(data.video_url){
											jQuery('body #video-iframe').remove();
										var iframe = '<iframe id="video-iframe" width="100%" height="150" src="'+data.video_url+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>';
										jQuery('body .modal-image').append(iframe);
										jQuery('body #textModal .story-image').hide();
							}else{

							jQuery('body #textModal .story-image').attr('src',data.image_url);
							}
							jQuery('body #textModal').modal('show');
							$('#preloader').hide();
						}


					});
		}
		
	});
	/*jQuery('body').on('click','.col-md-8',function(){
		var post_id=jQuery(this).data('post-id');
		jQuery('#preloader').show();

		jQuery.ajax({
			url:ajax_params.ajax_url,
			type:"POST",
			dataType:"json",
			data:{
				'action':"get_post_video",
				'post_id':post_id
			},

			success:function(data){
			$('body').find('img.loders').remove()


			
			jQuery('#videoModal .story-video').html('<iframe width="100%" height="470" src="'+data.video_url+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
			//console.log('ssdds');
				// jQuery('body #videoModal .story-video ').append('src',data.video_url);
				jQuery('body #videoModal').modal('show');

				$('#preloader').hide();
				jQuery('body').on('click','#videoModal',function(){
				
			//console.log('ssdds');
			
			});

			}



		});
	});*/

	jQuery(".stories .pos-r").hover(
	  function() { $(this).children(".primary-bg").show(); },
	  function() { $(this).children(".primary-bg").hide(); },
	  function() { $(this).children('.story-caps.caps-bg').addClass("hover-bottom"); }
	  
	);
    jQuery("#listen-pod, #dialog img").click(function(){
    	
    	jQuery("#dialog").toggle();
        jQuery('body').find('.play-pause-btn').trigger('click');
        

    });
    jQuery('#listen-pod, #dialog img').click(function(){

    	 player.pause();

    })
});