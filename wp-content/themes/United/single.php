<?php get_header('rest') ?>

<section class="communication">


		<?php if ( have_posts() ) : ?>
          	<?php while ( have_posts() ) : the_post(); ?>
                  <?php 
                  	$post_id=get_the_ID();
                  	
                  	$custom_title=get_post_meta($post_id,'custom_post_title',true);
                  	if(empty($custom_title)){
                  		$custom_title=get_the_title();
                  	}
                  ?>
                  	<h5><?=$custom_title?></h5>
     				<div class="border"></div>
                  	<?php the_content(); ?>
              <?php endwhile; ?>
      	<?php endif; ?>




        <span>YOU CAN FOLLOW US FOR UPDATES</span>
        <div class="social-icons">
         <a href="http://www.instagram.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/instagram-logo.svg" alt=""></a>
           <a href="http://www.facebook.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/facebook-logo.svg" alt=""></a>
           <a href="http://www.twitter.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/twitter-logo.svg" alt=""></a>
           <a href="http://www.linkedin.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin-logo.svg" alt=""></a>
        </div>

    </section>


<?php get_footer(); ?>