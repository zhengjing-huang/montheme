<?php get_header(); ?>

<?php

    require_once("utils/get_menu_list.php");  
    $list = getMenuList();

    $posts_per_page = 4;
    $count = 4;
?>

<main>
    <?php 
        $args = [
            'menu_order'=>1,
            'post_type'=>'page',
        ];
        $front_page = get_posts($args)[0];
        echo do_shortcode(get_post_field('post_content', $front_page->ID));

        
    ?>

    <?php 
    foreach($list as $section) { 
        if ($section['parent']['menu_order'] >1){
    ?>
            <div class="row"
                style="margin:20px 0;"
            >
                <div style="display: flex; justify-content: space-between;">
                    <h3><?= ucfirst($section['parent']['name']) ?></h3>
                    <a href="page.php">Voir plus</a>
                </div>
                
                <?php
                foreach ($section['children'] as $category) {
                    
                    $args = [
                      'category'=>$category['ID'],
                      'post_type'=>'post'
                    ];
                    $posts = get_posts($args);
                ?>
                    <?php
                    //$paged
                    $args = [
                        'post_type' => 'post',
                        'post_status'=>'publish',
                        'category_name'=>$category['name'],
                    ];
                    $posts = (new WP_Query( $args ))->posts;
                    ?>
                    
                    
                    <?php foreach($posts as $post){ ?>
                        <?php $categoriesOfPost = get_the_category($post->id) ?>
                        <div class="col-md-3 col-sm-6" style="margin-top: 10px;">
                            <div class="card" style="min-height: 360px;">
                                

                                <div class="col-xs-6 col-sm-3 hover-fade" style="width: 100%;">
                                    <a href="#" title="">
                                        <?= get_the_post_thumbnail($post->ID) ?>
                                    </a>
                                    <h4 class="text-center"><?= $post->post_title ?></h4>
                                </div>
                                
                                <div class="card-body" style="padding:0px 15px;">
                                    
                                    <?php foreach ($categoriesOfPost as $category){ ?>
                                        <a href="">
                                            <?= $category->name ?>
                                        </a>
                                        
                                    <?php } ?>

                                    <p class="card-text" >
                                        <?= substr($post->post_content, 0, 100) ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                    
                <?php } ?>
                
            </div>
        <?php } ?>

     <?php } ?>
    
</main>



<?php get_footer(); ?>