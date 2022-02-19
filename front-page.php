<?php get_header(); ?>

<?php

    require_once("utils/get_menu_list.php");  
    $list = getMenuList();
    $posts_per_page = 4;
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
        $count = 0;
        if ($section['parent']['menu_order'] >1){

    ?>
            <div 
                style="margin:20px 0;"
            >
                <div style="display: flex; margin:0 0 10px 0; gap:20px;background-color:;justify-content:space-between;">
                    <div style="display: flex;gap:10px;">
                        <img src="<?= getSectionIcon($section['parent']['name']) ?>" style="height:40px" />
                        <div style="display:flex;flex-direction:column;justify-content:center;">
                            <span style="font-size:26px;"><?= ucfirst($section['parent']['name']) ?></span>
                        </div>
                        
                    </div>
                    <div style="display:flex;flex-direction:column;justify-content:center;">
                        <a href="<?= $section['parent']['url'] ?>" style="text-decoration:none;">Voir plus</a>
                    </div>

                </div>
                
                <div class="row">
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
                    
                    <?php foreach($posts as $i=>$post){ ?>
                        <?php 
                        $categoriesOfPost = get_the_category($post->ID)[0];
                        ?>
                        
                        <?php if ($count ++ < $posts_per_page): ?>
                            <div class="col-xs-6 col-sm-6 col-md-3 hover-fade" >
                                <div style="display:flex;flex-direction:column;position:relative;">
                                    <div style="display:flex;position:relative;">
                                        <?php
                                        if (strlen(get_the_post_thumbnail($post->ID)) > 0):
                                        ?>
                                            <div style="display:flex;position:absolute;gap:10px;z-index: 99;margin:10px;">
                                                <span style="color:white; font-size:11px; background-color:rgba(0,139,249);padding:1px 4px;border-radius:3px;">
                                                    2015
                                                </span>    
                                                <span style="color:white; font-size:11px; background-color:rgba(255,171,41);padding:1px 4px;border-radius:3px;">
                                                    <?= $categoriesOfPost->name ?>
                                                </span>  
                                            </div>

                                            <div class="play">
                                                <img src="https://img.icons8.com/fluency/48/000000/play-button-circled.png"
                                                    style="width:45px;z-index:999;"
                                                />
                                                
                                            </div>
                                        <?php endif; ?>
                                        <div    class="col-xs-6 col-sm-3 hover-fade myCard" 
                                                style="width: 100%;border-radius:5px;overflow: hidden; "
                                                
                                        >
                                            <a href="#" title="">
                                                <?= get_the_post_thumbnail($post->ID) ?>
                                            </a>
                                        </div>
                                    </div>

                                    <div style="display:flex;flex-direction:column;margin:8px 0px;">
                                        <a href="" style="background-color:transparent; text-decoration:none;">
                                            <h5><?= $post->post_title ?></h5>
                                        </a>
                                        
                                        <div style="display:flex;gap:5px; font-size:13px;color:rgba(197,197,197)">
                                            <span>
                                                黄轩
                                            </span>
                                            <span>
                                                王一博
                                            </span>
                                            <span>
                                                宋茜
                                            </span>
                                            <span>
                                                宋轶
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        <?php endif; ?>
                     <?php } ?>
                <?php } ?>
                </div>
            </div>
        <?php } ?>

     <?php } ?>
    
</main>



<?php get_footer(); ?>