<?php

get_header(); ?>

    



<!--     <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
    </div> -->

    <div class="row">
        <div class="span4 stacked">
            <h2><small>Browse by</small> Product Category</h2>
            <ul class="unstyled stacked">
            <?php 

            $args = array(
                          'title_li' => '',
                          'taxonomy' => 'categories',
                          'depth'    => '1'
                          );
            wp_list_categories( $args ); 

            ?>
            </ul>
        </div>
        <div class="span4 stacked">
          <h2><small>Browse by</small> Application</h2>
          <ul class="unstyled stacked">
          <?php 

          $args = array(
                        'title_li'   => '',
                        'taxonomy'   => 'applications',
                          'depth'    => '1'
                        );
          wp_list_categories( $args ); 

          ?>
          </ul>
       </div>
        <div class="span4 stacked">
            <h2><small>Browse by</small> Manufacturer</h2>
            <ul class="unstyled stacked">
            <?php 

            $args = array(
                          'title_li' => '',
                          'taxonomy' => 'manufacturers',
                          'depth'    => '1'
                          );
            wp_list_categories( $args ); 

            ?>
            </ul>
        </div>
    </div>


    



<?php get_footer(); ?>