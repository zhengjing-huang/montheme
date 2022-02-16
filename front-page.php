<?php get_header(); ?>

<?php

    require_once("utils/get_menu_list.php");  
    $list = getMenuList();

    $posts_per_page = 4;
    $count = 4;
?>

<main>
    <?php 
        while (have_posts()){
            the_post();
            the_content();
        }
    ?>

    <?php 
    foreach($list as $section) { 
        if ($section['parent']['menu_order'] >1){
    ?>
            <div class="row"
                style="margin:20px 0;"
            >
                <div style="display: flex; justify-content: space-between;">
                    <h3><?= $section['parent']['name'] ?></h3>
                    <a href="page.php">Voir plus</a>
                </div>

                <?php
                foreach ($section['children'] as $category) {
                    $args = [
                      'category'=>$category->ID,
                      'post_type'=>'post'
                    ];
                    $posts = get_posts($args);
                ?>
                    <?php foreach($posts as $post){ ?>
                        <?php $categoriesOfPost = get_the_category($post->id) ?>
                        <div class="col-md-3 col-sm-6" style="margin-top: 10px;">
                            <div class="card" style="min-height: 360px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post->post_title ?></h5>
                                    <?php foreach ($categoriesOfPost as $category){ ?>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                        <?= $category->name ?>
                                        </h6>
                                    <?php } ?>

                                    <p class="card-text" >
                                        <?= substr($post->post_content, 0, 100) ?>
                                    </p>
                                    <!-- <a href="<?= $post->guid ?>" class="card-link">Lire la suite</a> -->
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