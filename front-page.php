<?php get_header(); ?>

<?php
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}



?>



<main class="container" style="display: flex; gap:30px; flex-direction: column;">

  <?php
  $film_categories = ["fiction", "comique", "horreur"];
  $serie_categories = ["romantique", "zombie"];
  $webtoon_categories = ["action"];

  $list = [
    ["Film",$film_categories],
    ["Séries",$serie_categories],
    ["Webtoons",$webtoon_categories],
  ];
  $posts_per_page = 4;
  $count = 4;
  foreach ($list as $section) {
  ?>
    <div class="row"
        style="margin:20px 0;"
    >

    <div style="display: flex; justify-content: space-between;">
      <h3><?= $section[0] ?></h3>
      <a href="page.php">Voir plus</a>
    </div>
      <?php
      foreach ($section[1] as $category_name) {
        $query = new WP_Query([
          'category_name' => $category_name,
          'posts_per_page' => $posts_per_page,
        ]);
      ?>
        <?php $i = 0; ?>
        <?php while ($query->have_posts() && ++$i < $count) : $query->the_post(); ?>
          
          <div class="col-md-3 col-sm-4">
            <div class="card">
              <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => 'all of us are dear', 'style' => 'height:auto;']) ?>
              <div class="card-body">
                <h5 class="card-title"><?php the_title() ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                <p class="card-text" >
                  
                  <?php the_excerpt() ?>
                  
                </p>
                <a href="<?php the_permalink() ?>" class="card-link">Lire la suite</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>



    <?php
      }
      echo "</div>";
    }
    ?>



    <!-- <?php if (have_posts()) : ?>
    
    <?php while (have_posts()) : the_post(); ?>

      

      <?php the_content() ?>
    <?php endwhile; ?>
  <?php endif; ?> -->


    <div class="col-md-4">
      <!-- <?= get_sidebar('homepage') ?> -->
    
     
      

     



<?php get_footer(); ?>