<?php
/**
 * Adds Global_Navigation_Widget widget.
 */
class Global_Navigation_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {

        $widget_ops = array(
    			'description'                 => __( 'Add a navigation menu to your sidebar.' ),
    			'customize_selective_refresh' => true,
    		);

        parent::__construct(
            'global_navigation_widget', // Base ID
            __( 'NY Global Navigation'), // Name
            $widget_ops // args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
        if ( ! $nav_menu ) {
          return;
        }

        echo $before_widget;

        //$title = apply_filters( 'widget_title', $instance['title'] );
        // if ( ! empty( $title ) )
        //   echo $before_title . $title . $after_title;
        ?>

        <div class="navbar-wrap clearfix">
          <nav id="brandNav" class="navbar navbar navbar-inverse -inverse">
            <div class="navbar-container">
               <div class="navbar-header">
                  <a class="navbar-brand -centered" href="/">
                      <?php
                        $logo_exists = function_exists( 'the_custom_logo' ) && has_custom_logo();
                        if ( $logo_exists ):
                        $custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0];
                      ?>

                      <img src="<?php echo $custom_logo; ?>" alt="<?php bloginfo('name'); ?>">

                      <?php endif; ?>

                      <?php if ( !$logo_exists ): ?>
                        <div class="navbar-text">
                        <?php echo get_bloginfo( 'name' );?>
                        </div>
                      <?php endif; ?>
                  </a>

                  <a href="#" class="burger-button">
                    <div class="animated-menu-icon">
                      <div class="animated-menu-icon-bar"></div>
                      <div class="animated-menu-icon-bar"></div>
                      <div class="animated-menu-icon-bar"> </div>
                    </div>
                  </a>

                  <!--/ Burger Icon END -->
               </div>
               <!-- Most Left Navbar -->
               <ul class="navbar-transactional nav navbar-nav navbar-left navbar-nav small--hide">
                  <li class="navbar-outlined">
                     <a href="/account/login" class="navbar-nav-item">
                        <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
                           <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                              <g id="Component-/-Main-navigation" transform="translate(-1215.000000, -42.000000)" stroke="currentColor">
                                 <g id="Main-Navigation">
                                    <g id="Account-items" transform="translate(1215.000000, 22.000000)">
                                       <g id="icon-account" transform="translate(0.500000, 20.500000)">
                                          <path d="M13.0000008,12.4852966 C13.0004008,12.1590966 12.8411008,11.8524966 12.5740008,11.6652966 C10.7702008,10.4971966 8.64710075,9.9182966 6.50000075,10.0092966 C4.35290075,9.9182966 2.22980075,10.4971966 0.426000752,11.6652966 C0.158900752,11.8524966 -0.000399248489,12.1590966 7.51510862e-07,12.4852966 L0,15.0092966 L13.0000015,15.0092966 L13.0000008,12.4852966 Z" id="Stroke-1"></path>
                                          <path d="M6.5,0 C8.4317,0 10,1.5683 10,3.5 C10,5.4317 8.4317,7 6.5,7 C4.5683,7 3,5.4317 3,3.5 C3,1.5683 4.5683,0 6.5,0 Z" id="Stroke-2"></path>
                                       </g>
                                    </g>
                                 </g>
                              </g>
                           </g>
                        </svg>
                        <span class="mobile-nav-hidden">Login</span>
                        <span class="icon__fallback-text">Log in</span>
                     </a>
                  </li>

                  <li>
                     <a href="/search" class="navbar-nav-item">
                        <!-- Search -->
                        <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg width="15px" height="16px" viewBox="0 0 15 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.5" stroke-linejoin="round">
                              <g id="Component-/-Main-navigation" transform="translate(-1463.000000, -42.000000)" stroke="#000000">
                                 <g id="Main-Navigation">
                                    <g id="Account-items" transform="translate(1215.000000, 22.000000)">
                                       <g id="icon-search" transform="translate(248.500000, 20.500000)">
                                          <path d="M6,0 C9.3115,0 12,2.6885 12,6 C12,9.3115 9.3115,12 6,12 C2.6885,12 0,9.3115 0,6 C0,2.6885 2.6885,0 6,0 Z" id="Stroke-1" stroke-linecap="round"></path>
                                          <path d="M13.758,14.758 L10,11" id="Stroke-2" stroke-linecap="square"></path>
                                       </g>
                                    </g>
                                 </g>
                              </g>
                           </g>
                        </svg>
                        <span class="mobile-nav-hidden">Search</span>
                        <!-- Search End -->
                     </a>
                  </li>
               </ul>
               <ul class="navbar-transactional nav navbar-nav navbar-right navbar-nav small--hide">
                  <li>
                      <a href="/search" class="navbar-nav-item btn navbar-btn">
                        Mantente Informado Aqui
                      </a>
                  </li>
               </ul>
            </div>
          </nav>
          <div class="navbar-wrap--menu">
            <nav id="mainNav" class="navbar navbar-default navbar--menu">
               <div class="navbar-container">
                 <!-- / Most Right Navbar END -->
                 <?php
                   wp_nav_menu(array(
                       'theme_location'  => 'primary_noticias',
                       'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                       'container'       => 'div',
                       'container_class' => 'navbar-collapse collapse navbar-collapse',
                       'container_id'    => 'navbar-collapse',
                       'menu_class'      => 'navbar-main nav navbar-nav navbar-left',
                       'fallback_cb'     => 'WP_Custom_Navwalker::fallback',
                       'walker'          => new WP_Custom_Navwalker(),
                   ));
                 ?>

              </div>
            </nav>
          </div>
        </div>

        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
      if ( ! empty( $new_instance['title'] ) ) {
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
      }
      if ( ! empty( $new_instance['nav_menu'] ) ) {
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
      }

        return $instance;
    }

    /**
  	 * Outputs the settings form for the Navigation Menu widget.
  	 *
  	 * @since 3.0.0
  	 *
  	 * @param array $instance Current settings.
  	 * @global WP_Customize_Manager $wp_customize
  	 */
  	public function form( $instance ) {
  		global $wp_customize;
  		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
  		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
  		// Get menus
  		$menus = wp_get_nav_menus();
  		$empty_menus_style     = '';
  		$not_empty_menus_style = '';
  		if ( empty( $menus ) ) {
  			$empty_menus_style = ' style="display:none" ';
  		} else {
  			$not_empty_menus_style = ' style="display:none" ';
  		}
  		$nav_menu_style = '';
  		if ( ! $nav_menu ) {
  			$nav_menu_style = 'display: none;';
  		}
  		// If no menus exists, direct the user to go and create some.
  		?>
  		<p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
  			<?php
  			if ( $wp_customize instanceof WP_Customize_Manager ) {
  				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
  			} else {
  				$url = admin_url( 'nav-menus.php' );
  			}
  			/* translators: %s: URL to create a new menu. */
  			printf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
  			?>
  		</p>
  		<div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
  			<p>
  				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
  				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
  			</p>
  			<p>
  				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
  				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
  					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
  					<?php foreach ( $menus as $menu ) : ?>
  						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
  							<?php echo esc_html( $menu->name ); ?>
  						</option>
  					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}

} // class Global_Navigation_Widget

add_action( 'widgets_init', function(){
	register_widget( 'Global_Navigation_Widget' );
});
