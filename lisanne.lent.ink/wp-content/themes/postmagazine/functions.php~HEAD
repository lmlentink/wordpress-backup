<?php
/**
 * PostMagazine functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package PostMagazine
 */

if ( ! function_exists( 'postmagazine_setup' ) ) :

	// Set the default content width.
		$GLOBALS['content_width'] = 1150;
		
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function postmagazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on PostMagazine, use a find and replace
		 * to change 'postmagazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'postmagazine', get_template_directory() . '/languages' );

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
		
		// create recent posts thumbnails
		add_image_size( 'recent', 340, 75, true );
		
		// Featured sticky thumbnail
		if (get_theme_mod( 'postmagazine_show_fpsticky', false ) ) : 
			add_image_size( 'postmagazine-featured-sticky', 480, 320, true );
		endif;	
					
		// create related posts thumbnails
		if( get_theme_mod( 'postmagazine_related_post_thumbnails', false ) ) :
			add_image_size( 'postmagazine-related-posts', 210, 150, true );
		endif;
		
		// create featured images for the default blog style
		if( get_theme_mod( 'postmagazine_default_thumbnails', false ) ) :
			add_image_size( 'postmagazine-default', 750, 400, true );
		endif;
		
		// create featured images for the list blog style
		if(get_theme_mod( 'postmagazine_list_thumbnails', false ) ) :
			add_image_size( 'postmagazine-list', 440, 275, true );
		endif;
		
		// create featured images for the single post thumbnail
		if( get_theme_mod( 'postmagazine_singlepost_thumbnails', false ) ) :
			add_image_size( 'postmagazine-singlepost', 750, 500, true );
		endif;
		
		// Create slides
		if( get_theme_mod( 'postmagazine_show_slider', false ) ) :	
			$slidesize = esc_attr(get_theme_mod( 'postmagazine_slide_width' ));			
				add_image_size( 'postmagazine-slide', $slidesize, 620, true );						
		endif;
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'postmagazine' ),
			'footer' => esc_html__( 'Footer', 'postmagazine' ),
			'social' => esc_html__( 'Social', 'postmagazine' ),
		) );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'postmagazine_custom_background_args', array(
			'default-color' => 'f5f4ec',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( array( '/css/editor.css', postmagazine_fonts_url() ) );
		
	}
endif;
add_action( 'after_setup_theme', 'postmagazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function postmagazine_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'pageleft'  ) || is_active_sidebar( 'pageright' ) || is_active_sidebar( 'blogleft' ) || is_active_sidebar( 'blogright' ) ) {
		$content_width = 750;
	}
  $GLOBALS['content_width'] = apply_filters( 'postmagazine_content_width', $content_width );
}
add_action( 'template_redirect', 'postmagazine_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! function_exists( 'postmagazine_fonts_url' ) ) :

function postmagazine_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// Translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language.
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'postmagazine' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	// Translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'postmagazine' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;


/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function postmagazine_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'postmagazine-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'postmagazine_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function postmagazine_scripts() {
	
	if( esc_attr(get_theme_mod( 'postmagazine_fa5', true ) ) ) :
		// FontAwesome 5
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome5.css', array(), '5.0.8' );
	endif; 
	
	if( esc_attr(get_theme_mod( 'postmagazine_fa4', false ) ) ) :
		// Font Awesome 4
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome4.css', '', '4.7.0' );
	endif;
	
	// fonts
	wp_enqueue_style( 'postmagazine-fonts', postmagazine_fonts_url(), array(), null );	

	// stylesheets	
	wp_enqueue_style( 'postmagazine-style', get_stylesheet_uri() );
	
	// scripts - for load speed, use an optimization based plugin
	wp_enqueue_script( 'superfish-navigation', get_template_directory_uri() . '/js/superfish.js', array('jquery'), '1.7.10', true );
	wp_enqueue_script( 'postmagazine-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '2.0.0', true );
	
	// give the user option to enable the slick slider
	if( esc_attr(get_theme_mod( 'postmagazine_show_slider', false ) ) ) :
		wp_enqueue_script( 'postmagazine-scripts', get_theme_file_uri( '/js/slick-slider.js' ), array( 'jquery' ), '2.0.0', true );
	endif;	
	
	wp_enqueue_script( 'postmagazine-scripts', get_theme_file_uri( '/js/theme-scripts.js' ), array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'postmagazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );	
	
	// comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'postmagazine_scripts' );

// Theme info pagage class
require_once get_template_directory() . '/inc/theme-info/postmagazine-info-class-about.php';

// Theme Info Page
require get_template_directory() . '/inc/theme-info/postmagazine-info.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Register custom widgets	
require get_template_directory() . '/inc/widgets/class-postmagazine-recent-posts-widget.php';
register_widget( 'PostMagazine_Recent_Posts_Widget' );
	
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load CSS overrides from user based changes from the customizer
require get_template_directory() . '/inc/inline-styles.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
