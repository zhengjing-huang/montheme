<?php

require_once('options/apparence.php');

require_once('wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php');

//ceshi email
function montheme_supports()
{
    add_theme_support('title_tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Entete du menu');
    register_nav_menu('footer', 'Pied de page');
    	
    add_theme_support( 'custom-logo' );
    //register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    add_image_size('card-header', 350, 215, true);
    montheme_custom_logo_setup();

}


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

function montheme_title_separartor()
{
    return '|';
}

function montheme_menu_class($classes)
{

    // var_dump(func_get_args());
    // die();

    $classes[] = 'nav-item';
    return $classes;
}

function montheme_menu_link_class($attrs)
{
    // var_dump(func_get_args());
    // die();
    $attrs['class'] = 'nav-link';
    return $attrs;
}


function montheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
    echo ' <ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        //var_dump($active);
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        //var_dump($class);
        echo ' <li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

function montheme_init(){
    register_taxonomy('sport','post', [
        'labels'=>[
            'name'              =>"Sport",
            'singular_name'     =>"Sport",
            'plural_name_name'  =>"Sports",
            'search_items'      =>"Rechercher des sport",
            'all_items'         =>"Tous les sport",
            'edit_item'         =>"Editer sport",
            'update_item'       =>"Mettre à jour sport",
            'add_new_item'      =>"Ajouter un nouveau sport",
            'menu_name'         =>"Sport",
        ],
        'show_in_rest'          =>true,
        'hierarchical'          =>true,
        'show_admin_column'     =>true,
    ]);
}

function my_excerpt_length($length){
    return 80;
}
    

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_resgister_assets');
add_action( 'init', 'montheme_init' );

add_filter('document_title_separartor', 'montheme_title_separartor');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');
add_filter('excerpt_length', 'my_excerpt_length');

function montheme_custom_logo_setup() {

    
    $defaults = array(
        'height'               => 100,
        'width'                => 100,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}

function wpbootstrap_sidebar() {
    register_sidebar([
        'name'          => "Sidebar principale",
        'id'            => 'homepage',
        'description'   => "La sidebar principale",
        'before_widget' => '<div id="%1$s" class="widget %2$s p-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title font-italic">',
        'after_title'   => '</h4>',
    ]);
}


add_action('widgets_init', 'wpbootstrap_sidebar');


opcache_reset();

require_once('metaboxes/sponso.php');

//SponsoMetaBox::register();
SponsoMetaBox::register();
?>