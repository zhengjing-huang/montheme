<?php


function montheme_resgister_assets()
{
    $bootstrapCssPath = get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css';
    $bootstrapJsPath = get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js';


    //Register styles
    wp_register_style('style-css', get_stylesheet_uri(), [], false, 'all'); ///all -> tous types de média
    wp_register_style('bootstrap-css', $bootstrapCssPath, [], false, 'all'); ///all -> tous types de média

    //Register scripts
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);
    // wp_deregister_script('jquery');
    // wp_register('jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js',[], false, true);
    wp_register_script('bootstrap-js', $bootstrapJsPath, ['jquery'], false, true);

    //Register front page css
    wp_register_style('front-page-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/css/front-page.css'), 'all'); ///all -> tous types de média

    //Enqueue styles
    wp_enqueue_style('style-css');
    wp_enqueue_style('bootstrap-css');


    //Enqueue scripts
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');
}

add_action('wp_enqueue_scripts', 'montheme_resgister_assets');
?>