<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function market_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Markets', 'taxonomy general name' ),
       'singular_name' => _x( 'Market', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Markets' ),
       'all_items' => __( 'All Markets' ),
       'parent_item' => __( 'Parent Market' ),
       'parent_item_colon' => __( 'Parent Market:' ),
       'edit_item' => __( 'Edit Market' ),
       'update_item' => __( 'Update Market' ),
       'add_new_item' => __( 'Add New Market' ),
       'new_item_name' => __( 'New Market Name' ),
       'menu_name' => __( 'Markets' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'market' ),
     );

     register_taxonomy( 'market', array( 'post' ), $args );

 }
 add_action( 'init', 'market_taxonomies', 0 );
