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
 * Register CUSTOM custom post type(location, Services) 
 */
require get_template_directory() . '/inc/cpt-dash.php';

/**
 * Impletemt option page in wp dashboard
 */
require get_template_directory() . '/inc/theme-option.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/addscript.php';

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
 * User login and register.
 */
require get_template_directory() . '/inc/wc-auth.php';

/**
 * banner field for product vendor woocommerce plugin.
 */
require get_template_directory() . '/inc/vendor-banner.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Update product views count
function update_product_views_count() {
    if (is_singular('product')) {
        global $post;
        $product_id = $post->ID;

        $views = (int) get_post_meta($product_id, 'product_views', true);
        $views++;

        update_post_meta($product_id, 'product_views', $views);
    }
}
add_action('wp', 'update_product_views_count');

// Display product views count
function display_product_views_count() {
    if (is_singular('product')) {
        global $post;
        $product_id = $post->ID;

        $views = (int) get_post_meta($product_id, 'product_views', true);
        echo 'Views: ' . $views;
    }
}

// disable aad to cart from store
function disable_add_to_cart() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
add_action( 'init', 'disable_add_to_cart' );


// Add filter to modify the product query for vendors
add_filter('dokan_product_listing_query', 'restrict_vendor_product_images', 10, 2);

function restrict_vendor_product_images($args, $query) {
    // Check if the current user is a vendor
    if (dokan_is_user_seller(get_current_user_id())) {
        // Get the current vendor ID
        $vendor_id = dokan_get_current_user_id();

        // Modify the query to exclude product images from other vendors
        $args['meta_query'][] = array(
            'key'     => '_vendor_id',
            'value'   => $vendor_id,
            'compare' => '=',
        );
    }

    return $args;
}
//acf map
// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyC72HFD7TrxeGNFn3z-J_VDkReXJCQK95I');
}
add_action('acf/init', 'my_acf_init');

//redirect annomous user to login page 
function redirect_unlogged_users() {
    // Define the restricted pages slugs
    $restricted_pages = array( 'dashboard', 'my-ads', 'post-ad', 'profile-setting', 'profile-setting', 'profile' );

    // Check if the user is not logged in and trying to access a restricted page
    if ( ! is_user_logged_in() && in_array( get_post_field( 'post_name' ), $restricted_pages ) ) {
        // Redirect to the register page
        wp_redirect( site_url( '/login/' ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_unlogged_users' );

// credentials verification
function create_product_via_api($product_data) {
    // WooCommerce API credentials
    $consumer_key = 'ck_3b1cfe2add0a1811720f3c5acc7abd65ad78efd6';
    $consumer_secret = 'cs_6e6c98a2393bd22820507d4b540e56d1d1d8b32c';

    // WooCommerce API URL
    $api_url = 'https://staging.e-sell.today/wp-json/wc/v3/products';

    // Prepare the authentication parameters
    $auth_params = [
        'consumer_key' => $consumer_key,
        'consumer_secret' => $consumer_secret,
    ];

    // Make the API request
    $response = wp_remote_post(
        $api_url,
        [
            'method' => 'POST',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode($product_data),
            'timeout' => 45,
            'sslverify' => false,
            'authentication' => 'basic',
            'auth' => $auth_params,
        ]
    );

    // Check the response status
    $response_code = wp_remote_retrieve_response_code($response);
    if ($response_code === 201) {
        // Product created successfully
        return true;
    } else {
        // Error creating product
        $error_message = wp_remote_retrieve_response_message($response);
        return new WP_Error($response_code, $error_message);
    }
}


//transfer data from frontend
function publish_product() {
    if (isset($_POST['submit'])) {
        $title = sanitize_text_field($_POST['product-title']);
        $category = intval($_POST['product-category']);
        $price = floatval($_POST['product-price']);
        $tags = sanitize_text_field($_POST['product-tag']);
        $images = $_FILES['product-images'];
        $location = array(
            'address' => sanitize_text_field($_POST['user-location']),
            'city' => sanitize_text_field($_POST['user-city']),
            'state' => sanitize_text_field($_POST['user-state']),
            'zip' => sanitize_text_field($_POST['user-zip'])
        );
        $description = sanitize_textarea_field($_POST['product-description']);
        $contactName = sanitize_text_field($_POST['contact-name']);
        $contactEmail = sanitize_email($_POST['contact-email']);
        $contactPhone = sanitize_text_field($_POST['contact-phone']);

        // Create a new post of 'product' post type
        $newProduct = array(
            'post_title' => $title,
            'post_content' => $description,
            'post_status' => 'publish',
            'post_type' => 'product'
        );
        $productID = wp_insert_post($newProduct);

        // Set product category
        wp_set_object_terms($productID, $category, 'product_cat');

        // Set product price as a meta field
        update_post_meta($productID, 'product_price', $price);

        // Set product tags
        wp_set_post_tags($productID, $tags);

        // Upload and attach product images
        $attachmentIDs = array();
        foreach ($images['name'] as $key => $image) {
            if ($images['error'][$key] === UPLOAD_ERR_OK) {
                $uploadFile = wp_handle_upload($images, array('test_form' => false));
                if ($uploadFile && !isset($uploadFile['error'])) {
                    $attachment = array(
                        'post_mime_type' => $uploadFile['type'],
                        'post_title' => sanitize_file_name($uploadFile['file']),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attachmentID = wp_insert_attachment($attachment, $uploadFile['file'], $productID);
                    if (!is_wp_error($attachmentID)) {
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attachmentData = wp_generate_attachment_metadata($attachmentID, $uploadFile['file']);
                        wp_update_attachment_metadata($attachmentID, $attachmentData);
                        $attachmentIDs[] = $attachmentID;
                    }
                }
            }
        }
        // Set featured image (first uploaded image)
        if (!empty($attachmentIDs)) {
            set_post_thumbnail($productID, $attachmentIDs[0]);
        }

        // Set product location as meta fields
        update_post_meta($productID, 'product_location', $location);

        // Set contact information as meta fields
        update_post_meta($productID, 'contact_name', $contactName);
        update_post_meta($productID, 'contact_email', $contactEmail);
        update_post_meta($productID, 'contact_phone', $contactPhone);
    }
}

add_action('init', 'publish_product');
