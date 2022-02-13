<?php get_header(); ?>


    <div class="row" style="margin-top:50px">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title() ?></h1>
                <p>
                    <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto;">
                </p>
                <?php the_content() ?>


                <!-- pb commentaire obsolete-->
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>

        <?php endwhile;
        endif; ?>
    </div>

    <?php get_footer(); ?>
