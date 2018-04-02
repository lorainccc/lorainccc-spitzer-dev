<?php
/**
 * lorainccc_subsite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lorainccc_subsite
 */



if ( ! function_exists( 'lorainccc_subsite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lorainccc_subsite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lorainccc_subsite, use a find and replace
	 * to change 'spitzer' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'spitzer', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lorainccc_subsite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lorainccc_subsite_setup' );


// Register scripts and stylesheets
require get_stylesheet_directory() . '/functions/enqueue-scripts.php';

// Register custom menus and menu walkers
require get_stylesheet_directory() . '/functions/menu.php';

// Register sidebars/widget areas
require get_stylesheet_directory() . '/functions/sidebar.php';






/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lorainccc_subsite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lorainccc_subsite_content_width', 640 );
}
add_action( 'after_setup_theme', 'lorainccc_subsite_content_width', 0 );




/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

/* Menu Functions */


/* End Menu Functions */
// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES

function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'lccc_event')
    return 30;
    else if ($post->post_type == 'lccc_announcement')
    return 70;
	// custom lenght for post excerpts on homepage
	else if ($post->post_type == 'post' && !in_category('featured') && is_front_page())
    return 15;
    else
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function lccc_custom_taxonomy_dropdown( $taxonomy ) {
	$currenttax = str_replace("%body%", "black", "<body text='%body%'>");
	$args = array(
				'orderby' => 'name',
				'order' => 'ASC',
	);
	$terms = get_terms( $taxonomy , $args );
	if ( $terms ) {
		printf( '<select name="%s" class="postform" onchange="location = this.options[this.selectedIndex].value;">', esc_attr( $taxonomy ) );
		printf('<option value="/security/daily-crime-log/">Select</option>');
		foreach ( $terms as $term ) {
			printf( '<option value="'.get_bloginfo('url').'/'.str_replace('_', '-', $taxonomy).'/%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
		}
		print( '</select>' );
	}
}

// Removing Default Jetpack Sharing Button Filters

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );


function add_paged_var($public_query_vars) {
    $public_query_vars[] = 'page';
    return $public_query_vars;
}
add_filter('query_vars', 'add_paged_var');

function do_rewrite() {
    add_rewrite_rule('day/([^/]+)/?$', 'index.php?pagename=day&d=$matches[1]','top');
}

add_action('init', 'do_rewrite');

function get_url_var($name)
{
    $strURL = $_SERVER['REQUEST_URI'];
    $arrVals = split("/",$strURL);
    $found = 0;
    foreach ($arrVals as $index => $value) 
    {
        if($value == $name) $found = $index;
    }
    $place = $found + 1;
   return $arrVals[$place];
}




/**************************************************************
Functions added by Kiwi
**************************************************************/

// Takes Hex color value, converts to rgb and adds alpha value for transparency
function color_convert($color, $alpha) {
	
		list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
		$a = $alpha;

		echo 'rgba('. $r .','. $g .','. $b .',' . $a . ')';
	
}

// This removes the brackets around the ... at the end of an excerpt
function excerpt_end($more) {
	global $post;
return '...';
}
add_filter('excerpt_more', 'excerpt_end');

// Add ACF options pages

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Visit/Contact Campana Center Settings',
		'menu_title'	=> 'Visit/Contact',
		'parent_slug'	=> 'theme-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Fallbacks/Defaults',
		'menu_title'	=> 'Fallbacks/Defaults',
		'parent_slug'	=> 'theme-settings',
	));
	
}

// remove aside tag from widgets, change h1 to h2, add class .sidebar-widget
function campana_edit_widget_output( $output ) {
	
	$output[0]['before_widget'] = str_replace( 'aside', 'div', $output[0]['before_widget'] );
	$output[0]['before_widget'] = str_replace( 'class="widget', 'class="sidebar-widget widget', $output[0]['before_widget'] );
	$output[0]['after_widget'] = str_replace( 'aside', 'div', $output[0]['after_widget'] );
	$output[0]['before_title'] = str_replace( 'h1', 'h2', $output[0]['before_title'] );
	$output[0]['after_title'] = str_replace( 'h1', 'h2', $output[0]['after_title'] );
	
	return $output;
}
add_filter( 'dynamic_sidebar_params', 'campana_edit_widget_output' );




// Hide content editor for certain pages/templates
add_action( 'admin_head', 'hide_editor' );
function hide_editor() {
	$template_file = $template_file = basename( get_page_template() );
	if($template_file == 'template-home.php' || $template_file == 'template-audience.php' || $template_file == 'template-overview.php' || $template_file == 'template-full-width.php' || $template_file == 'page.php' || $template_file == 'template-contact.php'){ 
		remove_post_type_support('page', 'editor');
	}
}

// Modify Events archive query
function modify_events_query( $events_query ) {
	if( !is_admin() && is_post_type_archive('lccc_events') && $events_query->is_main_query() ) {
		
		$today = date( 'Y-m-d' );
		$events_meta_query = array(
			array(
				'key'		=>	'event_end_date',
				'value'		=>	$today,
				'compare'	=>	'>=',
				'type'		=>	'DATE'
			)
		);
		
		$events_query->set( 'posts_per_page', 10 );
		$events_query->set( 'meta_query', $events_meta_query );
		$events_query->set( 'meta_key', 'event_start_date' );
		$events_query->set( 'order', 'ASC' );
		$events_query->set( 'orderby', 'meta_value' );
	}
}
add_action( 'pre_get_posts', 'modify_events_query', 1, 1 );

// Add tabindex="-1" to off-canvas menu

function offcanvas_tab_index() {
?>

<script>
	
	jQuery("#offCanvas ul li a, #offCanvas ul li a:first-of-type, .menu-icon, #offCanvas .gsc-search-box input#gsc-i-id1, #offCanvas .menu-item-6 a").attr("tabindex", -1);
	
</script>

<?php
}
add_action('wp_footer', 'offcanvas_tab_index', 200 );



// Customize HTML of WP Search form
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form-row"><div class="search-input"><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" /></div><div class="search-button">
    <input type="submit" id="searchsubmit" class="button" value="'. esc_attr__( 'Search' ) .'" /></div>
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );


/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

// Put span tags with .block-title around "Category" and "Tag" to make block level elements
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '<span class="block-title">Category:</span>', false);
    } elseif ( is_tag() ) {
        $title = single_tag_title( '<span class="block-title">Tag:</span>', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


add_filter('relevanssi_excerpt_content', 'custom_fields_to_excerpts', 10, 3);
function custom_fields_to_excerpts($content, $post, $query) {
    $custom_field = get_post_meta($post->ID, 'overview_top_description', true);
    $content .= " " . $custom_field;
    $custom_field = get_post_meta($post->ID, 'intro_paragraph', true);
    $content .= " " . $custom_field;
	$custom_field = get_post_meta($post->ID, 'ap_description', true);
    $content .= " " . $custom_field;
	$custom_field = get_post_meta($post->ID, 'who_we_help_description', true);
    $content .= " " . $custom_field;
    return $content;
	
}

// Initialize FadeShow on homepage

function fadeshow_init() {
	if( is_front_page() ) {
		$id = get_option('page_on_front');
		$banner_bgs = get_field('banner_images', $id);
		$speed = get_field('transition_speed', $id) * 1000;
		$bg_count = count($banner_bgs);
		$counter = 1;
?>
<script>
	jQuery('.home-banner-bg').fadeShow({
		correctRatio: true,
		shuffle: false,
		speed: <?php echo $speed; ?>,
		images: [<?php foreach($banner_bgs as $bg) : echo "'" . $bg['url'] . "'"; if($counter < $bg_count) : echo ', '; endif; $counter++; endforeach; ?>]
	});
</script>
<?php
		
	}
}
add_action('wp_footer', 'fadeshow_init', 9999);


?>