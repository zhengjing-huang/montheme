<?php 

register_taxonomy('acteur','post', [
    'labels'=>[
        'name'              =>"Acteurs",
        'singular_name'     =>"Sport",
        'plural_name_name'  =>"Sports",
        'search_items'      =>"Rechercher un acteur",
        'all_items'         =>"Tous les acteurs",
        'edit_item'         =>"Editer acteur",
        'update_item'       =>"Mettre à jour acteur",
        'add_new_item'      =>"Ajouter un nouvel acteur",
        'menu_name'         =>"Acteur",
    ],
    'show_in_rest'          =>true,
    'hierarchical'          =>true,
    'show_admin_column'     =>true,
]);

//add_action( 'init', 'montheme_init' );

?>