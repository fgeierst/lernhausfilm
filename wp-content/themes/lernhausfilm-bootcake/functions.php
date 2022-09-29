<?php
/**
 * bootcake functions and definitions
 *
 * @package bootcake
 */

if ( ! function_exists( 'bootcake_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootcake_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootcake, use a find and replace
	 * to change 'bootcake' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootcake', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );



 	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bootcake' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootcake_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bootcake_setup
add_action( 'after_setup_theme', 'bootcake_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootcake_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootcake_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootcake_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bootcake_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bootcake' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bootcake_widgets_init' );

/**
 * Enqueue scripts and styles.
 */


function bootcake_scripts() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
		wp_enqueue_style( 'bootcake-fonts','//fonts.googleapis.com/css?family='.get_theme_mod('themescode-body-font-name').'');
		wp_enqueue_style( 'bootcake-style', get_stylesheet_uri() );
		 
		//  javascript 
		wp_enqueue_script('bootstrap-js',   get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'));
		wp_enqueue_script('bootcake-js',      get_template_directory_uri() . '/assets/js/custom.js', array('jquery'));
       
       // Add Font Awesome stylesheet
        wp_enqueue_style( 'bootcake-icons', get_template_directory_uri().'/assets/css/font-awesome.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootcake_scripts' );
/**
*adding footer info
*/
function bootcake_footer() {

  printf( 'Made with <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 57.5 44.7" viewBox="0 0 57.5 44.7" style="height: .7em;" alt="Brezn"><g transform="translate(1080 417)"><defs><filter id="a" width="1" height=".3" x="-1058.7" y="-407.8" filterUnits="userSpaceOnUse"><feColorMatrix values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 1 0"/></filter></defs><mask id="b" width="1" height=".3" x="-1058.7" y="-407.8" maskUnits="userSpaceOnUse"><path fill="#fff" fill-rule="evenodd" d="M-1023.4-372.5h-56.6V-417h56.6z" clip-rule="evenodd" filter="url(#a)"/></mask><path fill="#7f7f7f" fill-rule="evenodd" d="M-1058.7-407.8l1 .3-1-.3z" clip-rule="evenodd" mask="url(#b)"/><path fill="#7f7f7f" fill-rule="evenodd" d="M-1022.8-395.2c.4-2.3.4-4.8 0-7.1-.7-4.2-2.7-7.7-5.9-10.3a18.5 18.5 0 0 0-9.4-4l-2.7-.2c-3.2 0-6.2.8-8.9 2.3l-1.4.9-1.4-.9c-1.7-.9-3.4-1.5-5.2-1.9v-.1c-1.3-.3-2.7-.4-4.1-.4l-2.7.2a18 18 0 0 0-9.4 4 16.6 16.6 0 0 0-5.9 10.4c-.4 2.3-.4 4.8 0 7.1.8 4.6 3 8.7 6.5 12.2l.1-.1 1.5 1.4-.2.2-2 1.6a4.3 4.3 0 0 0 2.7 7.7c1 0 2-.4 2.9-1.1l4.4-3.7c3.1 1.4 6.5 2.2 9.9 2.5l2.8.1c4.3 0 8.5-.9 12.7-2.6a131 131 0 0 0 4.6 3.8 4.4 4.4 0 0 0 6-.6 4.3 4.3 0 0 0-.3-6.1l-2.2-1.8-.3-.2c4.4-3.6 7-8.1 7.9-13.3zm-33.9-2.1l-.8 1.1a64.1 64.1 0 0 1-7.5 8.4c-1.6-1.2-3-2.6-4-4.3h-.2c-.8-1.3-1.4-2.8-1.7-4.3-.4-2-.4-3.8.2-5.8.4-1.2.9-2.1 1.6-3a8.9 8.9 0 0 1 5.8-3h.5l1.2-.1c1.1 0 2.1.2 3.1.5l1 .3c.5.2 1.1.5 1.6 1-.6 2.3-.6 4.6 0 6.7.3.8.2 1.3-.3 1.9l-.3.4-.2.2zm25.2 1.1a14 14 0 0 1-5.7 8.5l-1.4-1.4-3.6-3.8c-1.3-1.5-2.4-3-3.4-4.5a30 30 0 0 1-4.8 8.3c1.5 2 3.1 3.7 4.7 5.3-3.7.9-7.3.9-10.9 0l4.3-4.8a32.6 32.6 0 0 0 4.7-7.4 15 15 0 0 0 1.5-9.5c-2.6.7-5.2 2.7-6.9 4.6 1.2-2.3 3.5-4 5.9-5.3a13.2 13.2 0 0 1 7.8-1.7c2.4.3 4.3 1.3 5.8 3 .7.8 1.3 1.8 1.6 3 .8 1.9.8 3.7.4 5.7z" clip-rule="evenodd"/></g></svg> in Munich | <a href="http://lernhausfilm.de/datenschutz/">Datenschutz</a> | <a href="http://lernhausfilm.de/team/">Team</a> | <a href="http://lernhausfilm.de/kontakt/">Kontakt</a>');
}
 
/*-------------------------------------------
*           Customizer
*--------------------------------------------*/
//require_once( get_template_directory()  . '/lib/customizer/libs/googlefonts.php');
//require_once( get_template_directory()  . '/lib/customizer/customizer.php');

require_once( get_template_directory()  . '/lib/customizer-library/customizer-library.php');

require_once( get_template_directory()  . '/lib/theme-options.php');
/**
 * Custom template tags for this theme.
 */
 
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Bootstrap navigation include
*/
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
/* my*/
/* * * Theme Default Setup ** */
require get_template_directory() . '/inc/theme-default-setup.php';

/* * * Breadcrumbs ** */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Exclude Category (ID 7) From Blog Page
 * https://zemez.io/wordpress/support/how-to/exclude-category-blog-page/
 */

function exclude_category_home( $query ) {
if ( $query->is_home ) {
$query->set( 'cat', '-7' );
}
return $query;
}
 
add_filter( 'pre_get_posts', 'exclude_category_home' );


// ============================
// REMOVE RSS links FROM header
// =============================

		remove_action('wp_head', 'feed_links', 2); // remove rss feed links
		

