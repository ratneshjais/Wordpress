<?php
/*
Plugin Name: PodCast
Plugin URI: http://smartlybuilt.com
Description: To fetch feeds from xml
Version: 1.0
Author: Sumit sharma
Author URI:
*/
    //
    // the plugin code will go here..
    //
function myplugin_activate() {

 // cptui_register_my_cpts_podcast();
  //cptui_register_my_taxes();
  //cptui_register_my_taxes_podcast_cat();

/**
   * Post Type: Podcasts.
   */

  $labels = array(
    "name" => __( "Podcasts", "" ),
    "singular_name" => __( "Podcast", "" ),
  );

  $args = array(
    "label" => __( "Podcasts", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "podcast", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "editor", "thumbnail" ),
  );

  register_post_type( "podcast", $args );

  /**
   * Taxonomy: Categories.
   */

  $labels = array(
    "name" => __( "Categories", "" ),
    "singular_name" => __( "Category", "" ),
  );

  $args = array(
    "label" => __( "Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => false,
    "label" => "Categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'podcast_cat', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "podcast_cat", array( "podcast" ), $args );

   /**
   * Taxonomy: Categories.
   */

  $labels = array(
    "name" => __( "Categories", "" ),
    "singular_name" => __( "Category", "" ),
  );

  $args = array(
    "label" => __( "Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => false,
    "label" => "Categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'podcast_cat', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "podcast_cat", array( "podcast" ), $args );

}
register_activation_hook( __FILE__, 'myplugin_activate' );


function cptui_register_my_cpts_podcast() {

  /**
   * Post Type: Podcasts.
   */

  $labels = array(
    "name" => __( "Podcasts", "" ),
    "singular_name" => __( "Podcast", "" ),
  );

  $args = array(
    "label" => __( "Podcasts", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "podcast", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "editor", "thumbnail","custom-fields" ),
  );

  register_post_type( "podcast", $args );
}

function cptui_register_my_taxes() {

  /**
   * Taxonomy: Categories.
   */

  $labels = array(
    "name" => __( "Categories", "" ),
    "singular_name" => __( "Category", "" ),
  );

  $args = array(
    "label" => __( "Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => false,
    "label" => "Categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'podcast_cat', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "podcast_cat", array( "podcast" ), $args );
}


function cptui_register_my_taxes_podcast_cat() {

  /**
   * Taxonomy: Categories.
   */

  $labels = array(
    "name" => __( "Categories", "" ),
    "singular_name" => __( "Category", "" ),
  );

  $args = array(
    "label" => __( "Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => false,
    "label" => "Categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'podcast_cat', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "podcast_cat", array( "podcast" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_podcast_cat' );

add_action( 'init', 'cptui_register_my_taxes' );


add_action( 'init', 'cptui_register_my_cpts_podcast' );



function podcast_register_settings() {
   add_option( 'podcast_option_name', 'This is my option value.');
   register_setting( 'podcast_options_group', 'podcast_option_name', 'podcast_callback' );
}
add_action( 'admin_init', 'podcast_register_settings' );


function podcast_register_options_page() {
  add_options_page('PodCast Title', 'PodCast Menu', 'manage_options', 'podcasts', 'podcast_options_page');
}
add_action('admin_menu', 'podcast_register_options_page');

function podcast_options_page()
{
  global $wpdb;
  $podcast_url =  get_option('podcast_url');
  if(isset($_POST)){
      $option_name = 'podcast_url' ;
      $new_value = $_POST['podcast_url'] ;

      if (!get_option( $option_name )) {
          update_option( $option_name, $new_value );
      } else {
          $deprecated = null;
          $autoload = 'no';
          add_option( $option_name, $new_value, $deprecated, $autoload );
      }
  }


  if(isset($_GET['action']) && $_GET['action'] == 'fetch'){
    getFeed($podcast_url);
    header('Location:?page=podcasts');
  }


?>
  <div>
  <?php screen_icon(); ?>
  <h2>PodCast</h2>
  <form method="post" action="?page=podcasts">
  <?php settings_fields( 'podcast_url' ); ?>
  <table>
  <tr valign="top">
  <th scope="row"><label for="podcast_url">Rss Feed URL</label></th>
  <td><input type="text" id="podcast_url" name="podcast_url" value='<?php echo $podcast_url; ?>' /></td>
  </tr>
  <tr><td><?php echo $podcast_url; ?></td></tr>
  </table>
  <?php  submit_button(); ?>
  <a class="button button-primary" href="?page=podcasts&action=fetch">Fetch Now</a>
  </form>

  </div>
<?php
}


function latest_podcast( $atts ) {
  $args = array(
 'post_type'        => 'podcast',
 'posts_per_page' => 3,
 'post__not_in' => array(get_the_ID())
);
  //echo ;
$query = new WP_Query( $args );
?>

<section class="cont row">
<?php if ( $query->have_posts() ) : ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <div class="img-cont col-md-4 col-sm-4 col-xs-12">
        <div class="over-lay pos-r">
          <img src="<?php echo get_template_directory_uri(); ?>/img/podcast.png" class="img-responsive prodcast-img" alt="Cinque Terre" width="304" height="236" />
          <?php //the_post_thumbnail(array(236,304), ['class' => 'img-responsive prodcast-img', 'title' => get_the_title()]); ?>
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
            <a class="podcast-link" href="<?=get_the_permalink()?>"></a>
            <div class="hover-text">
              <div class="hover-title"><a href="<?=get_the_permalink()?>"><?=the_title()?></a></div>
              <div class="hover-content"><?= substr(strip_tags(get_the_content()), 0, 100) . '...' ?><?php //the_excerpt() ?>
              </div>
              <button type="button" class="btn btn-default hover-btn">
                <a href="<?=get_the_permalink()?>">
                <span>LISTEN NOW </span></a>
                <img class="triangle" src="img/Triangle.png" alt=""></button>
            </div>
          </div>
        </div>
      </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </section>

<?php


  //return "foo = {$atts['foo']}";
}
add_shortcode( 'latest_podcast', 'latest_podcast' );

function getFeed($feed_url) {
      global $wpdb;
      $content = file_get_contents($feed_url);
      $x = new SimpleXmlElement($content);

      $term = term_exists( $x->channel->title, 'podcast_cat' );
     // print_r($term);
      //exit;
      if($term){
     // print_r($term);
      $tID = $term['term_id'];

      }else{

        $cat_defaults = array(
        'cat_ID' => 0,
        'cat_name' => $x->channel->title,
        'category_description' => $x->channel->description,
        'taxonomy' => 'podcast_cat' );
        $tID = wp_insert_category($cat_defaults);
      }

$quantityTermObject = get_term_by( 'id', absint( $tID ), 'podcast_cat' );
 $quantityTermName = $quantityTermObject->name;

    foreach($x->channel->item as $entry) {
        $length = $entry->enclosure['length'];
        $type = $entry->enclosure['type'];
        $url = $entry->enclosure['url'];
        $data = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."postmeta` WHERE `meta_key` = 'mp3_url' AND `meta_value` LIKE '%$url%'");

        $post = get_post($data[0]->post_id);
       if(count($data) == 0){
          if($post == new stdClass()){

            }else{

                   $post_id = wp_insert_post(array (
                   'post_type' => 'podcast',
                   'post_title' => $entry->title,
                   'post_content' => $entry->description,
                   'post_status' => 'publish',
                   'comment_status' => 'closed',   // if you prefer
                   'post_excerpt' => $entry->enclosure['url'],      // if you prefer
                ));

                wp_set_post_terms( $post_id, $quantityTermName, 'podcast_cat', ture );

               /*update_field("mp3_url","$url",$post_id);
               update_field("pubDate","$entry->pubDate",$post_id);
               update_field("length","$length",$post_id);
               update_field("type","$type",$post_id);*/

               if ( ! add_post_meta( $post_id, "mp3_url", "$url", true ) ) {
                update_post_meta( $post_id, "mp3_url", "$url" , true );
              }

              if ( ! add_post_meta( $post_id, "pubDate", "$entry->pubDate", true ) ) {
                update_post_meta( $post_id, "pubDate", "$entry->pubDate" , true );
              }

              if ( ! add_post_meta( $post_id, "length", "$length", true ) ) {
                update_post_meta( $post_id, "length", "$length" , true );
              }

              if ( ! add_post_meta( $post_id, "type", "$type", true ) ) {
                update_post_meta( $post_id, "type","$type" , true );
              }
               setFeaturedImages($post_id,$x->channel->image->url);

          }
        }
     }

  }

function setFeaturedImages($post_id,$url) {

    $base = dirname(__FILE__);
    $imgfile= $url;
    $filename = basename($imgfile);
    $upload_file = wp_upload_bits($filename, null, file_get_contents($imgfile));
    if (!$upload_file['error']) {
        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_parent' => 0,
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
    $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], 209 );

    if (!is_wp_error($attachment_id)) {
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
        wp_update_attachment_metadata( $attachment_id,  $attachment_data );
    }

    set_post_thumbnail( $post_id, $attachment_id );

    }
}
