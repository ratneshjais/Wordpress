<?php get_header(); ?>
    <section class="create-world">
      <nav class="navbar md-screen fixed-bg">
        <div class="container-fluid">

      <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url()?>">
              <img class="desktop-screen" src="<?php echo get_template_directory_uri(); ?>/img/ut-logo.png" alt="United">
        <img class="mobile-screen" src="<?php echo get_template_directory_uri(); ?>/img/ut-logo-purple.png" alt="United">
            </a>
          </div>

          <div class="collapse navbar-collapse" id="myNavbar">

            <!-- <ul class="nav navbar-nav">
              <li class="active"><a href="#">Stories</a></li>
              <li><a href="#">Programs</a></li>
            </ul> -->
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'top_left_menu',
                    'menu_class'    => 'nav navbar-nav'
                ) );
            ?>

            <!-- <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Podcasts</a></li>
              <li><a href="#">Contact</a></li>
            </ul> -->


            <?php
                wp_nav_menu( array(
                    'theme_location' => 'top_right_menu',
                    'menu_class'    => 'nav navbar-nav navbar-right'
                ) );
            ?>


          </div>
        </div>
      </nav>

      <div id="myCarousel" class="carousel slide custom-carousel" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="intro-heading">
          <h1>Do more than exist.  </h1>
          <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
          <a class="link" href="<?=get_the_permalink()?>/stories">See Story</a>
        </div>
      </div>

      <div class="item">
        <div class="intro-heading">
          <h1>What life are you creating.?</h1>
          <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
          <a href="<?=get_the_permalink()?>/stories">See Story</a>
        </div>
      </div>

      <div class="item">
        <div class="intro-heading">
          <h1>Listen to some of life's cookies.</h1>
          <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
          <a href="<?=get_the_permalink()?>/stories">See Story</a>
        </div>
      </div>
    </div>
  </div>
    </section>
    <section class="intro-section">
      <div class="row md-screen">
        <div id="first-intro" class="col-md-6 col-sm-6 clearfix full-image profile no-padding">
          <img class="pull-right" src="<?php echo get_template_directory_uri(); ?>/img/jennifer.png" alt="">
        </div>
        <div class="col-md-6 col-sm-6 pos-r no-padding">
          <div class="primary-info about-primary-info">
            <span class="section-title section-right">ABOUT</span>
            <h1>Hi,</h1>
            <br>
            <br>
            <h2>I'm Jennifer Ho</h2>
            <br>
            <br>
            <p>A passionate entrepreneur, philanthropist and life aficianado.I’m here to support others in living a bold life. Isn’t it time you lived one?</p>
            <a href="http://www.linkedin.com" target='_blank'>
            <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="">
            <span>Linkedin</span></a>
          </div>
        </div>
      </div>
    </section>
    <section class="intro-section">
      <div class="row md-screen column-reverse">
        <div class="col-md-6 col-sm-6 pos-r no-padding">
          <div class="primary-info">

            <span class="section-title section-left">GET STARTED</span>
            <h2>One day or day one..</h2>
            <br>
            <br>
            <p>Let's see results, not talk about them, not give "good ideas", but goals that can be measured. Our programs and 1-on-1 coaching are NOT about talking at you all day. We collaborate and support you to see massive shifts in your thinking that create the life you've been only thinking about.</p>

      <a href="<?=site_url('/podcasts')?>" class="btn btn-default btn-cust get-btn">Get started</a>

          </div>
        </div>
        <div class="col-md-6 col-sm-6 clearfix full-image profile no-padding">
          <img class="" src="<?php echo get_template_directory_uri(); ?>/img/training.png" alt="">
        </div>
      </div>
    </section>
    <section class="intro-section small">
      <div class="row md-screen">
        <div class="col-md-6 col-sm-6 clearfix full-image no-padding">
          <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/Bitmap.png" alt="">

          <div class="hover-text">
            <div class="play-details">
              <a href="<?=get_the_permalink()?>/podcast/hungry/">
              <h5>Listen to this podcast</h5>
            </a>
                        <div class="play-icon">
                           <a href="<?=get_the_permalink()?>/podcast/hungry/">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt="">
                        </a>
                        </div>

                        <div class="play-content">
                          <div class="date">3rd May, 2017</div>
                          <div class="show"><a href="<?=get_the_permalink()?>/podcast/hungry/">Hungry</a></div>
                        </div>
                      </div>
              
            </div>
        </div>
        <div class="col-md-6 col-sm-6 pos-r no-padding">
          <div class="primary-info">
            <span class="section-title section-right">PODCASTS</span>

            <?php
                  $args=array('post_type'=>'podcast','post_status'=>'publish','posts_per_page'=>2);
                  $the_query = new WP_Query( $args );
                  // The Loop
                  if ( $the_query->have_posts() ) :
                  while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
                      <div class="play-details">
                        <div class="play-icon">
                         <a href="<?=get_the_permalink()?>"> <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.png" alt=""></a>
                        </div>
                        <div class="play-content">
                          <div class="date"><?php the_time('F j, Y'); ?></div>
                          <div class="show"><a href="<?=get_the_permalink()?>"><?=the_title()?></a></div>
                        </div>
                      </div>
            <?php
                  endwhile;
                  endif;
                  // Reset Post Data
                  wp_reset_postdata();
             ?>






            <br>
            <br>
            <a href="<?=site_url('/podcasts')?>" class="btn btn-default btn-cust">More episodes</a>
          </div>
        </div>
      </div>
    </section>

    <?php get_footer(); ?>
