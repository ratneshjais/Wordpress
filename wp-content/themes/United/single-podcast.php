<?php get_header('rest') ?>



<section class="communication podcast">
<!--img src="img/bgp-podcast-img.png" alt="">

    <p class="by-jenni">By Jennifer Da-Hougatz</p>
    <p class="podcast-expln">About the podcast</p>
    <p class="podcast-summary md-screen">Losing three days of my life and the lessons I learned from not remembering them. A hospital visit, meeting an angel, vulnerability, and asking for help. </p>
    <p style="margin-top: 40px !important;" class="podcast-expln">Listen to other Podcasts</p-->


    <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                  <?php
                    $post_id=get_the_ID();

                    $custom_title=get_post_meta($post_id,'custom_post_title',true);
                    if(empty($custom_title)){
                      $custom_title=get_the_title();
                    }
                  ?>
                   <h5>
                    <?php 
                    $terms = get_the_terms( $post->ID , 'podcast_cat' ); 
              //    print_r($terms);

                   echo $terms[0]->name; 
                   ?>
                     
                   </h5>
                    <div class="border border-cast">
                    </div>
                    <p class="by-date"><?php echo get_post_meta(get_the_ID(),'pubDate',true); ?> / <span class="time"><?php $length = get_post_meta(get_the_ID(),'length',true); //echo $length.'----';
                    echo $minutes = ($length % 60); //echo date('i',strtotime($length)); ?> min</span></p>
                    



                    <h5 class="pod-inner-title"><?=$custom_title?></h5>
                    <button onclick="togglePlay()" type="button" id="listen-pod" class="btn btn-default btn-cust podcast-btn" style="margin: 27px 0 20px 0;"><span>Listen Podcast</span>&nbsp;
                    <!-- <svg class="icon icon-triangle">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://localhost/united-new/wp-content/themes/United/img/triangle.svg#icon-triangle"></use>
                    </svg> -->
                    <svg class="icon icon-triangle">
                   <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/triangle.svg#icon-triangle"></use>
               </svg>
                  </button></br>
                    <div class="podcast-sub">
                      <p class="by-jenni podcast-btn by-sub">Subscribe to Podcast</p>
                      <div class="icons-container podcast-share">
                        <a href="https://itunes.apple.com/us/podcast/big-girl-panties/id986646191?mt=2">
                            <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/apple-logo.svg" alt="" data-toggle="tooltip" title="apple" ></a>
                        <a href="#">
                             <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/google-play.svg" alt="" style="margin-top: 3px" data-toggle="tooltip" title="google-play"></a>
                        <a href="#">
                            <img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/rss.svg" alt="" style="margin-top: 3px" data-toggle="tooltip" title="rss"></a>
                      </div>
                    </div>
                    <div class="podcast-border">
                      <div class="verticle-border">
                      </div>
                    </div>

                  <?php the_post_thumbnail(array(236,304), ['style' => 'margin:auto', 'padding-bottom:20px', 'class' => 'img-responsive prodcast-img', 'title' => get_the_title()]); ?>
                  <p style="padding-top:20px;" class="by-jenni">By Jennifer Da-Hougatz</p>
                  <p class="podcast-expln">About the podcast</p>
                  <div class="md-screen">
	                  <p class="podcast-summary md-screen"><?php the_content(); ?></p>
                    <?php if(get_post_meta(get_the_ID(),'mp3_url',true)){ ?>
                 <div class="">   
                <div id="dialog" title="Dialog Title">
                  <p class=""><img class="android-icons" src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg" alt=""></p>
                  <span class="title-name" ><?php echo $custom_title; ?></span>
                  <div class="audio green-audio-player">
                      <div class="loading">
                        <div class="spinner"></div>
                      </div>
                      <div class="play-pause-btn">  
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                          <path fill="#ffffff" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon" id="playPause"/>
                        </svg>
                      </div>
                      <div class="controls">
                        <span class="current-time">0:00</span>
                        <div class="slider" data-direction="horizontal">
                          <div class="progress">
                            <div class="pin" id="progress-pin" data-method="rewind"></div>
                          </div>
                        </div>
                        <span class="total-time">0:00</span>
                      </div>
                      <div class="volume">
                        <div class="volume-btn">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#ffffff" fill-rule="evenodd" d="M14.667 0v2.747c3.853 1.146 6.666 4.72 6.666 8.946 0 4.227-2.813 7.787-6.666 8.934v2.76C20 22.173 24 17.4 24 11.693 24 5.987 20 1.213 14.667 0zM18 11.693c0-2.36-1.333-4.386-3.333-5.373v10.707c2-.947 3.333-2.987 3.333-5.334zm-18-4v8h5.333L12 22.36V1.027L5.333 7.693H0z" id="speaker"/>
                          </svg>
                        </div>
                        <div class="volume-controls hidden">
                          <div class="slider" data-direction="vertical">
                            <div class="progress">
                              <div class="pin" id="volume-pin" data-method="changeVolume"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <audio >
                        <source src="<?php echo get_post_meta(get_the_ID(),'mp3_url',true); ?>" type="audio/mpeg">
                      </audio>


                      <ul class="pull-right header-icons player-social player-social1">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=example.org" class="facebook-share-button"  target="_blank" data-toggle="tooltip" title="facebook"><img src="http://localhost/united/wp-content/themes/United/img/facebook.svg" alt=""></a></li>
              <li><a href="https://twitter.com/intent/tweet?text=Hello%20world"  class="twitter-share-button" target="_blank"><img src="http://localhost/united/wp-content/themes/United/img/twitter.svg" alt="" data-toggle="tooltip" title="twitter"> </a></li>
              <li><a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com" target="_blank" data-toggle="tooltip" title="google+" ><img src="http://localhost/united/wp-content/themes/United/img/google-plus.svg" alt=""></a></li>
            </ul>
                    </div>


                  
                    <!--audio controls="controls" style="width: 100%; max-width: 500px;">
                        <source src="https://feed.pippa.io/public/streams/59529ebd0b8a073e5d24fab4/episodes/59529edc0b8a073e5d24fac4.mp3" type="audio/mpeg">
                    </audio-->
                  </div>
                </div>
                </div>
                    <?php }


                    //the_excerpt(); ?>

                    <p style="margin-top: 50px !important;margin-bottom: 35px !important;" class="podcast-expln">Listen to other Podcasts</p>
              <?php endwhile; ?>
        <?php endif; ?>
<?php echo do_shortcode('[latest_podcast]'); ?>
<?php //get_template_part( 'content', 'social' ); ?>




    </section>
 <script  src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>

 <script type="text/javascript">
  setTimeout(function(){
$('span.time').html($('span.total-time').html());

  },1000);
  
  // $('span.total-time').html()
 </script>

<?php get_footer(); ?>
