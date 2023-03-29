<?php
/**
 * esell functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package esell
 */

if ( ! defined( '_esell_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_esell_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function esell_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on esell, use a find and replace
		* to change 'esell' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'esell', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'esell' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'esell_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'esell_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function esell_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'esell_content_width', 640 );
}
add_action( 'after_setup_theme', 'esell_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esell_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'esell' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'esell' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'esell_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function esell_scripts() {
	wp_enqueue_style( 'esell-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-fontawesome', get_stylesheet_directory_uri() . '/assets/css/all-fontawesome.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-animatemin', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-magnific-popup', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-nice-select', get_stylesheet_directory_uri() . '/assets/css/nice-select.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-jquery-ui', get_stylesheet_directory_uri() . '/assets/css/jquery-ui.min.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-main-sty', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), _esell_VERSION, false);
	wp_enqueue_style( 'esell-style', get_stylesheet_uri(), array(), _esell_VERSION );
	wp_style_add_data( 'esell-style', 'rtl', 'replace' );

	wp_enqueue_script( 'esell-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), _esell_VERSION, false );
	wp_enqueue_script( 'esell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-modernizer', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-imagesloaded-pkdg', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-isotops-pkdg', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-counter-upl', get_template_directory_uri() . '/assets/js/counter-up.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-cmasonry-pkgd-min', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-jquery-ui-min', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), _esell_VERSION, true );
	wp_enqueue_script( 'esell-main', get_template_directory_uri() . '/assets/js/main.js', array(), _esell_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'esell_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

