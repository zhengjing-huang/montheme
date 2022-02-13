<?php get_header(); ?>
 
<main class="container">

  <!--
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>
  -->

  <?php if(have_posts()): ?>
    test
    <?php while(have_posts()):the_post(); ?>

      

      <?php the_content() ?>
    <?php endwhile; ?>
  <?php endif; ?>


    <div class="col-md-4">
        <!-- <?= get_sidebar('homepage') ?> -->
    <!--
     
      

        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    -->
    </div>
  </div>



<?php get_footer(); ?>
