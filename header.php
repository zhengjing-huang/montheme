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
  function getLists(){
    $args = [
      'post_parent'=>0,
      'post_type'=>'page',
    ];
    $my_pages = get_posts($args);
    $list = [];
    foreach ($my_pages as $page){
      $args = [
        'post_parent'=>$page->ID,
        'post_type'=>'page',
        'meta_query'=>[
          
            'key'=>"menu_order",
            'value'=>'0',
            'compare'=>">"
          
        ]
      ];
      $subPages = get_posts($args);
      // if (count($subPages)>0){
      //   var_dump($subPages);
      // }
      // var_dump($subPages);
      $children=[];
      foreach($subPages as $subPage){

        array_push($children, [
          "name"=>$subPage->post_name,
          "url"=>$subPage->guid,
        ]);
        
      }
      // var_dump($children);
      
      $object = [
        "parent"=>[
          "url"=>$page->guid,
          "name"=>$page->post_name
        ],
        "children"=>$children,
      ];
      array_push($list, $object);
    }
    // die();
    // var_dump($list);
    // die();
    return $list;
    
  }
  $list = getLists();
  getLists();
?>

<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: <?= get_option('footer_background'); ?>!important">
    <!-- <div class="container-fluid"> -->
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php foreach($list as $i=>$page){ ?>
            
          <li class="nav-item <?= $i==0 ? 'active' : '' ?>" <?= count($page['children']) > 0 ? "dropdown" : "" ?> >
            
            <a  class="nav-link <?= count($page['children']) > 0 ? "dropdown-toggle" : "" ?>" 
                href="<?= $page->guid ?>"
                data-bs-toggle="<?= count($page['children']) > 0 ? 'collapse':'' ?>"
                data-bs-target="<?= count($page['children']) > 0 ? '#dropdown-submenu':'' ?>"
                aria-controls="<?= count($page['children']) > 0 ? '#dropdown-submenu':'' ?>"
            >
              <?= $page['parent']['name'] ?> 
            </a>
            
            <?php if (count($page['children']) > 0) : ?>
            <div class="dropdown-menu" aria-labelledby="dropdown-submenu" id="dropdown-submenu">
              <?php foreach($page['children'] as $j=>$subPage){ ?>
                
                  <a class="dropdown-item" href="#">Action</a>
                
              <?php } ?>
            </div>
            <?php endif; ?>
            
          </li>
          <?php }?>
        </ul>

      </div>
    <!-- </div> -->
  </nav>
  
</body>
  <?= get_search_form() ?>
  <div class="global_container">
    <div class="container">