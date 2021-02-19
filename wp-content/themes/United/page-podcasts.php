<?php get_header('rest') ?>

<section class="communication">
	<?php
									$post_id=get_the_ID();

									$custom_title=get_post_meta($post_id,'custom_post_title',true);
									if(empty($custom_title)){
										$custom_title=get_the_title();
									}
								?>
	<h5><?=$custom_title?></h5>
      <div class="border border-cast">
      </div>
			<div class="podcast-sub">
		         <button type="button" class="btn btn-default btn-cust podcast-btn"><span>Subscribe</span>&nbsp; <svg class="icon icon-triangle">
		         <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/triangle.svg#icon-triangle"></use>
		     </svg></button>
		 	<div class="icons-container podcast-links">
		 	<a href="https://itunes.apple.com/us/podcast/big-girl-panties/id986646191?mt=2" target='_blank'><img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/apple-logo.svg" alt="" data-toggle="tooltip" title="apple" >
		 		</a>
		 		<a href="#" target='_blank'>
		 		<img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/google-play.svg" alt="" style="margin-bottom: -7px" data-toggle="tooltip" title="google-play"></a>
		 		<a href="#" target='_blank'>
		 		<img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/rss.svg" alt="" style="margin-bottom: -8px" data-toggle="tooltip" title="rss">
		 		</a>
		 		</div>
		 		</div>
		         <p class="by-jenni">By Jennifer Ho</p>

		<?php
$args = array(
 'post_type'        => 'podcast',
 'posts_per_page' => -1
);
$query = new WP_Query( $args );
?>
    <section class="cont row">
<?php if ( $query->have_posts() ) : ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <div class="img-cont col-md-4 col-sm-4 col-xs-12">
         <a href="<?=get_the_permalink()?>">
        <div class="over-lay pos-r">
          <img src="<?php echo get_stylesheet_directory_uri();?>/img/podcast.png" class="img-responsive prodcast-img" alt="Cinque Terre" width="304" height="236">
          <div class="caption">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Group.png" alt="">
            <div class="date">
              <?php the_time('F j, Y'); ?>
            </div>
            <div class="content">
              <?=the_title()?>
            </div>
          </div>
          <div class="overlay">
            <a class="podcast-link" href="<?=get_the_permalink()?>">
            <div class="hover-text">
              <a href="<?=get_the_permalink()?>">
              <div class="hover-title"><?=the_title()?></a></div>
              <div class="hover-content">
								<?= substr(strip_tags(get_the_content()), 0, 100) . '...' ?>
								<?php //the_excerpt() ?>
              </div>
              <button type="button" class="btn btn-default hover-btn">
                <a href="<?=get_the_permalink()?>">
                <span>LISTEN NOW </span></a>
                <img class="triangle" src="<?php echo get_template_directory_uri(); ?>/img/Triangle.png" alt=""></button>
              </a>
            </div>
          </a>
          </div>
        </div>
      </a>
      </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </section>

 <div class="border border-cast">
      </div>
			<div class="podcast-sub">
        <button type="button" class="btn btn-default btn-cust podcast-btn"><span>Subscribe</span>&nbsp;
					<svg class="icon icon-triangle">
         <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/triangle.svg#icon-triangle"></use>
     </svg>
				</button>
		<div class="icons-container podcast-links">
		  <a href="https://itunes.apple.com/us/podcast/big-girl-panties/id986646191?mt=2" target='_blank'><img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/apple-logo.svg" alt="" data-toggle="tooltip" title="apple" >
        </a>
        <a href="#" target='_blank'>
        <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/google-play.svg" alt="" style="margin-bottom: -7px" data-toggle="tooltip" title="google-play"></a>
        <a href="#" target='_blank'>
        <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/rss.svg" alt="" style="margin-bottom: -10px" data-toggle="tooltip" title="rss">
        </a>
		</div>
		</div>
      </section>
      <section class="our-host md-screen">
       <p class="title"> OUR HOST </p>
       <div class="jenni-intro container-fluid">
        <img src="<?php echo get_template_directory_uri(); ?>/img/jennifer-2.png" alt="">
        <span>Jennifer Ho</span>
        <p>As a successful serial entrepreneur, business and mindset coach, I spent years learning from my experiences to get where I am. From broke single mom to thriving owner of 2 businesses, I will tell you...luck has nothing to do with it. So put on your big girl panties and
listen as I share a raw and intimate look into the rollercoaster of joys and tribulations in my life and the lessons I've learned from the
ride. Everyone has a story and here's mine. Big Girl Panties is produced at The Hangar Studios in New York City.</p>

       </div>
      </section>

    <script src="<?php echo get_template_directory_uri(); ?>/node_modules/jquery/dist/jquery.min.js" charset="utf-8"></script>




       <!--  <span>YOU CAN FOLLOW US FOR UPDATES</span>
        <div class="social-icons">
          <a href="http://www.instagram.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/instagram-logo.svg" alt=""></a>
          <a href="http://www.facebook.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/facebook-logo.svg" alt=""></a>
          <a href="http://www.twitter.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/twitter-logo.svg" alt=""></a>
          <a href="http://www.linkedin.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin-logo.svg" alt=""></a>
        </div>
 -->


    </section>


<?php get_footer(); ?>
