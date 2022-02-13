<?php

class SponsoMetaBox{

    const META_KEY = "montheme_sponso";

    public static function register(){
        //var_dump("register");
        //die();
        add_action('add_meta_boxes', [self::class, 'add']);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add(){
        add_meta_box(self::META_KEY, "Sponsoring", [self::class, 'render'], "post", 'side');
    }

    public static function render($post){
        // var_dump($post);
        $value = get_post_meta($post->ID, self::META_KEY, true);
        // var_dump(checked($value, '1'));
        // die();
        ?>
            <input type="hidden" value="0" name="montheme_sponso">
            <input  type="checkbox" 
                    value="1" 
                    name="<?php self::META_KEY ?>" 
                    <?php checked($value, '1') ?>
            >
            <label for="<?php self::META_KEY ?>">
                Cet article est sponsorisé?
            </label>
            
        <?php
    }

    public static function save($post_id){
        //var_dump($post_id);
        //die();
        if (array_key_exists(self::META_KEY, $_POST)){
            if ($_POST[self::META_KEY] === '0'){
                delete_post_meta( $post_id, self::META_KEY);
            }else{
                update_post_meta($post_id,self::META_KEY, 1);
            }
        }
    }
}



?>