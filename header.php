<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>   
    <title>Chill Time</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: <?= get_theme_mod( 'header_background'); ?>!important">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php bloginfo('url') ?>">
      <?php bloginfo( 'name' ) ?>
      
    </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <?php 


    wp_nav_menu(['theme_location'=> 'header',
                 'container'=> false,
                 'menu_class'=> 'navbar-nav me-auto mb-2 mb-lg-0'
                 ]);

    // wp_nav_menu( array(
    //   'menu' => 'top_menu',
    //   'depth' => 2,
    //   'container' => false,
    //   'menu_class' => 'nav',
    //   //Process nav menu using our custom nav walker
    //   'walker' => new wp_bootstrap_navwalker())
    // );

    ?>   
    <!--
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      -->
      <?= get_search_form()?>
    </div>
  </div>
</nav>


<div class="container">