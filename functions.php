<?php

add_action( 'init', 'create_post_type' );
add_action( 'init', 'manufacturers_taxonomy' );
add_action( 'init', 'applications_taxonomy' );
// add_action( 'init', 'categories_taxonomy' );
add_action( 'after_switch_theme', 'my_rewrite_flush' );
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
add_filter( 'swiftype_document_builder', 'swiftype_document_builder_filter', 8, 2 );

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'products'
    ));
    return $query;
  }
}

function my_rewrite_flush() {
  flush_rewrite_rules();
}

function create_post_type() {
  register_post_type( 'products',
    array(
      'labels' => array (
        'name' => 'Products',
        'singular_name' => 'Product',
        'menu_name' => 'Products',
        'add_new' => 'Add Product',
        'add_new_item' => 'Add New Product',
        'edit' => 'Edit',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'view' => 'View Product',
        'view_item' => 'View Product',
        'search_items' => 'Search Products',
        'not_found' => 'No Products Found',
        'not_found_in_trash' => 'No Products Found in Trash',
        'parent' => 'Parent Product',
      ),
      'taxonomies' => array('category', 'manufacturers', 'applications'),
      'supports' => array('title', 'editor', 'revisions', 'author'),
      'query_var' => true,
      'has_archive' => true,
      'public' => true,
      'menu_position' => 2,
      'rewrite' => array('slug' => 'products')
    )
  );
}

function manufacturers_taxonomy() {
  register_taxonomy(
    'manufacturers',
    'products',
    array(
      'hierarchical' => false,
      'label' => 'Manufacturers',
      'query_var' => true,
      'rewrite' => array('slug' => 'manufacturers')
    )
  );
}

function applications_taxonomy() {
  register_taxonomy(
    'applications',
    'products',
    array(
      'hierarchical' => false,
      'label' => 'Applications',
      'query_var' => true,
      'rewrite' => array('slug' => 'applications')
    )
  );
}

function categories_taxonomy() {
  register_taxonomy(
    'categories',
    // 'products',
    array(
      // 'hierarchical' => true,
      // 'label' => 'Categories',
      // 'query_var' => true,
      // 'rewrite' => array('slug' => 'categories')
    )
  );
}

function swiftype_document_builder_filter( $document, $post ) {
  $document['fields'][] = array( 'name' => 'Model Number', 'type' => 'string', 'value' => get_post_meta( $post->ID, 'model_number' ) );
  $document['fields'][] = array( 'name' => 'Description', 'type' => 'string', 'value' => get_post_meta( $post->ID, 'description' ) );
  $document['fields'][] = array( 'name' => 'Features', 'type' => 'string', 'value' => get_post_meta( $post->ID, 'features' ) );

  return $document;
}
