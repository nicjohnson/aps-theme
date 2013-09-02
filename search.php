<?php

get_header(); ?>

    <h2 class="page-title">Search results for: <?php echo get_search_query(); ?></h2>
    <?php if ( have_posts() ) : ?>
      <ul class="list-unstyled">
      <?php while ( have_posts() ) : the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php echo get_the_term_list( $post->ID, 'manufacturers', 'Manufacturers: ', ', ', '' ); ?></li>
      <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>Nothing matching “<?php echo get_search_query(); ?>”.</p>
    <?php endif; ?>

<?php get_footer(); ?>