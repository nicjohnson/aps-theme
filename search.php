<?php

get_header(); ?>

    <?php if ( have_posts() ) : ?>
    <div class="stacked">
      <h2 class="page-title">Search results for: <?php echo get_search_query(); ?></h2>
      <ul class="unstyled">
      <?php while ( have_posts() ) : the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php echo get_the_term_list( $post->ID, 'manufacturers', 'Manufacturers: ', ', ', '' ); ?></li>
      <?php endwhile; ?>
      </ul>
    </div>
    <?php else : ?>
      <p>nope.</p>
    <?php endif; ?>

<?php get_footer(); ?>