<?php

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

function my_excerpt_length($length){
    return 80;
}

add_filter('document_title_separartor', 'montheme_title_separartor');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');
add_filter('excerpt_length', 'my_excerpt_length');

?>