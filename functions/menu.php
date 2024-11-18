<?php
// Register menus
register_nav_menus(
	array(
		'main-nav'		=> __( 'Main Menu', 'balefire' ),		// Main nav in header
		'secondary-nav'		=> __( 'Secondary Navigation', 'balefire' ),		// Secondary nav
		'ancillary-nav'		=> __( 'Ancillary Navigation', 'balefire' ),		// Secondary nav
		//'offcanvas-nav'	=> __( 'Off-Canvas Menu', 'balefire' ),	// Off-Canvas nav
		'footer-links'	=> __( 'Footer Menu', 'balefire' )			// Secondary nav in footer
	)
);

// The Top Menu
function balefire_top_nav() {
	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> 'main-nav',					// Adding custom nav id
		//'menu_class'		=> 'medium-horizontal menu',	// Adding custom nav class
		//'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
		'items_wrap'		=> '<ul id="%1$s" class="nav">%3$s</ul>',
		'theme_location'	=> 'main-nav',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker()
	));
}

// The Secondary Menu (if you need one)
function secondary_nav() {
	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> 'secondary-nav',					// Adding custom nav id
		//'menu_class'		=> 'medium-horizontal menu',	// Adding custom nav class
		//'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
		'items_wrap'		=> '<ul id="%1$s" class="nav">%3$s</ul>',
		'theme_location'	=> 'secondary-nav',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker()
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
}

// The Ancillary Menu
function ancillary_nav() {
	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> 'ancillary-nav',					// Adding custom nav id
		//'menu_class'		=> 'medium-horizontal menu',	// Adding custom nav class
		//'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
		'items_wrap'		=> '<ul id="%1$s" class="nav">%3$s</ul>',
		'theme_location'	=> 'ancillary-nav',					// Where it's located in the theme
		'depth'				=> 0,							// Limit the depth of the nav
		'fallback_cb'		=> '',						// Fallback function (see below)
	));
}


// The Footer Menu
function balefire_footer_links() {
	wp_nav_menu(array(
		'container'			=> 'false',				// Remove nav container
		'menu_id'			=> 'footer-links',		// Adding custom nav id
		'menu_class'		=> 'menu',				// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="nav">%3$s</ul>',
		'theme_location'	=> 'footer-links',		// Where it's located in the theme
		'depth'				=> 0,					// Limit the depth of the nav
		'fallback_cb'		=> ''					// Fallback function
	));
} /* End Footer Menu */


// Add active class to menu
function required_active_nav_class( $classes, $item ) {
	if ( $item->current == 1 || $item->current_item_ancestor == true ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );