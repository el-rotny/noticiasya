<?php
if ( ! function_exists( 'get_sidebar_template' ) ) :
function get_sidebar_template( $name = null ) {
    $templates_loader = new NoticiasYa_Template_Loader;

    /**
     * Fires before the sidebar template file is loaded.
     *
     * @since 2.1.0
     * @since 2.8.0 $name parameter added.
     *
     * @param string|null $name Name of the specific sidebar file to use. null for the default sidebar.
     */
    do_action( 'get_sidebar', $name );
    $templates = array();
    $name      = (string) $name;
    if ( '' !== $name ) {
        $templates[] = "sidebar-{$name}.php";
    }

    $templates[] = 'sidebar.php';

    $templates_loader->locate_template( $templates, true );

}
endif;
