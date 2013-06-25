<?php

class Post_Category_Walker extends Walker_Category {

  private $term_ids = array();

  function __construct( $post_id, $taxonomy )  {
    // fetch the list of term ids for the given post
    $this->term_ids = wp_get_post_terms( $post_id, $taxonomy, 'fields=ids' );
  }

  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, $output ) {
    $display = false;

    $id = $element->term_id;

    if ( in_array( $id, $this->term_ids ) ) {
      // the current term is in the list
      $display = true;
    }
    elseif ( isset( $children_elements[ $id ] ) ) {
      // the current term has children
      foreach ( $children_elements[ $id ] as $child ) {
        if ( in_array( $child->term_id, $this->term_ids ) ) {
          // one of the term's children is in the list
          $display = true;
          // can stop searching now
          break;
        }
      }
    }

    if ( $display )
      parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
}



function walk_post_categories( $post_id, $args = array() ) {
  $args = wp_parse_args( $args, array(
    'taxonomy' => 'category'
  ) );

  $args['walker'] = new Post_Category_Walker( $post_id, $args['taxonomy'] );

  $output = wp_list_categories( $args );
  if ( $output )
    return $output;
}