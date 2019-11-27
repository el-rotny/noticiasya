<?php

/*
* Creating a function to create our CPT
*/

function promotion_cpt() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Promotions', 'Post Type General Name', 'NoticiasYa' ),
        'singular_name'       => _x( 'Promotion', 'Post Type Singular Name', 'NoticiasYa' ),
        'menu_name'           => __( 'Promotions', 'NoticiasYa' ),
        'parent_item_colon'   => __( 'Parent Promotion', 'NoticiasYa' ),
        'all_items'           => __( 'All Promotions', 'NoticiasYa' ),
        'view_item'           => __( 'View Promotion', 'NoticiasYa' ),
        'add_new_item'        => __( 'Add New Promotion', 'NoticiasYa' ),
        'add_new'             => __( 'Add New', 'NoticiasYa' ),
        'edit_item'           => __( 'Edit Promotion', 'NoticiasYa' ),
        'update_item'         => __( 'Update Promotion', 'NoticiasYa' ),
        'search_items'        => __( 'Search Promotion', 'NoticiasYa' ),
        'not_found'           => __( 'Not Found', 'NoticiasYa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'NoticiasYa' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'Promotions', 'NoticiasYa' ),
        'description'         => __( 'Promotion', 'NoticiasYa' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'promotion-category', 'market' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'promotion', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'promotion_cpt', 0 );
