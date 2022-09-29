<?php
add_action('after_setup_theme', 'lernhausfilm_setup');
function lernhausfilm_setup()
{
	load_theme_textdomain('lernhausfilm', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form'));
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(array(
		'main-menu' => esc_html__('Main Menu', 'lernhausfilm'),
		'secondary-menu' => esc_html__('Secondary Menu', 'lernhausfilm')

));
}
add_action('wp_enqueue_scripts', 'lernhausfilm_load_scripts');
function lernhausfilm_load_scripts()
{
	wp_enqueue_style('lernhausfilm-style', get_stylesheet_uri());
	// wp_enqueue_script('jquery');
}
add_action('wp_footer', 'lernhausfilm_footer_scripts');
function lernhausfilm_footer_scripts()
{
?>

<?php
}
add_filter('document_title_separator', 'lernhausfilm_document_title_separator');
function lernhausfilm_document_title_separator($sep)
{
	$sep = '|';
	return $sep;
}
add_filter('the_title', 'lernhausfilm_title');
function lernhausfilm_title($title)
{
	if ($title == '') {
		return '...';
	} else {
		return $title;
	}
}
add_filter('the_content_more_link', 'lernhausfilm_read_more_link');
function lernhausfilm_read_more_link()
{
	if (!is_admin()) {
		return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
	}
}
add_filter('excerpt_more', 'lernhausfilm_excerpt_read_more_link');
function lernhausfilm_excerpt_read_more_link($more)
{
	if (!is_admin()) {
		global $post;
		return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
	}
}
add_filter('intermediate_image_sizes_advanced', 'lernhausfilm_image_insert_override');
function lernhausfilm_image_insert_override($sizes)
{
	unset($sizes['medium_large']);
	return $sizes;
}
add_action('widgets_init', 'lernhausfilm_widgets_init');
function lernhausfilm_widgets_init()
{
	register_sidebar(array(
		'name' => esc_html__('Sidebar Widget Area', 'lernhausfilm'),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('wp_head', 'lernhausfilm_pingback_header');
function lernhausfilm_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('comment_form_before', 'lernhausfilm_enqueue_comment_reply_script');
function lernhausfilm_enqueue_comment_reply_script()
{
	if (get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
function lernhausfilm_custom_pings($comment)
{
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'lernhausfilm_comment_count', 0);
function lernhausfilm_comment_count($count)
{
	if (!is_admin()) {
		global $id;
		$get_comments = get_comments('status=approve&post_id=' . $id);
		$comments_by_type = separate_comments($get_comments);
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

// load google font 
// function load_google_fonts()
// {
// 	wp_register_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Recursive&display=swap');
// 	wp_enqueue_style('googleFonts');
// }
// add_action('wp_print_styles', 'load_google_fonts');

// disable emojis 
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery()
{
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');

// add wide and full width blocks support
add_theme_support( 'align-wide' );

/**
 * Registers support for Gutenberg features.
 */
function theme_slug_gutenberg_support() {

	// Add theme support for custom color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Primary', 'theme-slug' ),
			'slug'  => 'primary',
			'color' => '#E75764',
		),
		array(
			'name'  => esc_html__( 'Accent', 'theme-slug' ),
			'slug'  => 'accent',
			'color' => '#A3C9D9',
		),
		array(
			'name'  => esc_html__( 'Light Gray', 'theme-slug' ),
			'slug'  => 'light-gray',
			'color' => '#F2F2F2',
		),
		array(
			'name'  => esc_html__( 'Dark Gray', 'theme-slug' ),
			'slug'  => 'dark-gray',
			'color' => '#454647',
		),
	) );


}
add_action( 'after_setup_theme', 'theme_slug_gutenberg_support' );

add_action( 'after_setup_theme', function() {
	add_theme_support( 'responsive-embeds' );
} );

/**
* add SVG to allowed file uploads
**/
function add_file_types_to_uploads($file_types){

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	
	return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads'); 

	function kb_ignore_upload_ext($checked, $file, $filename, $mimes){

		if(!$checked['type']){
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;
	 
		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
		$ext = $type = false;
		}
	 
		$checked = compact('ext','type','proper_filename');
		}
	 
		return $checked;
	 }
	 
	 add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);