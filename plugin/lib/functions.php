<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/utilities/nav_walker.php';

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    // add_editor_style(asset_path('styles/main.css'));
}, 20);

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => WP_Bootstrap_Navwalker(),
    ) );
}

add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );
