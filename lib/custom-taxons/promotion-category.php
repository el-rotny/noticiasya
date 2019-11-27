<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function promotion_category_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Promotion Categories', 'taxonomy general name' ),
       'singular_name' => _x( 'Promotion Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Promotion Categories' ),
       'all_items' => __( 'All Promotion Categories' ),
       'parent_item' => __( 'Parent Promotion Category' ),
       'parent_item_colon' => __( 'Parent Promotion Category:' ),
       'edit_item' => __( 'Edit Promotion Category' ),
       'update_item' => __( 'Update Promotion Category' ),
       'add_new_item' => __( 'Add New Promotion Category' ),
       'new_item_name' => __( 'New Promotion Category Name' ),
       'menu_name' => __( 'Promotion Categories' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'promotion-category' ),
     );

     register_taxonomy( 'promotion-category', array( 'post' ), $args );


     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Promotion Categories', 'taxonomy general name' ),
       'singular_name' => _x( 'Promotion Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Promotion Categories' ),
       'all_items' => __( 'All Promotion Categories' ),
       'parent_item' => __( 'Parent Promotion Category' ),
       'parent_item_colon' => __( 'Parent Promotion Category:' ),
       'edit_item' => __( 'Edit Promotion Category' ),
       'update_item' => __( 'Update Promotion Category' ),
       'add_new_item' => __( 'Add New Promotion Category' ),
       'new_item_name' => __( 'New Promotion Category Name' ),
       'menu_name' => __( 'Promotion Categories' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'promotion-category' ),
     );

     register_taxonomy( 'promotion-category', array( 'promotion' ), $args );

 }
 add_action( 'init', 'promotion_category_taxonomies', 0 );
