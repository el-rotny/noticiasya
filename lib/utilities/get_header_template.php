<?php
if ( ! function_exists( 'get_header_template' ) ) :
function get_header_template( $name = null ) {
    $templates_loader = new NoticiasYa_Template_Loader;

    /**
     * Fires before the header template file is loaded.
     *
     * @since 2.1.0
     * @since 2.8.0 $name parameter added.
     *
     * @param string|null $name Name of the specific header file to use. null for the default header.
     */
    do_action( 'get_header', $name );
    $templates = array();
    $name      = (string) $name;
    if ( '' !== $name ) {
        $templates[] = "header-{$name}.php";
    }

    $templates[] = 'header.php';

    $templates_loader->locate_template( $templates, true );

}
endif;
