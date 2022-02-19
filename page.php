<?php
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


// $list = getMenuList();

// var_dump(getPageName());

?>

<div style="display:flex;flex-direction:column;gap:15px;margin:35px 0 0 0;gap:35px;">
    

    <div style="display:flex;gap:15px">
        <img    src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-video-art-and-design-studio-xnimrodx-lineal-color-xnimrodx.png"
                height="30px"
        />
        <div style="display:flex;overflow-x:scroll;gap:15px;">

            <?php foreach($categories as $category){  ?>
                <a href="" style="text-decoration:none;">
                    <?= $category->post_title ?>
                </a>
            <?php } ?>
        </div>
    </div>
    
    

    <div style="display:flex;flex-direction:column;">
        
        <?php foreach($categories as $category){  ?>
            <!-- section titre + voir plus -->
            <?php
                $term = get_terms([
                    "name"=>$category->post_title,
                ])[0];
                $args = [
                    'term' => $term->term_id
                ];
                $posts = get_posts($args);
            ?>
            <div style="display:flex;justify-content:space-between;">
                <h5>
                    <?= $category->post_title ?>
                </h5>

                <div style="display:flex;flex-direction:column;justify-content:center;">
                    <a href="<?= $category->guid ?>" style="text-decoration:none;">Voir plus</a>
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
                                                2015
                                            </span>    
                                        </div>

                                        <div class="play">
                                            <img src="https://img.icons8.com/fluency/48/000000/play-button-circled.png"
                                                style="width:45px;z-index:999;"
                                            />
                                                
                                        </div>
                                    <?php endif ?>


                                    <div style="display:flex; flex-direction:column">
                                        <div class="row">
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