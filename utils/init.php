<?php 

register_taxonomy('sport','post', [
    'labels'=>[
        'name'              =>"Aut",
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
    //'hierarchical'          =>true,
    'show_admin_column'     =>true,
]);

//add_action( 'init', 'montheme_init' );

?>