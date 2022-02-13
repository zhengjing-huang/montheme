<?php
get_header();
?>





<!-- la boucle de index php a modifier dans page et single et ....-->


<?php get_template_part('template-parts/loop-single');?>


<?php comments_template(); ?>


<hr>

<?php
get_footer();
?>