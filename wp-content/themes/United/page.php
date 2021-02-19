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
								</br></br>
                  	<h5><?=$custom_title?></h5>
     				<div class="border border-contact"></div>
                  	<?php the_content(); ?>
              <?php endwhile; ?>
      	<?php endif; ?>

       <?php get_template_part('content','social'); ?>

    </section>


<?php get_footer(); ?>
