<?php

require_once  plugin_dir_path( __DIR__ ) . '/lib/modules/mobble/mobble.php';
require_once  plugin_dir_path(__DIR__) . '/lib/modules/pageviews/pageviews.php';
require_once  plugin_dir_path(__DIR__) . '/lib/modules/popular-post-widget.php';

// Define path and URL to the ACF plugin.
define( 'NOTICIAS_ACF_PATH', plugin_dir_path( __DIR__ ) . '/lib/modules/acf/' );
define( 'NOTICIAS_ACF_URL', plugin_dir_url( __DIR__ ) . '/lib/modules/acf/' );

// Include the ACF plugin.
include_once( NOTICIAS_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'noticias_acf_settings_url');
function noticias_acf_settings_url( $url ) {
    return NOTICIAS_ACF_URL;
}

// // (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'noticias_acf_settings_show_admin');
// function noticias_acf_settings_show_admin( $show_admin ) {
//     return false;
// }
