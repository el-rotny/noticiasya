<?php

/*
* Creating a function to create our CPT
*/

function sub_brand_cpt() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Sub Brands', 'Post Type General Name', 'NoticiasYa' ),
        'singular_name'       => _x( 'Sub Brand', 'Post Type Singular Name', 'NoticiasYa' ),
        'menu_name'           => __( 'Sub Brands', 'NoticiasYa' ),
        'parent_item_colon'   => __( 'Parent Sub Brand', 'NoticiasYa' ),
        'all_items'           => __( 'All Sub Brands', 'NoticiasYa' ),
        'view_item'           => __( 'View Sub Brand', 'NoticiasYa' ),
        'add_new_item'        => __( 'Add New Sub Brand', 'NoticiasYa' ),
        'add_new'             => __( 'Add New', 'NoticiasYa' ),
        'edit_item'           => __( 'Edit Sub Brand', 'NoticiasYa' ),
        'update_item'         => __( 'Update Sub Brand', 'NoticiasYa' ),
        'search_items'        => __( 'Search Sub Brand', 'NoticiasYa' ),
        'not_found'           => __( 'Not Found', 'NoticiasYa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'NoticiasYa' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'Sub Brands', 'NoticiasYa' ),
        'description'         => __( 'Sub Brand', 'NoticiasYa' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'sub-brand-category', 'market' ),
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
    register_post_type( 'sub-brand', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'sub_brand_cpt', 0 );
