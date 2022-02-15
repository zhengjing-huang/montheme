

<?php 

function montheme_supports()
{
    add_theme_support('title_tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Entete du menu');
    register_nav_menu('footer', 'Pied de page');
    	
    add_theme_support( 'custom-logo' );
    add_image_size('card-header', 350, 215, true);
    montheme_custom_logo_setup();

}

add_action('after_setup_theme', 'montheme_supports');

?>