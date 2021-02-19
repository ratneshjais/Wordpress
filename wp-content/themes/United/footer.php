 <?php if (!is_page('contact-us')) {?>

<section class="contact-us">
        <div class="md-screen content clearfix">
          <div class="pull-left text">Contact us to learn more about the programs</div>
          <a href="mailto:jennifer@theunitedtribe.com" class="btn btn-default btn-cust pull-right">Contact Us</a>
        </div>
      </section>

      <?php }?>


     

      <section class="footer clearfix pos-r md-screen">
          <div class="footer-logo">
		  <a class="navbar-brand logo-left" href="<?=site_url()?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ut-logo-purple.png" alt=""></a>
          </div>
          <div class="footer-resp">

          <!-- <ul class="left-content pull-left">
            <li class="active"><a href="#">2017. United Tribe </a></li>
            <li><a href="#">Terms of use</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul> -->

          <?php 
                wp_nav_menu( array(                    
                    'theme_location' => 'footer_menu',
                    'menu_class'    => 'left-content pull-left'
                ) );
            ?>

          <ul class="right-content pull-right">
            <li>Connect with UT</li>
            <li><a href="http://www.facebook.com" target='_blank'>
			<img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt=""></a></li>
            <li><a href="http://www.twitter.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt=""></a> </li>
            <li><a href="http://www.instagram.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt=""></a> </li>
            <li><a href="http://www.plus.google.com" target='_blank'><img src="<?php echo get_template_directory_uri(); ?>/img/google-plus.svg" alt=""></a> </li>
          </ul>
        </div>
        <div id="preloader">
  <div class="preloader">&nbsp;</div>
</div>

      </section>



    <script src="<?php echo get_template_directory_uri(); ?>/node_modules/jquery/dist/jquery.min.js" charset="utf-8"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/node_modules/bootstrap/dist/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app.js" charset="utf-8"></script>
    <?php wp_footer(); ?>
  </body>
</html>
