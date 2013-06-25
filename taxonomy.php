<?php get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php 
      $taxonomy = get_query_var('taxonomy');
      $the_tax = get_taxonomy($taxonomy)->labels->name;
      $queried_term = get_query_var($taxonomy);
      $terms = get_terms($taxonomy, 'slug='.$queried_term);
    ?>
    <div class="stacked">
     <h2><?php echo $the_tax ?>
    <?php
      if ($terms) {
        foreach($terms as $term) {
          echo  ': ' . $term->name;
        }
      }
    ?>
      </h2>
      <ul class="unstyled stacked">
    <?php while ( have_posts() ) : the_post(); ?>
        <li><a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
      </ul>
    </div>
  <?php else : ?>
    <p>nope</p>
  <?php endif; ?>

<?php get_footer(); ?>