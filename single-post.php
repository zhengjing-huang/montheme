<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>"alt="" style="width:100%; height:auto;">
        </p>
        <?php the_content() ?>

        <?php if(get_post_meta(get_the_ID(),'montheme_sponso',true) == '1'): ?>
            <div class="alert alert-info">
                Cet article est sponsorisé
            </div>
        <?php else :?>
            <div class="alert alert-info">
                Cet article n'est pas sponsorisé
            </div>

            
        <?php endif; ?>
        <!-- pb commentaire obsolete-->
        <?php
    if (comments_open() || get_comments_number()){
        comments_template();
    } 
?>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>