<?php
/**
 * Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */
/**
 * Class Name: WP_Custom_Navwalker
 */
/* Check if Class Exists. */
if ( ! class_exists( 'WP_Custom_Navwalker' ) ) {
	/**
	 * WP_Custom_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_Custom_Navwalker extends Walker_Nav_Menu {

		private $current_item;

		/**
		 * Start Level.
		 *
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @access public
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @param int   $depth (default: 0) Depth of page. Used for padding.
		 * @param array $args (default: array()) Arguments.
		 * @return void
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {

			$item = $this->current_item;
			$slug = sanitize_title( $item->title );
			$menu_prefix = $this->is_dropdown($item) ? 'dropdown' : 'sub';
			$classes = ' ' . $menu_prefix . '-menu ' . $menu_prefix . '-menu--' . $slug;
			/* Styles */
			$color = $this->get_acf_color($item);
			$style_values = '';
			$style_values .= $color ? 'background-color:' . $color : '';
			$style_values = $style_values ? ' style="' . esc_attr( $style_values ) . '"' : '';

			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" \n$style_values class=\"\n$classes\"\n>";
		}
		/**
		 * Get Color value for item
		 * @param  obj $item
		 * @return string
		 */
		public function get_acf_color($item){
			/* Styles w/ Colors */
			$is_taxon = $item->type == 'taxonomy';
			$current_obj = $is_taxon ? 'category_' . $item->object_id : $item;
			$color = get_field('color', $current_obj);
			return $color ? $color : '';
		}
		/**
		 * Show children as dropdown
		 * @param  obj $item
		 * @return string
		 */
		public function is_dropdown($item){
			$is_taxon = $item->type == 'taxonomy';
			$current_obj = $is_taxon ? 'category_' . $item->object_id : $item;
			return get_field('show_dropdown', $current_obj);
		}
		/**
		 * Start El.
		 *
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @access public
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @param mixed $item Menu item data object.
		 * @param int   $depth (default: 0) Depth of menu item. Used for padding.
		 * @param array $args (default: array()) Arguments.
		 * @param int   $id (default: 0) Menu item ID.
		 * @return void
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			/* Save Current Item to instance */
			$this->current_item = $item;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			/**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$value       = '';

				/* Styles  */
				$style_value 		= '';
				$style_values 	= $style_value;
				$styles    			= array();
				$style_values 	= join( ' ', apply_filters( 'nav_menu_css_styles', array_filter( $styles ), $item, $args, $depth ) );
				/* Styles w/ Colors */
				$color = $this->get_acf_color($item);
				$style_values .= $color ? 'border-bottom-color:' . $color . ';' : '';


				/* Class Names */
				$class_names = $value;
				$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[]	 = 'navbar-nav-item';
				$classes[]   = 'menu-item-' . $item->ID;
				$classes[]   = 'navbar-nav-item--' . sanitize_title( $item->title );
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
				if ( isset( $args->has_children ) && $args->has_children ) {
					$dropdown_class = $this->is_dropdown($item) ? ' dropdown' : ' navbar-nav-item--sub-menu';
					$class_names .= $dropdown_class;
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names 	.= ' active';
					$style_values .= $color ? 'background-color:' . $color . '; color: #ffffff' : '';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$style_values = $style_values ? ' style="' . esc_attr( $style_values ) . '"' : '';
				/* Other */
				$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output     .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . $style_values . '>';
				$atts        = array();
				if ( empty( $item->attr_title ) ) {
					$atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
				} else {
					$atts['title'] = $item->attr_title;
				}
				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
				// If item has_children add atts to a.
				if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $this->is_dropdown($item) ) {
					$atts['href']          = '#';
					$atts['data-toggle']   = 'dropdown';
					$atts['class']         = 'navbar-nav-item dropdown-toggle';
					$atts['aria-haspopup'] = 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts            = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
				$icon_attributes = '';
				$attributes      = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
						// if item has icon, we want all except title attributes because we
						// want to avoid link title to be icon class.
						if ( 'title' != $attr ) {
							$icon_attributes .= ' ' . $attr . '="' . $value . '"';
						}
					}
				}
				$item_output = isset( $args->before ) ? $args->before : '';
				/*
				 * Glyphicons/Font-Awesome
				 * ===========
				 * Since the the menu item is NOT a Divider or Header we check the see
				 * if there is a value in the attr_title property. If the attr_title
				 * property is NOT null we apply it as the class name for the glyphicon.
				 */
				if ( ! empty( $item->attr_title ) ) {
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) {
						$item_output .= '<a' . $icon_attributes . ' class="nav-link--' . esc_attr( $item->title ) . '" title="' . esc_attr( $item->title ) . '"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					} else {
						$item_output .= '<a' . $icon_attributes . ' class="nav-link--' . esc_attr( $item->title ) . '" title="' . esc_attr( $item->title ) . '"><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					}
				} elseif (!empty( $item->title )) {
					$item_output .= '<a class="nav-menu__link--'. sanitize_title($item->title).'"' . $attributes . '>';
				} else {
					$item_output .= '<a' . $attributes . '>';
				}
				$item_output .= isset( $args->link_before ) ? $args->link_before : '';
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= isset( $args->link_after ) ? $args->link_after: '';
				$item_output .= ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $this->is_dropdown($item) ) ? ' <span class="caret"></span></a>' : '</a>';
				$item_output .= isset( $args->after ) ? $args->after : '';
				$output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			} // End if().
		}
		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @access public
		 * @param mixed $element Data object.
		 * @param mixed $children_elements List of elements to continue traversing.
		 * @param mixed $max_depth Max depth to traverse.
		 * @param mixed $depth Depth of current element.
		 * @param mixed $args Arguments.
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a menu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'edit_theme_options' ) ) {
				/* Get Arguments. */
				$container       = $args['container'];
				$container_id    = $args['container_id'];
				$container_class = $args['container_class'];
				$menu_class      = $args['menu_class'];
				$menu_id         = $args['menu_id'];
				if ( $container ) {
					echo '<' . esc_attr( $container );
					if ( $container_id ) {
						echo ' id="' . esc_attr( $container_id ) . '"';
					}
					if ( $container_class ) {
						echo ' class="' . esc_attr( $container_class ) . '"'; }
					echo '>';
				}
				echo '<ul';
				if ( $menu_id ) {
					echo ' id="' . esc_attr( $menu_id ) . '"'; }
				if ( $menu_class ) {
					echo ' class="' . esc_attr( $menu_class ) . '"'; }
				echo '>';
				echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', '' ) . '</a></li>';
				echo '</ul>';
				if ( $container ) {
					echo '</' . esc_attr( $container ) . '>'; }
			}
		}
	}
} // End if().
