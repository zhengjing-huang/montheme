<?php
global $wp;
get_header();
?>

<?php
function getPageId(){
    return get_post_field( 'ID',get_post());
}

$posts_per_page = 4;
$args = [
    'post_parent'=>getPageId(),
    'post_type'=>'page',
];

$categories = get_posts($args);

get_category_link('films');
$i = -1;


?>

<div style="display:flex;flex-direction:column;gap:15px;margin:35px 0 0 0;gap:35px;">
    

    <div style="display:flex;gap:15px">
        <img    src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-video-art-and-design-studio-xnimrodx-lineal-color-xnimrodx.png"
                height="30px"
        />
        <div style="display:flex;overflow-x:scroll;gap:15px;">

            
            <?php foreach($categories as $j=>$category){  ?>

                <!-- get url from post id -->
                <?php 
                $args = [
                    'post_type' => 'post',
                    'post_status'=>'publish',
                    'category_name'=>$category->post_name,
                ];
                $posts = (new WP_Query( $args ))->posts;
                $cat = wp_get_post_categories($posts[0]->ID)[0]; 
                ?>
                <a href="<?= home_url( $wp->request ) ?>/?cat=<?= $cat ?>" style="text-decoration:none;">
                    <?= $category->post_title ?>
                </a>
            <?php } ?>
        </div>
    </div>
    
    

    <div style="display:flex;flex-direction:column;">
        
        <?php foreach($categories as $category){  ?>
            <!-- section titre + voir plus -->
            <?php

                $args = [
                    'post_type' => 'post',
                    'post_status'=>'publish',
                    'category_name'=>$category->post_title,
                ];
                $posts = (new WP_Query( $args ))->posts;

                $cat = wp_get_post_categories($posts[0]->ID)[0]; 

            ?>
            <div style="display:flex;justify-content:space-between;">
                <h5>
                    <?= $category->post_title ?>
                </h5>

                <div style="display:flex;flex-direction:column;justify-content:center;">
                    <a href="<?= home_url( $wp->request ) ?>/?cat=<?= $cat ?>" style="text-decoration:none;">Voir plus</a>
                </div>
            </div>

            
            <?php
            
            $args = [
                'post_type' => 'post',
                'post_status'=>'publish',
                'category_name'=>$category->post_name,
            ];
            $posts = (new WP_Query( $args ))->posts;
                    
            $count = 0;
            ?>

            <!-- section films -->
            <div class="row" style="margin-bottom:25px;">
                <?php foreach($posts as $i=>$post){ ?>
                    <?php if ($count ++ < $posts_per_page): ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 hover-fade" >
                            <div style="display:flex;flex-direction:column;position:relative;">
                                <div style="display:flex;position:relative;">
                                    <?php
                                    if (strlen(get_the_post_thumbnail($post->ID)) > 0):
                                    ?>
                                        <div style="display:flex;position:absolute;gap:10px;z-index: 99;margin:10px;">
                                            <span style="color:white; font-size:11px; background-color:rgba(0,139,249);padding:1px 4px;border-radius:3px;">
                                            <?php echo strip_tags(get_the_term_list($post->ID, 'annee')); ?> 
                                            </span>    
                                        </div>

                                        <div class="play">
                                            <a href="<?= $post->guid ?>" title="" style="background-color:transparent;">
                                                <img src="https://img.icons8.com/fluency/48/000000/play-button-circled.png"
                                                    style="width:45px;z-index:999;"
                                                />
                                            </a>
                                        </div>
                                    <?php endif ?>


                                    <div style="display:flex; flex-direction:column">
                                        <div class="row">
                                            <div    class="col-xs-6 col-sm-3 hover-fade myCard" 
                                                    style="width: 100%;border-radius:5px;overflow: hidden; "
                                                        
                                            >
                                                <a href="<?= $post->guid ?>" title="">
                                                    <?= get_the_post_thumbnail($post->ID) ?>
                                                </a>
                                            </div>
                                        </div>
                                        

                                        <div style="display:flex;flex-direction:column;margin:8px 0px;">
                                            <a href="<?= $post->guid ?>" style="background-color:transparent; text-decoration:none;cursor:pointer;">
                                                <h5><?= $post->post_title ?></h5>
                                            </a>
                                            
                                            <div style="display:flex;gap:5px; font-size:13px;color:rgba(197,197,197)">
                                            <?php the_terms(get_the_ID(), 'acteur')
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>
                <?php } ?>
            </div>
            
            
        <?php } ?>
    </div>
</div>

<?php
get_footer();
?>