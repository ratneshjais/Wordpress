<?php
 register_nav_menus( array(
	'main_menu' => 'Main Menu',
	'top_left_menu' => 'Top Left',
	'top_right_menu' => 'Top Right',
	'footer_menu' => 'Footer Menu'
) );

// function add_nav_class($output) {
// 	$output= preg_replace('/<a/', '<a class="active"', $output, 1);
// 	return $output;
// }
// add_filter('wp_nav_menu', 'add_nav_class');

add_theme_support('post-thumbnails');
function add_link_atts($atts, $item, $args) {
//echo "<pre>";
	//print_r($args);
	if($args->theme_location == 'main_menu'){
  $atts['class'] = "secondary-menu";
	}

  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts',0,3);



function ut_enqueue_ecript() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/custom_script.js',
        array( 'jquery' )
    );
    wp_localize_script( 'custom-script', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'ut_enqueue_ecript' );


/*---------- Get story image and video --------*/

add_action( 'wp_ajax_get_post_content', 'get_post_content_func' );
add_action( 'wp_ajax_nopriv_get_post_content', 'get_post_content_func' );
add_action( 'wp_ajax_get_post_video', 'get_post_video_func' );
add_action( 'wp_ajax_nopriv_get_post_video', 'get_post_video_func' );
add_action('wp_ajax_loadmore', 'myc_blog_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'myc_blog_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function shorten_string($string, $wordsreturned)

{
    $retval = $string;
    $array = explode(' ', $string);
    if (count($array)<= $wordsreturned) {
        $retval = $string;
    }
    else {
        array_splice($array, $wordsreturned);
        $retval = implode(' ', $array).' <p class="btn-read-more by-jenni">Read more</p>';
    }
    return $retval;
}

function get_post_content_func(){
  $post_id=$_POST['post_id'];
  $post_data=get_post($post_id);
  $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
  $response=array();
  $response['title']=get_the_title($post_id);
  $response['author_name']=get_post_meta( $post_id,'author', true);
  $response['content']=$post_data->post_content;
  $content=$post_data->post_content;
  $excerpt=shorten_string($content,30);
  $response['excerpt']=$excerpt;


  $response['image_url']=$featured_img_url;
  $parts = parse_url(get_the_post_video_url($post_id));
  parse_str($parts['query'], $query);
  if($query['v']){
    $response['video_url'] = 'https://www.youtube.com/embed/'.$query['v'];
  }else{
    $response['video_url'] = get_the_post_video_url($post_id);
  }

  echo json_encode($response);
  die;
}

function get_post_video_func(){
  $post_id=$_POST['post_id'];
  $response=array();
  $parts = parse_url(get_the_post_video_url($post_id));
  parse_str($parts['query'], $query);
  if($query['v']){
$response['video_url'] = 'https://www.youtube.com/embed/'.$query['v'];
  }else{
    $response['video_url'] = get_the_post_video_url($post_id);
  }
  
  echo json_encode($response);
  die;
}

function myc_load_more_scripts() {
  global $wp_query;
  wp_enqueue_script('jquery');
  wp_register_script( 'myc_loadmore', get_stylesheet_directory_uri() . '/js/mycloadmore.js', array('jquery') );
  wp_localize_script( 'myc_loadmore', 'myc_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  ) );
    if ( is_page_template( 'page-stories.php' )) {
        wp_enqueue_script( 'myc_loadmore' );
    }
}
add_action( 'wp_enqueue_scripts', 'myc_load_more_scripts' );

add_action('wp_ajax_loadmore', 'myc_blog_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'myc_blog_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function myc_blog_loadmore_ajax_handler(){

 $args=array();
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
  $args['post_type'] = 'story';
  $args['posts_per_page'] = '6';
  //$args=array('post_type'=>'story','post_status'=>'publish','posts_per_page'=>6);
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ) : ?>
      <?php $counter=1;$row=1; ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
                            <div class="col-md-8 col-sm-8 col-xs-6 story">
                              <div class="pos-r">
                                <!-- <img class="img-responsive" src="img/story-1.png" alt=""> -->
                              <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                                <div class="story-1" style="background:url(<?=esc_url($featured_img_url)?>) center bottom/cover no-repeat;">
                                </div>
                  <?php //if($counter==1){ ?>
                               <div class="primary-bg">
                    <?php if(has_post_video( $post_id )){ ?>
                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>
                  <?php }else{ ?>
                    <div class="action textModal" data-post-id="<?=$post_id?>">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                                <?php //} ?>
                                <div class="story-caps caps-bg">
                                  <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                                  <p class="caps-tag"><?php echo $author_name; ?></p>
                                </div>

                              </div>
                            </div>
                          <?php }else{ ?>
                              <div class="col-md-4 col-sm-4 col-xs-6 story">
                    <div class="pos-r">
                                <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                                <div class="story-2" style="background:url(<?=esc_url($featured_img_url)?>)">
                                </div>
                                <div class="story-caps">
                                  <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                                  <p class="caps-tag"><?php echo $author_name; ?></p>
                                </div>
                   <div class="primary-bg">
                    <?php if(has_post_video( $post_id )){ ?>
                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>
                  <?php }else{ ?>
                    <div class="action textModal" data-post-id="<?=$post_id?>">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                  </div>
                              </div>
                          <?php } ?>
             <?php }else{ ?>

                          <?php if($counter%2 ==0){ ?>
                          <div class="col-md-8 col-sm-8 col-xs-6 story">
                            <div class="pos-r">
                              <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                              <div class="story-1" style="background:url(<?=esc_url($featured_img_url)?>)">
                              </div>
                              <div class="story-caps">
                                <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                                <p class="caps-tag"><?php echo $author_name; ?></p>
                              </div>
                <div class="primary-bg">
                    <?php if(has_post_video( $post_id )){ ?>
                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>
                  <?php }else{ ?>
                    <div class="action textModal" data-post-id="<?=$post_id?>">
                      <span class="story-text">See Story</span>
                    </div>
                  <?php } ?>

                </div>
                            </div>
                          </div>
                          <?php }else{ ?>
                          <div class="col-md-4 col-sm-4 col-xs-6 story">
                <div class="pos-r">
                <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => get_the_title()]); ?>
                <div class="story-2" style="background:url(<?=esc_url($featured_img_url)?>)">
                </div>
                <div class="story-caps">
                  <p class="caps-cont"><a href="javascript:void(0)"><?php echo $custom_title; ?></a></p>
                  <p class="caps-tag"><?php echo $author_name; ?></p>
                </div>
                <div class="primary-bg">
                    <?php if(has_post_video( $post_id )){ ?>
                    <div class="action videoModal" data-post-id="<?=$post_id?>">
                      <img class="visible" src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                      <span>Watch Video</span>
                    </div>
                  <?php }else{ ?>
                    <div class="action textModal" data-post-id="<?=$post_id?>">
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

    <?php endif;
  die; // here we exit the script and even no wp_reset_query() required!
}





function max_title_length( $title ) {
$max = 50;
if( strlen( $title ) > $max ) {
return substr( $title, 0, $max ). " &hellip;";
} else {
return $title;
}
}


add_filter( 'the_title', 'max_title_length'); 



?>
