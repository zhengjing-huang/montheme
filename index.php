
<?php 

global $wp;
get_header();
$posts_per_page = 4;

$category = get_queried_object();

// $posts = getPostsFromCateName($category->name);

?>

<?php if (have_posts()) : ?>

<div class="row" style="margin-top:50px">
    <?php $i= 0; ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php $post = $posts[$i++]; ?>
        <div class="col-xs-6 col-sm-6 col-md-3 hover-fade">
        <?php $categoriesOfPost = get_the_category($post->ID)[0]; ?>
        
        <div style="display:flex;flex-direction:column;position:relative;">
                                    <div style="display:flex;position:relative;">
                                        <?php
                                        if (strlen(get_the_post_thumbnail($post->ID)) > 0):
                                        ?>
                                            <div style="display:flex;position:absolute;gap:10px;z-index: 99;margin:10px;">
                                                <span style="color:white; font-size:11px; background-color:rgba(0,139,249);padding:1px 4px;border-radius:3px;">
                                                <?php echo strip_tags(get_the_term_list($post->ID, 'annee')); ?> 
                                                </span>    
                                                <span style="color:white; font-size:11px; background-color:rgba(255,171,41);padding:1px 4px;border-radius:3px;">
                                                    <?= $categoriesOfPost->name ?>
                                                </span>  
                                            </div>

                                            <div class="play">
                                                <a href="<?= $post->guid ?>" title="" style="background-color:transparent;">
                                                <img src="https://img.icons8.com/fluency/48/000000/play-button-circled.png"
                                                    style="width:45px;z-index:999;"
                                                />
                                                </a>
                                                
                                            </div>
                                        <?php endif; ?>
                                        <div    class="col-xs-6 col-sm-3 hover-fade myCard" 
                                                style="width: 100%;border-radius:5px;overflow: hidden; "
                                                
                                        >
                                            <a href="<?= $post->guid ?>" title="">
                                                <?= get_the_post_thumbnail($post->ID) ?>
                                            </a>
                                        </div>
                                    </div>

                                    <div style="display:flex;flex-direction:column;margin:8px 0px;">
                                        <a href="<?= $post->guid ?>" style="background-color:transparent; text-decoration:none;">
                                            <h5><?= $post->post_title ?></h5>
                                        </a>
                                        
                                        <div style="display:flex;gap:5px; font-size:13px;color:rgba(197,197,197)">
                                        <?php the_terms(get_the_ID(), 'acteur')
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
    <?php endwhile; ?>
</div>


<?php montheme_pagination() ?>

<?php else : ?>
<h1>Aucun article</h1>
<?php endif; ?>



<?php get_footer() ?>