<!DOCTYPE html>
<html lang="<?php

use function DI\add;

 language_attributes(); ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <title>Chill Time</title>
</head>

<?php 
  require_once("utils/get_menu_list.php");  
  $list = getMenuList();
?>

<body>
  
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: <?= get_option('footer_background'); ?>!important">
    <div class="container">
      <a class="navbar-brand" href="<?php bloginfo('url') ?>">
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >

        <ul class="navbar-nav mr-auto">
          <?php foreach($list as $i=>$page){ ?>
            
          <li class="nav-item <?= $i==0 ? 'active' : '' ?>" <?= count($page['children']) > 0 ? "dropdown" : "" ?> >
          
            <a  class="nav-link <?= count($page['children']) > 0 ? "dropdown-toggle" : "" ?>" 
                href="<?= $page['parent']["url"] ?>"
                data-bs-toggle="<?= count($page['children']) > 0 ? 'collapse':'' ?>"
                data-bs-target="<?= count($page['children']) > 0 ? '#dropdown-submenu':'' ?>"
                aria-controls="<?= count($page['children']) > 0 ? '#dropdown-submenu':'' ?>"
            >
              <?= $page['parent']['name'] ?> 
            </a>
            
            <?php if (count($page['children']) > 0) : ?>
            <div class="dropdown-menu" aria-labelledby="dropdown-submenu" id="dropdown-submenu">
              <?php foreach($page['children'] as $j=>$subPage){ ?>
                
                  <a class="dropdown-item" href="<?= $subPage['url'] ?>"><?= $subPage["name"] ?></a>
                
              <?php } ?>
            </div>
            <?php endif; ?>
            
          </li>
          <?php }?>
        </ul>
        <div style="margin-left: 20px;">
          <?= get_search_form() ?>
        </div>
        
      </div>
    </div>
  </nav>
  
</body>
  
  <div class="global_container">
    <div class="container">