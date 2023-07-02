<!DOCTYPE html>
<html lang="en"> <!-- closed in footer -->

<head>
  <!-- <title>ARaynorDesign Template</title> -->
  <?php
        echo'<title>';
        if ( is_home() ) {
        // Blog's Home
        echo get_bloginfo('name') . '  &raquo; Weblog';
        } elseif ( is_single() or is_page() ) {
        // Single blog post or page
        wp_title(''); echo ' - ' . get_bloginfo('name');
        } elseif ( is_category() ) {
        // Archive: Category
        echo get_bloginfo('name') . ' &raquo; Categorie: '; single_cat_title();
        } elseif ( is_day() ) {
        // Archive: By day
        echo get_bloginfo('name') . ' &raquo; All articles from ' . get_the_time('d') . '. ' . get_the_time('F') . ' ' . get_the_time('Y');
        } elseif ( is_month() ) {
        // Archive: By month
        echo get_bloginfo('name') . ' &raquo; All articles from ' . get_the_time('F') . ' ' . get_the_time('Y');
        } elseif ( is_year() ) {
        // Archive: By year
        echo get_bloginfo('name') . ' &raquo; All articles from year ' . get_the_time('Y');
        } elseif ( is_search() ) {
        // Search
        echo get_bloginfo('name') . ' &raquo; Search:      &lt;' . wp_specialchars($s, 1) . '&gt;';
        } elseif ( is_404() ) {
        // 404
        echo get_bloginfo('name') . '  &raquo; 404 - Requested page not found';
        } else {
        // Everything else. Fallback
        echo wp_title(''); echo ' - ' . get_bloginfo('name');
        }
        echo'</title>';
  ?>
  <meta charset="UTF-8">
  <meta name="description" content="free website template">
  <meta name="keywords" content="enter your keywords here">
  <!-- <meta http-equiv="content-type" content="text/html; charset=utf-8"> -->
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=9"> -->
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

  <style>
    #slider {
    background: url("<?php bloginfo('template_url'); ?>/images/loading.gif") no-repeat scroll 50% 50% transparent;
    }
    
    .nivo-directionNav a {
    background: url("<?php bloginfo('template_url'); ?>/images/arrows.png") no-repeat scroll 0 0 transparent;
    }

  </style>

  <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="js/jquery.easing.min.js"></script> -->
  <!-- <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script> -->
  <!-- <script type="text/javascript"> -->

  <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.nivo.slider.pack.js"></script>
  <script>

    $(window).load(function () {
      $('#slider').nivoSlider();
    });
  </script>

</head>

<body style="background: transparent url(<?php bloginfo('template_url'); ?>/images/background.png) repeat;"> <!-- closed in footer -->
  <div id="main"> <!-- closed in footer -->
    <div id="site_content"> <!-- closed in sidebar-->
      <div id="site_heading">
        <a href="<?php bloginfo('url'); ?>"><h1><?php bloginfo('name'); ?></h1></a>
        <span><?php bloginfo('description'); ?></span>
      </div><!--close site_heading-->

      <div id="header">
        <div id="menubar">
          
            <div id="access_01">
              <div class="menu-header_01">
                <!-- <ul id="menu"> -->
                  <?php wp_nav_menu( array('menu' => 'Main Navigation Menu', 'depth' => 4, 'theme_location' => 'Main Navigation Menu' )); ?>
                <!-- </ul> -->
              </div>
            </div>
          
        </div><!--close menubar-->
      </div><!--close header-->
      
      <div id="searchform">
        <?php get_search_form(); ?>
      </div>

      <div id="banner_image">
        <div id="slider-wrapper">
          <div id="slider" class="nivoSlider">
            <img src="<?php bloginfo('template_url'); ?>/images/slide1.jpg" alt="">
            <img src="<?php bloginfo('template_url'); ?>/images/slide2.jpg" alt="">
          </div><!--close slider-->
        </div><!--close slider_wrapper-->
      </div><!--close banner_image-->

      <br>
