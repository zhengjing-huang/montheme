<?php

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


?>