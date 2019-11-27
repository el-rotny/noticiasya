<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function event_category_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Event Categories', 'taxonomy general name' ),
       'singular_name' => _x( 'Event Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Event Categories' ),
       'all_items' => __( 'All Event Categories' ),
       'parent_item' => __( 'Parent Event Category' ),
       'parent_item_colon' => __( 'Parent Event Category:' ),
       'edit_item' => __( 'Edit Event Category' ),
       'update_item' => __( 'Update Event Category' ),
       'add_new_item' => __( 'Add New Event Category' ),
       'new_item_name' => __( 'New Event Category Name' ),
       'menu_name' => __( 'Event Categories' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'event-category' ),
     );

     register_taxonomy( 'event-category', array( 'event' ), $args );

 }
 add_action( 'init', 'event_category_taxonomies', 0 );
