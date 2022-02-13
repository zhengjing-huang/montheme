<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <title>Chill Time</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: <?= get_option('footer_background'); ?>!important">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php bloginfo('url') ?>">
        <!-- <?php bloginfo('name') ?> -->
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

        if (has_custom_logo()) {
          echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
        } else {
          echo '<h4>' . get_bloginfo('name') . '</h4>';
        }
        ?>
      </a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">


        <?php

        wp_nav_menu([
          'theme_location'    => 'header',
          'container'         => false,
          'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
          'depth'             => 2,
        ]);


        ?>

        <?= get_search_form() ?>
      </div>
    </div>
  </nav>

  <div class="global_container">
    <div class="container">