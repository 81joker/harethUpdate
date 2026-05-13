<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  <div id="page" class="site">
    <header>

      <?php
      if (! is_404()) {
        get_template_part('parts/content', 'navbar');
      }

      ?>
    </header>

    <?php
    if (! is_404()) {
      if (!is_front_page() && !is_page('home')) :
        get_template_part('parts/content', 'hero');
    ?>
        <!-- <div class="container pt-3 pb-1 ms-3"> -->
        <?php custom_breadcrumb(); ?>
        <!-- </div> -->
    <?php endif;
    }; ?>