<?php

// Fire all our initial functions at the start
add_action( 'after_setup_theme', 'balefire_start', 16 );

function balefire_start() {

	// launching operation cleanup
	add_action( 'init', 'balefire_head_cleanup' );

	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'balefire_remove_wp_widget_recent_comments_style', 1 );

	// clean up comment styles in the head
	add_action( 'wp_head', 'balefire_remove_recent_comments_style', 1 );

	// clean up gallery output in wp
	add_filter( 'gallery_style', 'balefire_gallery_style' );

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'balefire_excerpt_more' );
} /* end Balefire start */

// The default WordPress head is a mess. Let's clean it up by removing all the junk we don't need.
function balefire_head_cleanup() {
	// Remove category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// Remove EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove WP version
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_action( 'wp_head', 'wp_resource_hints', 2 ); // remove <link rel='dns-prefetch' href='//s.w.org' />
	remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 ); // fixes shared IP SSLs
} /* end Balefire head cleanup */

// Remove injected CSS for recent comments widget
function balefire_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// Remove injected CSS from recent comments widget
function balefire_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

// Remove injected CSS from gallery
function balefire_gallery_style( $css ) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// This removes the annoying […] to a Read More link
function balefire_excerpt_more( $more ) {
	global $post;
	// edit here if you like
	return '&hellip; ' . '<a class="excerpt-read-more" href="' . get_permalink( $post->ID ) . '" title="' . __( 'Read', 'balefire' ) . get_the_title( $post->ID ) . '">' . __( 'Read More &raquo;', 'balefire' ) . '</a>';
}

// Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class( $classes ) {
	if ( in_array( 'sticky', $classes ) ) {
		$classes   = array_diff( $classes, array( 'sticky' ) );
		$classes[] = 'wp-sticky';
	}

	return $classes;
}
add_filter( 'post_class', 'remove_sticky_class' );

// This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function balefire_get_the_author_posts_link() {
	global $authordata;
	if ( ! is_object( $authordata ) ) {
		return false;
	}
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s', 'balefire' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

/*
------------------------------------*\
	Style and Script Cleanup
\*------------------------------------*/

/*
Remove Query String from Static Resources */
// this can break Google Maps API key, so disable this if needed
function remove_query_strings() {
	if ( ! is_admin() ) {
		add_filter( 'script_loader_src', 'remove_query_strings_split', 15 );
		add_filter( 'style_loader_src', 'remove_query_strings_split', 15 );
	}
}
function remove_query_strings_split( $src ) {
	$output = preg_split( '/(&ver|\?ver)/', $src );
	return $output[0];
}
add_action( 'init', 'remove_query_strings' );

// Dequeue Styles
// use if combining css/js
// add_action( 'wp_print_styles', 'balefire_dequeue_styles' );
function balefire_dequeue_styles() {
	// wp_dequeue_style('bfa-font-awesome');
	// wp_deregister_style('bfa-font-awesome');
}
// add_action( 'wp_dequeue_script', 'balefire_dequeue_scripts' );
function balefire_dequeue_scripts() {
	// wp_dequeue_script('fts-popup-js');
	// wp_deregister_script('fts-popup-js');
}

// TURN ON TO CHECK FOR JS/CSS HANDLES, turn off js_to_footer function too
/*
function detect_enqueued_scripts() {
	global $wp_scripts;
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}
add_action( 'wp_print_scripts', 'detect_enqueued_scripts' );
function detect_enqueued_styles() {
	global $wp_styles;
	foreach( $wp_styles->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}
add_action( 'wp_print_scripts', 'detect_enqueued_styles' );
*/

// defer js
function balefire_defer_scripts( $tag, $handle, $src ) {
	if ( is_admin() ) {
		return $tag;
	}
	if ( 'jquery' !== $handle ) {
		return str_replace( ' src=', ' defer="defer" src=', $tag );
	}
	return $tag;
}
// add_filter('script_loader_tag', 'balefire_defer_scripts', 10, 3);


// Add page slug to body class
add_filter( 'body_class', 'add_slug_to_body_class' );
function add_slug_to_body_class( $classes ) {
	global $post;
	if ( is_home() ) {
		$key = array_search( 'blog', $classes );
		if ( $key > -1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}
	return $classes;
}

// change archive titles
add_filter(
	'get_the_archive_title',
	function ( $title ) {
		return preg_replace( '/^\w+: /', '', $title );
	}
);

// REMOVE UNNECESSARY CLASSES
add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 );
add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 );
function my_css_attributes_filter( $var ) {
	return is_array( $var ) ? array_intersect( $var, array( 'current-menu-item', 'menu-item-has-children' ) ) : '';
}

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );

function modify_query_order($query) {
    if (!is_admin() && $query->is_main_query()) {
        $query->set('order', 'ASC');
        $query->set('orderby', 'date');
    }
}
add_action('pre_get_posts', 'modify_query_order');