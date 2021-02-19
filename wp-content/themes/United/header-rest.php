<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
        <?php if(is_front_page() || is_home()){
            echo get_bloginfo('name');
        } else{
            echo wp_title('');
        }?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
       <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/node_modules/reset.css/reset.css">
       <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/style.css">
       <?php wp_head(); ?>
       <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<!-- <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff"> -->

<link rel="icon" type="image/png"  sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/img//favicon-96x96.png">

<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">

  </head>
  <body>

    <section class="header">
      <nav class="navbar md-screen fixed-bg">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar secondary-bar"></span>
              <span class="icon-bar secondary-bar"></span>
              <span class="icon-bar secondary-bar"></span>
            </button>
            <a class="navbar-brand logo-left" href="<?=site_url()?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/ut-logo-purple.png" alt="United">
            </a>
          </div>
          <div class="collapse navbar-collapse secondary-mynavbar" id="myNavbar">


           <!--  <ul class="nav navbar-nav secondary-menu">
              <li class="active"><a class="secondary-menu" href="#">Stories</a></li>
              <li><a class="secondary-menu" href="#">Programs</a></li>
              <li><a class="secondary-menu" href="#">Podcasts</a></li>
              <li><a class="secondary-menu" href="#">Contact</a></li>
            </ul> -->

            <?php
                wp_nav_menu( array(
                    'theme_location' => 'main_menu',
                    'menu_class'    => 'nav navbar-nav secondary-menu'
                ) );
            ?>

            <ul class="pull-right header-icons">
              <li><a href="http://www.facebook.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt=""></a></li>
              <li><a href="http://www.twitter.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt=""> </a></li>
              <li><a href="http://www.instagram.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt=""></a></li>
              <li><a href="http://www.plus.google.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/google-plus.svg" alt=""></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
