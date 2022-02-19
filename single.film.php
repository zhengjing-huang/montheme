<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>"alt="" style="width:100%; height:auto;">
        </p>
        <?php the_content() ?>


       
<?php endwhile;
endif; ?>


<?php get_footer(); ?>


<?php
                foreach ($section['children'] as $category) {
                    
                    $args = [
                      'category'=>$category['ID'],
                      'post_type'=>'post'
                    ];
                    $posts = get_posts($args);
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
                                    
                                    <!-- <h5 class="card-title"><?= $post->post_title ?></h5> -->
                                    <?php foreach ($categoriesOfPost as $category){ ?>
                                        <a href="">
                                            <?= $category->name ?>
                                        </a>
                                        
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