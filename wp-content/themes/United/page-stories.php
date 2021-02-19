<?php

/*
*   Template Name:Stories
*
*/

get_header('rest') ?>

<section class="communication">
  <h5><?php the_title(); ?></h5>
      <div class="border border-cast">
      </div>
</section>
<div class="item">
<?php
  wp_reset_query();
      $args=array('post_type'=>'story','post_status'=>'publish','posts_per_page'=>-1 );
      $wp_query = new WP_Query( $args );
     // echo "<pre>";
     // print_r($wp_query);
 ?>
  <section class="stories">


    <?php if ( $wp_query->have_posts() ) : ?>
      <?php $do_not_duplicate[] = $post->ID; ?>
      <?php $counter=1;$row=1; ?>

            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                  <?php
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $post_id=get_the_ID();
                   
                    $custom_title=get_post_meta($post_id,'custom_post_title',true);
                    if(empty($custom_title)){
                      $custom_title=get_the_title();
                    }
                    $author_name=get_post_meta($post_id,'author_name',true);

                    if($counter%2==1){
            ?>
                      <div class="row md-screen">
            <?php
                    }


                    if($row%2==1){ ?>
                          <?php if($counter%2 == 1){ ?>

                            <div class="col-md-8 col-sm-8 col-xs-6 story <?php  if(has_post_video( $post_id )){ echo "vedioM"; }else{ echo ""; } ?>" data-post-id="<?=$post_id?>">
                              <div class="pos-r">
                                <!-- <img class="img-responsive" src="img/story-1.png" alt=""> -->
                              <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                                <div class="story-1"  data-post-id="<?=$post_id?>"  style="<?php if($featured_img_url==''){ ?> background:#cccccc;text-align: center; <? }else{  ?>background:url(<?=esc_url($featured_img_url)?>) center bottom/cover no-repeat; <?php } ?> ">
                                  <?php if($featured_img_url){}else{ ?>
                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">United</p>
                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">Tribe</p>
                  <?php } ?>
                                </div>
                  <?php //if($counter==1){ ?>
                               <div class="primary-bg primary-hide">
                    <?php if((has_post_video( $post_id )) && (get_the_content())){ ?>
                    <div style="margin:0;" class="action textModal" >
                       <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php }elseif(has_post_video( $post_id )){ ?>

                  	<div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img  class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>

                  <?php }elseif((!has_post_video( $post_id )) && (get_the_content() == '')){ ?>

                  			 <div class="action NoModal textModal" >
                      <span class="story-text">See Story</span>
                    </div>

                  <?php }else{ ?>
                    <div class="action textModal" >
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
            <?php //} ?>
            <div class="story-caps caps-bg">

            <div class="story-qoute">
             <img style="width:unset;display:block;" src="<?php echo get_stylesheet_directory_uri();?>/img/66.svg" alt="" />
           </div>
              <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
              <p class="caps-tag"><?php echo $author_name; ?></p>
            </div>

          </div>
        </div>
                          <?php }else{ ?>
                              <div class="col-md-4 col-sm-4 col-xs-6 story <?php echo $vid; ?>" data-post-id="<?=$post_id?>">
                    <div class="pos-r">
                                <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                                <div class="story-2"   style="<?php if($featured_img_url==''){ ?> background:#cccccc;text-align: center; <? }else{  ?>background:url(<?=esc_url($featured_img_url)?>) center bottom/cover no-repeat; <?php } ?> ">
                                  <?php if($featured_img_url){}else{ ?>
                                    <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">United</p>
                                    <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">Tribe</p>
                                    <?php } ?>
                                </div>
                                <div class="story-caps">
                                  <div class="story-qoute">
                                 <img style="width:unset;display:block;" src="<?php echo get_stylesheet_directory_uri();?>/img/66.svg" alt="" />
                               </div>
                                  <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                                  <p class="caps-tag"><?php echo $author_name; ?></p>
                                </div>
                   <div class="primary-bg primary-hide">
                     <?php if((has_post_video( $post_id )) && (get_the_content())){ ?>
                    <div style="margin:0;" class="action textModal" >
                      <img  class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php }elseif(has_post_video( $post_id )){ ?>

                  	<div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>

                  <?php }elseif((!has_post_video( $post_id )) && (get_the_content() == '')){ ?>

                  			 <div class="action NoModal textModal" >
                      <span class="story-text">See Story</span>
                    </div>

                  <?php }else{ ?>
                    <div class="action textModal" >
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                  </div>
                              </div>
                          <?php } ?>
             <?php }else{ ?>

                          <?php if($counter%2 ==0){ ?>
                          <div class="col-md-8 col-sm-8 col-xs-6 story" data-post-id="<?=$post_id?>">
                            <div class="pos-r">
                              <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                              <div class="story-1" data-post-id="<?=$post_id?>"  style="<?php if($featured_img_url==''){ ?> background:#cccccc;text-align: center; <? }else{  ?>background:url(<?=esc_url($featured_img_url)?>) center bottom/cover no-repeat; <?php } ?> ">
                                <?php if($featured_img_url){}else{ ?>
                                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">United</p>
                                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">Tribe</p>
                                  <?php } ?>
                              </div>
                              <div class="story-caps">
                                <div class="story-qoute">
                                 <img style="width:unset;display:block;" src="<?php echo get_stylesheet_directory_uri();?>/img/66.svg" alt="" />
                               </div>
                                <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                                <p class="caps-tag"><?php echo $author_name; ?></p>
                              </div>
                <div class="primary-bg primary-hide">
                <?php if((has_post_video( $post_id )) && (get_the_content())){ ?>
                    <div style="margin:0;" class="action textModal" >
                      <img  class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php }elseif(has_post_video( $post_id )){ ?>

                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>

                  <?php }elseif((!has_post_video( $post_id )) && (get_the_content() == '')){ ?>

                         <div class="action NoModal textModal" >
                      <span class="story-text">See Story</span>
                    </div>

                  <?php }else{ ?>
                    <div class="action textModal" >
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                            </div>
                          </div>
                          <?php }else{ ?>
                          <div class="col-md-4 col-sm-4 col-xs-6 story" data-post-id="<?=$post_id?>">
                <div class="pos-r">
                <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                <div class="story-2" data-post-id="<?=$post_id?>" style="<?php if($featured_img_url==''){ ?> background:#cccccc;text-align: center; <? }else{  ?>background:url(<?=esc_url($featured_img_url)?>) center bottom/cover no-repeat; <?php } ?> ">
                  <?php if($featured_img_url){}else{ ?>
                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">United</p>
                  <p style="color: #332469;font-size: 40px;font-weight: bold;font-family: 'pt-sansregular';">Tribe</p>
                  <?php } ?>
                </div>
                <div class="story-caps">
                  <div class="story-qoute">
                                 <img style="width:unset;display:block;" src="<?php echo get_stylesheet_directory_uri();?>/img/66.svg" alt="" />
                               </div>
                  <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                  <p class="caps-tag"><?php echo $author_name; ?></p>
                </div>
                <div class="primary-bg primary-hide">
                   <?php if((has_post_video( $post_id )) && (get_the_content())){ ?>
                    <div style="margin:0;" class="action textModal" >
                      <img  class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php }elseif(has_post_video( $post_id )){ ?>

                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>

                  <?php }elseif((!has_post_video( $post_id )) && (get_the_content() == '')){ ?>

                         <div class="action NoModal textModal" >
                      <span class="story-text">See Story</span>
                    </div>

                  <?php }else{ ?>
                    <div class="action textModal" >
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                </div>
                          </div>
                          <?php } ?>


                <?php  } ?>

                      <?php if($counter%2==0){ $row++; ?>
                        </div>
                      <?php } ?>
                  <?php if($counter%6==0){ ?>

                  <?php } ?>


              <?php $counter++; endwhile; ?>

    <?php endif; wp_reset_postdata(); wp_reset_query(); ?>
        </section>
        </div>


    <div class="text-center">
        <?php get_template_part('content','social') ?>
    </div>


      <!-- Modal -->
            <div class="modal fade" id="textModal" role="dialog">
                <div class="modal-dialog modal-lg">

                     <button type="button" class="close" data-dismiss="modal">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg"  alt="close">
                    </button>
                    <!-- Modal content-->
                    <div class="modal-content">
                    
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-3 modal-image ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/personal-coach.png" class="img-responsive story-image" alt="">
                                </div>
                                <div class="col-md-9 story-action story-content">

                                  <img src="<?php echo get_template_directory_uri(); ?>/img/67.svg">
                                    <h3>I heard a lot about personal coaching</h3>
                                    <h4>Shanna Van Ness</h4>
                                     <p  id= "stories-excerpt" class="excerpt"></p>
 
                                    <p  id="content" class="content"></p>

                                    <p class="read-more-hide by-jenni">Read Less</p>

                                    <a href="<?=get_the_permalink()?>/contact-us"><button class="btn btn-default btn-cust pull-right btn-invert" id="inspire" type="button" name="button">Inspire Me</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <div class="modal fade" id="videoModal" role="dialog">
                <div class="modal-dialog modal-lg">

                   
                    <!-- Modal content-->
                     <button type="button" class="close" data-dismiss="modal">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg"  alt="close">
                    </button>
                    <div class=" pos-r">

                        <div class="container-fluid">
                          <div class="row">
                              <div class="col-md-12 story-action story-video">
                               <!--  <iframe width="100%" height="470" src="#" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                                <!--video width="320" height="240" controls>
                                <source src="movie.mp4" type="video/mp4">

                              Your browser does not support the video tag.
                              </video-->
                              </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>




<?php get_footer(); ?>
