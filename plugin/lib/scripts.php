<?php

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script( 'dc_plugin_script', plugin_dir_url( __FILE__ ) . '../assets/dist/js/index.js', array (), 1.1, true);
    wp_enqueue_script( 'dc_vendor_script', plugin_dir_url( __FILE__ ) . '../assets/dist/js/vendor.js', array (), 1.1, true);
}, 100);
