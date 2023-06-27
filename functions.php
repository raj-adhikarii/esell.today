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

function handle_custom_post_ads() {
    $ad_title = $_POST['post_title'];
    $ad_content = $_POST['description'];
    $price = $_POST['product_price'];
    $category = $_POST['post_category'];
    $tags_keyword = $_POST['tags_keyword'];
    $ad_images = $_FILES['product_images'];
	 //print_r($ad_images);
	// exit;
    $post_data = array(
        'post_title'   => $ad_title,
        'post_content' => $ad_content,
        'post_type'    => 'product',
        'post_status'  => 'draft'
    );
	$post_id=" ";
	// print_r($_POST);
	if(isset($_POST['edit_field'])){
		$post_id=$_POST['edit_field'];
		$post_data['ID']=$post_id;
		//print_r($post_data);
		wp_update_post($post_data);
	}else{
		$post_id = wp_insert_post($post_data);
	}
    if ($post_id) {
        // Set the category for the post
		$category = wp_set_object_terms($post_id, $category, 'product_cat');
        // Set the tags for the post
       $tags= wp_set_post_tags($post_id, $tags_keyword);

        // Add the product price as custom meta data
       $price_meta= update_post_meta($post_id, '_price', $price);
        // Upload and attach the images to the post
		// Check if any images were uploaded
		if (!empty($ad_images['tmp_name'])) {
			// print_r("temp name are not empty");
			$uploaded_images = $ad_images;
			
			// Store the first image as the featured image
			$featured_image = $uploaded_images['tmp_name'][0];
			$featured_image_name = $uploaded_images['name'][0];
			$featured_image_type = $uploaded_images['type'][0];

			// Upload the featured image to the WordPress media library
			$upload_featured = wp_upload_bits($featured_image_name, null, file_get_contents($featured_image));

			if (isset($upload_featured['error']) && !empty($upload_featured['error'])) {
				// Error occurred while uploading the featured image
				echo 'Error uploading the featured image: ' . $upload_featured['error'];
			} else {
				// File uploaded successfully, proceed to set it as the featured image

				// Get the attachment file path
				$featured_image_path = $upload_featured['file'];

				// Prepare the attachment data
				$featured_attachment_data = array(
					'post_mime_type' => $featured_image_type,
					'post_title'     => sanitize_file_name($featured_image_name),
					'post_content'   => '',
					'post_status'    => 'inherit',
				);
				print_r($featured_attachment_data);
				// Insert the attachment into the media library
				$featured_attachment_id = wp_insert_attachment($featured_attachment_data, $featured_image_path);

				if (!is_wp_error($featured_attachment_id)) {
					// Set the attachment as the featured image for a specific post
					set_post_thumbnail($post_id, $featured_attachment_id);
					echo "Image Update".$attachmentID;
				} else {
					// Error occurred while inserting the featured attachment
					echo 'Error setting the featured image: ' . $featured_attachment_id->get_error_message();
				}
			}

			// Process the remaining images as gallery images
			$gallery_images = array_slice($uploaded_images['tmp_name'], 1); // Remove the first image

			foreach ($gallery_images as $key => $gallery_image) {
				$gallery_image_name = $uploaded_images['name'][$key + 1];
				$gallery_image_type = $uploaded_images['type'][$key + 1];

				// Upload each gallery image to the WordPress media library
				$upload_gallery = wp_upload_bits($gallery_image_name, null, file_get_contents($gallery_image));

				if (isset($upload_gallery['error']) && !empty($upload_gallery['error'])) {
					// Error occurred while uploading a gallery image
					echo 'Error uploading gallery image: ' . $upload_gallery['error'];
				} else {

					// Get the attachment file path
					$gallery_image_path = $upload_gallery['file'];

					// Prepare the attachment data
					$gallery_attachment_data = array(
						'post_mime_type' => $gallery_image_type,
						'post_title'     => sanitize_file_name($gallery_image_name),
						'post_content'   => '',
						'post_status'    => 'inherit',
					);

					// Insert the attachment into the media library
					$gallery_attachment_id = wp_insert_attachment($gallery_attachment_data, $gallery_image_path);

					if (!is_wp_error($gallery_attachment_id)) {
						// Add the attachment to the product's gallery
						add_post_meta($post_id, '_product_image_gallery', $gallery_attachment_id, false);
					} else {
						// Error occurred while inserting a gallery attachment
						echo 'Error adding gallery image: ' . $gallery_attachment_id->get_error_message();
					}
				}
			}
		}
	
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to create ad post.'));
    }
	if(isset($_POST['edit_field'])){
		echo "Product Ad Updated Succesfully";
	}else{
		echo  "Product Ad Added Succesfully";
	}
	
    wp_die();
}
add_action('wp_ajax_custom_post_ads', 'handle_custom_post_ads');
add_action('wp_ajax_nopriv_custom_post_ads', 'handle_custom_post_ads');

function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
  
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  
	$attach_id = media_handle_upload( $file_handler, $post_id );
	if ( is_numeric( $attach_id ) ) {
	  update_post_meta( $post_id, '_my_file_upload', $attach_id );
	}
	return $attach_id;
  }

function add_custom_menu_item_link( $items ) {
    $items['post-ads'] = esc_html__('Post Ad', 'text-domain');
	$items['my-ads'] = esc_html__('My Ads', 'text-domain');
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'add_custom_menu_item_link' );

// Add phone and address fields to the WooCommerce "Edit Account" form
function add_custom_fields_to_edit_account_form() {
    $user_id = get_current_user_id();

    $phone = get_user_meta( $user_id, 'billing_phone', true );
    echo '<div class="col-md-6">
	<div class="form-group">
	<label>Phone</label>
	<input type="tel" class="form-control" name="billing_phone" id="billing_phone" placeholder="" value="'.$phone.'">
	</div>
	</div>';

    $address = get_user_meta( $user_id, 'billing_address_1', true );
    echo '<div class="col-md-12">
	<div class="form-group">';
    woocommerce_form_field( 'billing_address_1', array(
        'type'        => 'text',
        'label'       => __( 'Address', 'text-domain' ),
        'required'    => true,
        'class'       => array( 'woocommerce-Input woocommerce-Input--text input-text' ),
        'value'       => $address,
    ), $address );
    echo '</div>
	</div>';
}
add_action( 'woocommerce_edit_account_form', 'add_custom_fields_to_edit_account_form',5 );


// Add phone and address fields to the WooCommerce "Edit Account" form
function add_custom_fields_to_edit_store_information() {
    $user_id = get_current_user_id();
	$store_logo = get_user_meta( $user_id, 'store_logo', true );

	?>
		<div class="user-profile-card profile-store">
			<h4 class="user-profile-card-title">Personal Info</h4>
			<div class="col-lg-12">
				<div class="user-profile-form">
                                            

					<div class="form-group">
						<div class="store-logo-preview">
							<?php if ( $store_logo ) : ?>
								<img src="<?php echo esc_url( $store_logo ); ?>" alt="Store Logo" id="profile-image-preview" class="store-logo-preview" height="100px" width="100px">
							<?php endif; ?>
						</div>
						<input type="file" class="woocommerce-Input woocommerce-Input--file input-file" id="profile-image-upload" name="store_logo">
						<button type="button" class="theme-btn store-upload" id="profile-image-upload-button"><span class="far fa-upload"></span> Upload Profile Image</button>
					</div>

					<script>
						document.getElementById('profile-image-upload').addEventListener('change', function (e) {
							var reader = new FileReader();
							reader.onload = function (event) {
								document.getElementById('profile-image-preview').src = event.target.result;
							}
							reader.readAsDataURL(e.target.files[0]);
						});
					</script>


                    <?php  
						$store_phone_number = get_user_meta( $user_id, 'store_phone_number', true );
					?>                 
					<div class="form-group">
						<label>Contact Phone Number</label>
						<input type="text" name="store_phone_number" class="form-control" value="<?php echo $store_phone_number ?>"
							placeholder="Contact Phone Number">
					</div>
					
					<?php  
						$store_name = get_user_meta( $user_id, 'store_name', true );
					?>
					<div class="form-group">
						<label>Store Name</label>
						<input type="text" name="store_name" class="form-control" value="<?php echo $store_name  ?>"
							placeholder="Store Name">
					</div>
					<?php $contact_email = get_user_meta( $user_id, 'contact_email', true ); ?>
					<div class="form-group">
						<label>Contact Email</label>
						<input type="email" name="contact_email" class="form-control" value="<?php echo $contact_email  ?>"
							placeholder="Contact Email">
					</div>
					<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
					<button type="submit" class="theme-btn my-3" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><span class="far fa-save"></span><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
					<input type="hidden" name="action" value="save_account_details" />	
				</div>
			</div>
		</div>
	<?php
}
add_action( 'woocommerce_edit_account_form_end', 'add_custom_fields_to_edit_store_information',10 );

// Save phone and address fields data
function save_custom_user_fields_on_edit_account( $user_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        $phone = sanitize_text_field( $_POST['billing_phone'] );
        update_user_meta( $user_id, 'billing_phone', $phone );
    }

    if ( isset( $_POST['billing_address_1'] ) ) {
        $address = sanitize_text_field( $_POST['billing_address_1'] );
        update_user_meta( $user_id, 'billing_address_1', $address );
    }

	if ( isset( $_POST['store_phone_number'] ) ) {
        $store_phone_number = sanitize_text_field( $_POST['store_phone_number'] );
        update_user_meta( $user_id, 'store_phone_number', $store_phone_number );
    }

	if ( isset( $_POST['store_name'] ) ) {
        $store_name = sanitize_text_field( $_POST['store_name'] );
        update_user_meta( $user_id, 'store_name', $store_name );
    }

	if ( isset( $_POST['contact_email'] ) ) {
        $contact_email = sanitize_text_field( $_POST['contact_email'] );
        update_user_meta( $user_id, 'contact_email', $contact_email );
    }
	// var_dump($_FILES );exit;
	if ( isset( $_FILES['store_logo'] ) && ! empty( $_FILES['store_logo']['tmp_name'] ) ) {
        $uploaded_file = wp_handle_upload( $_FILES['store_logo'], array( 'test_form' => false ) );
        if ( isset( $uploaded_file['url'] ) ) {
            $store_logo = $uploaded_file['url'];
            update_user_meta( $user_id, 'store_logo', $store_logo );
        }
    }

	if ( isset( $_FILES['upload_banner'] ) && ! empty( $_FILES['upload_banner']['tmp_name'] ) ) {
        $uploaded__banner_file = wp_handle_upload( $_FILES['upload_banner'], array( 'test_form' => false ) );
        if ( isset( $uploaded__banner_file['url'] ) ) {
            $upload_banner = $uploaded__banner_file['url'];
            update_user_meta( $user_id, 'upload_banner', $upload_banner );
        }
    }
}
add_action( 'woocommerce_save_account_details', 'save_custom_user_fields_on_edit_account' );

function  fetch_my_ads(){
	$search_text = $_POST['search_text'];
	$current_user = wp_get_current_user();
    $user_id = $current_user->ID;
	$args = array(
		'author'         => $user_id,
		'post_type'      => 'product',
		'post_status'    => array('publish', 'draft'),
		's'              => $search_text, // Search text
	);

	$product_query = new WP_Query($args);
	print_r($product_query->found_posts);
	if(!empty($product_query->have_posts())){
		while($product_query->have_posts()){
			$product_query->the_post();
			$product_id = get_the_ID();
			$product=wc_get_product($product_id);
	?>
		<tr>
			<td>
				<div class="table-ad-info">
					<a href="<?php the_permalink($product->ID) ?>">
					<img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" class="img-responsive" alt="<?php the_title($product->ID); ?>"/>
						<div class="table-ad-content">
							<h6><?php echo get_the_title($product->ID); ?></h6>
							<span>Ad ID: #<?php echo $product_id ?></span>
						</div>
					</a>
				</div>
			</td>
			<td style="max-width:200px;overflow:hidden;">
				<?php
					$categories = get_the_terms($product->ID, 'product_cat');
					if ($categories && !is_wp_error($categories)) {
						$category_names = array();
						foreach ($categories as $category) {
							$category_names[] = $category->name;
						}
						echo implode(', ', $category_names);
					}
				?>
			</td>
			<td>
				<?php
					$publish_date = get_post_field('post_date', $product->ID);
					$days_ago = human_time_diff(strtotime($publish_date), current_time('timestamp')) . ' ago';
					echo $days_ago;
				?>

			</td>
			<td>
				<?php
					if ($product->is_on_sale()) {
						$regular_price = $product->get_regular_price();
						$sale_price = $product->get_sale_price();
						echo '<del>' . wc_price($regular_price) . '</del> ' . wc_price($sale_price);
					} else {
						$price = $product->get_price();
						echo wc_price($price);
					}
				?>
			</td>
			<td>
				<?php
					// Get the current view count
					$view_count = get_post_meta($product->get_id(), 'view_count', true);
					if(empty($view_count)):
						$view_count=0;
					endif;  
					// Display the view count
					echo 'Views: ' . $view_count;
				?>
			</td>
			<td>
				<span class="badge badge-success">
				<?php
					$product_status = get_post_status($product->get_id());
					echo $product_status;
				?>
				</span>
			</td>
		</tr>
	<?php
		}
	}
}
add_action('wp_ajax_fetch_my_ads', 'fetch_my_ads');
add_action('wp_ajax_nopriv_fetch_my_ads', 'fetch_my_ads');

function redirect_my_account() {
    if (is_account_page()) {
        wp_redirect('/dashboard');
        exit;
    }
}
add_action('template_redirect', 'redirect_my_account');

// password change API
function change_password_endpoint_init() {
    register_rest_route('user/v2', '/change-password/(?P<user_id>\d+)', array(
        'methods' => 'POST',
        'callback' => 'change_password_callback',
        'permission_callback' => 'change_password_permission_callback',
        'args' => array(
            'user_id' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'headers' => array(
                'Authorization' => array(
                    'required' => true,
                    'type' => 'string',
                    'description' => 'Basic ' . base64_encode('Esell_today:TTzs qQtC LvgM pdFG lEPj xz5o'),
                ),
            ),
        ),
    ));
}
add_action('rest_api_init', 'change_password_endpoint_init');

function change_password_permission_callback($request) {
    return current_user_can('edit_users');
}

function change_password_callback($request) {
    // Verify the Authorization header and authenticate the user
    $auth_header = $request->get_header('Authorization');
    if (empty($auth_header)) {
        return new WP_Error('no_auth_header', 'Authorization header is missing.', array('status' => 403));
    }

    // Extract the base64-encoded credentials from the Authorization header
    $credentials = explode(' ', $auth_header);
    if (count($credentials) !== 2) {
        return new WP_Error('invalid_auth_header', 'Invalid authorization header format.', array('status' => 403));
    }

    // Decode the base64-encoded credentials
    $decoded_credentials = base64_decode($credentials[1]);
    if (!$decoded_credentials) {
        return new WP_Error('invalid_auth_header', 'Failed to decode authorization header.', array('status' => 403));
    }

    // Extract the username and password from the decoded credentials
    list($username, $password) = explode(':', $decoded_credentials);
    $username = sanitize_text_field($username);
    $password = sanitize_text_field($password);

    // Authenticate the user with the provided credentials
    $user = wp_authenticate($username, $password);
    if (is_wp_error($user)) {
        return new WP_Error('invalid_credentials', 'Invalid username or password.', array('status' => 403));
    }

    // Get the user ID from the URL parameter
    $user_id = (int) $request->get_param('user_id');

    // Verify the previous password before allowing password change
    $previous_password = $request->get_param('previous_password');
    $previous_password = sanitize_text_field($previous_password);

    // Verify the previous password using wp_check_password
    $previous_password_matched = wp_check_password($previous_password, $user->user_pass, $user->ID);
    if (!$previous_password_matched) {
        return new WP_Error('invalid_previous_password', 'Invalid previous password.', array('status' => 403));
    }

    // Update the user's password
    $new_password = $request->get_param('new_password');
    $new_password = sanitize_text_field($new_password);

    // Validate the new password
    if (empty($new_password)) {
        return new WP_Error('empty_new_password', 'New password is required.', array('status' => 400));
    }

    // Check if the new password is the same as the previous password
    if ($new_password === $previous_password) {
        return new WP_Error('same_password', 'New password must be different from the previous password.', array('status' => 400));
    }

    // Set the new password only if it is different from the previous password
    $password_changed = wp_set_password($new_password, $user_id);
    if (!$password_changed) {
        return new WP_Error('password_change_failed', 'Failed to change password.', array('status' => 500));
    }

    return array('message' => 'Password changed successfully.');
}


// edit user
add_action('rest_api_init', 'register_user_edit_endpoint');

function register_user_edit_endpoint() {
    register_rest_route('wp/v2', '/edit-users/(?P<id>\d+)', array(
        'methods'  => 'PUT',
        'callback' => 'edit_user',
        'args'     => array(
            'id' => array(
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ),
        ),

		'first_name' => array(
			'validate_callback' => 'rest_validate_request_arg',
		),

		'last_name' => array(
			'validate_callback' => 'rest_validate_request_arg',
		),
    ));
}

function edit_user($request) {
    $user_id = $request->get_param('id');
    $user_data = $request->get_json_params();

    $user = get_user_by('ID', $user_id);

    if ($user) {
        foreach ($user_data as $key => $value) {
            update_user_meta($user_id, $key, $value);
        }

        return new WP_REST_Response('User updated successfully.', 200);
    } else {
        return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
    }
}
