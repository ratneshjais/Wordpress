<?php get_header('rest') ?>

    <section class="communication sumit">
      <h5>The Big Girl Panties Podcast</h5>
      <div class="border border-cast">
      </div>
    <div class="podcast-sub">
        <button type="button" class="btn btn-default btn-cust podcast-btn"><span>Subscribe to Podcast</span> <svg class="icon icon-triangle">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/triangle.svg#icon-triangle"></use>
    </svg></button>
  <div class="icons-container">
  <a href="https://itunes.apple.com/us/podcast/big-girl-panties/id986646191?mt=2" target='_blank'><img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/apple-logo.svg" alt="">
    </a>
    <a href="#" target='_blank'>
    <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/google-play.svg" alt=""></a>
    <a href="#" target='_blank'>
    <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/rss.svg" alt="">
    </a>
    </div>
    </div>
        <p class="by-jenni">By Jennifer Da-Hougatz</p>
        <section class="cont row">
          <?php $args = array(
 'post_type'        => 'podcast',
 'posts_per_page' => -1,
); 
$query = new WP_Query( $args );
if ( $query->have_posts() ) : ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  
                  <div class="img-cont col-md-4 col-sm-4 col-xs-12">
                      <div class="over-lay pos-r">
                       

          <?php the_post_thumbnail(array(236,304), ['class' => 'img-responsive prodcast-img', 'title' => get_the_title()]); ?>
                          <div class="caption">
                              <img src="<?php echo get_template_directory_uri(); ?>/img/Group.png" alt="">
                              <div class="date"><?php the_time('F j, Y'); ?></div>
                              <div class="content"><?=the_title()?></div>
                          </div>
                          <div class="overlay">
              <a class="podcast-link" href="<?=get_the_permalink()?>"></a>
                            <div class="hover-text">
                                <div class="hover-title"><a href="<?=get_the_permalink()?>"><?=the_title()?></a></div>
                                <div class="hover-content"><?php //the_excerpt() ?>
                                </div>
                                <a href="<?=get_the_permalink()?>" type="button" class="btn btn-default hover-btn"><span>LISTEN NOW </span><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/img/Triangle.png" alt=""></a>
                            </div>
              
                          </div>
                      </div>
                  </div>


              <?php endwhile; ?>
          <?php endif; ?>
</section>
      <div class="border border-cast">
      </div>
    <div class="podcast-sub">
        <button type="button" class="btn btn-default btn-cust podcast-btn">Subscribe to Podcast </button>
    <div class="icons-container">
    <a href="https://itunes.apple.com/us/podcast/big-girl-panties/id986646191?mt=2" target='_blank'><img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/apple-logo.svg" alt="">
    </a>
    <a href="#" target='_blank'>
    <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/google-play.svg" alt=""></a>
    <a href="#" target='_blank'>
    <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/rss.svg" alt="">
    </a>
    </div>
    </div>
       
      </section>
      <section class="our-host md-screen">
       <p class="title"> OUR HOST </p>
       <div class="jenni-intro container-fluid">
     <img src="<?php echo get_template_directory_uri(); ?>/img/jennifer-2.png" alt="">
       
        <div class="host-name">Jennifer Da-Hougatz</div>
        <p>As a successful serial entrepreneur, business and mindset coach, I spent years learning from my experiences to get where I am. From broke single mom to thriving owner of 2 businesses, I will tell you...luck has nothing to do with it. So put on your big girl panties and
listen as I share a raw and intimate look into the rollercoaster of joys and tribulations in my life and the lessons I've learned from the
ride. Everyone has a story and here's mine. Big Girl Panties is produced at The Hangar Studios in New York City.</p>

       </div>
      </section>

<?php $feed_url = "https://feed.pippa.io/public/shows/59529ebd0b8a073e5d24fab4";
$i = 0;
if ($i == 0) {
 getFeed($feed_url);
$i = 1;
} get_footer(); ?>