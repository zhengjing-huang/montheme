<?php get_header(); ?>

<h1>
    <?php get_queried_object()->name ?>
</h1>

<p>
    <?= get_queried_object()->description ?>
</p>

<?php if (have_posts()) : ?>

    <div class="row">

        <?php while (have_posts()) : the_post(); ?>
            <div class="col-sm-4">

                acteur
                <div class="card">
                    <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => 'all of us are dear', 'style' => 'height:auto;']) ?>
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                        <p class="card-text">
                            <?php the_excerpt() ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="card-link">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    

    <?php montheme_pagination() ?>

<?php else : ?>
    <h1>Aucun article</h1>
<?php endif; ?>

<?php get_footer(); ?>