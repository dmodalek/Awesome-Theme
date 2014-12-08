<?php

/**
 * Enqueue scripts and styles for front end.
 *
 * @return void
 */

function theme_scripts() {

	wp_deregister_script('jquery');

	wp_register_style('theme-styles', get_template_directory_uri() . '/built/styles.css', array(), false, 'all');
	wp_register_script('theme', get_template_directory_uri() . '/built/scripts.js', array(), false, true);

	wp_enqueue_style('theme-styles');
	wp_enqueue_script('theme');
}

add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Hide Adminbar for all users
 */

add_filter('show_admin_bar', '__return_false');

/**
 * Removes stylesheets added by plugins
 */

add_action('wp_enqueue_scripts', 'remove_plugin_stylesheets', 1000);

function remove_plugin_stylesheets() {
	wp_deregister_style('contact-form-7');
}


/**
 * Register our sidebars and widgetized areas.
 */

add_action('widgets_init', 'widgets_init');

function widgets_init() {

	register_sidebar( array(
		'name' => 'Footer',
		'id' => 'footer',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	));
}


/**
 * Remove some admin pages for authors
 */

add_action('admin_init', 'my_remove_menu_pages');

function my_remove_menu_pages() {

    global $user_ID;

    if ( current_user_can('author') ) {
		remove_menu_page('index.php'); 			// Dashboard
		remove_menu_page('edit.php'); 			// Posts
		remove_menu_page('upload.php'); 		// Media
		remove_menu_page('edit-comments.php'); 	// Comments
		remove_menu_page('tools.php'); 			// Tools
    }
}


/**
 * Extend the default WordPress body classes.
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */

add_filter('body_class', 'theme_body_classes');

function theme_body_classes( $classes ) {

	if(APP_ENV == 'dev') { $classes[] = 'layout-dev'; }

	if(is_front_page()) { $classes[] = 'skin-layout-home'; }

	return $classes;
}


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

add_filter('wp_title', 'theme_wp_title', 10, 2);

function theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'theme' ), max( $paged, $page ) );
	}

	return $title;
}


/**
 * Tiny MCE customisations
 *
 * @link http://www.kathyisawesome.com/506/custom-styles-for-wordpress-3-9
 */

add_filter('tiny_mce_before_init', 'theme_tiny_mce_before_init');

function theme_tiny_mce_before_init(array $opts) {

	// Add .richtext class to tiny mce
	$opts['body_class'] = 'richtext';

	// Define Styles in Dropdown
	$opts['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3';

	// Add custom Format for Format Button, see next Function
	$style_formats = array (
    	array( 'title' => 'Intro Text', 'block' => 'p', 'classes' => 'intro' ),
	);
    $opts['style_formats'] = json_encode( $style_formats );
    $opts['style_formats_merge'] = false;

	return $opts;
}

// Add Format Button to Tiny MCE

add_filter('mce_buttons_2', 'theme_mce_buttons_2');

function theme_mce_buttons_2( $buttons ){
    array_splice( $buttons, 1, 0, 'styleselect' );
    return $buttons;
}


/**
 * Remove empty <p> tags that are inserted in content
 */

add_filter('the_content', 'remove_empty_p', 20, 1);

function remove_empty_p($content) {
	$content = preg_replace(array(
		'#<p>\s*<(div|aside|section|article|header|footer)#',
		'#</(div|aside|section|article|header|footer)>\s*</p>#',
		'#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content);

	return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);
}

?>