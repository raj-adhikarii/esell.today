<?php

/*===================================/*
    loggedin server site validation
/*===================================*/
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['login'] ) ) {
    // Verify the nonce for security
    if ( isset( $_POST['custom_login_nonce'] ) && wp_verify_nonce( $_POST['custom_login_nonce'], 'custom_login_nonce' ) ) {
        $username = sanitize_text_field( $_POST['username'] );
        $password = $_POST['password'];

        // Perform your custom authentication logic here
        $user = wp_authenticate( $username, $password );

        if ( ! is_wp_error( $user ) ) {
            // Successful login
            wp_set_auth_cookie( $user->ID );
            wp_redirect( site_url( '/profile/' ) ); // Redirect to home page after login
            exit;
        } else {
            // Login failed
            $error_message = $user->get_error_message();
            // Display the error message or perform any other desired action
            echo 'Login failed: ' . $error_message;
        }
    } else {
        // Invalid nonce
        echo 'Security check failed. Please try again.';
    }
}

/*======================/*
    signup validation
/*======================*/
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = sanitize_user( $_POST['username'] );
    $email = sanitize_email( $_POST['email'] );
    $password = $_POST['password'];
    $agree = isset( $_POST['agree'] ) ? true : false;

    // Perform validation and registration logic here
    $errors = array();

    // Check if required fields are filled
    if ( empty( $username ) ) {
        $errors[] = 'Please enter your name.';
    }

    if ( empty( $email ) ) {
        $errors[] = 'Please enter your email address.';
    } elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $errors[] = 'Invalid email address.';
    }

    if ( empty( $password ) ) {
        $errors[] = 'Please enter a password.';
    }

    if ( ! $agree ) {
        $errors[] = 'You must agree to the Terms of Service.';
    }

    if ( empty( $errors ) ) {
        $user_id = wp_create_user( $username, $password, $email );

        if ( ! is_wp_error( $user_id ) ) {
            // Registration successful
            // You can perform additional actions here, such as sending a confirmation email, redirecting the user, etc.
            wp_redirect( site_url( '/login/' ) );
            exit;
        } else {
            $errors[] = $user_id->get_error_message();
        }
    }
}

/*==================================================== /*
    Server-side validation for forget password page 
/*====================================================*/
// function custom_reset_password_redirect() {
//     // Check if it is a password reset request
//     if ( isset( $_GET['action'] ) && $_GET['action'] === 'rp' && isset( $_GET['key'] ) && isset( $_GET['login'] ) ) {
//         $user_login = $_GET['login'];
//         $reset_key = $_GET['key'];

//         // Create the password reset URL
//         $password_reset_url = add_query_arg(
//             array(
//                 'action' => 'rp',
//                 'login' => $user_login,
//                 'key' => $reset_key,
//             ),
//             site_url('/password-reset')
//         );

//         // Redirect to the custom password reset page
//         wp_redirect( $password_reset_url );
//         exit;
//     }
// }

// Handle custom password reset request
function custom_password_reset_request() {
    if ( isset( $_POST['wc_reset_password'] ) && $_POST['wc_reset_password'] === 'true' ) {
        $email = sanitize_email( $_POST['user_login'] );

        // Get user by email
        $user = get_user_by( 'email', $email );

        if ( ! $user ) {
            // Handle invalid email address
            wc_add_notice( 'Invalid email address.', 'error' );
            return;
        }

        // Generate a unique key for password reset
        $reset_key = wp_generate_password( 20, false );

        // Save the reset key in user meta
        update_user_meta( $user->ID, 'reset_key', $reset_key );

        // Create the password reset URL
        $reset_url = add_query_arg(
            array(
                'key'  => $reset_key,
                'login' => $user->user_login,
            ),
            site_url( '/password-reset/' )
        );

        // Send the password reset email with the reset URL
        $subject = 'Password Reset';
        $message = 'Please click the following link to reset your password: ' . $reset_url;
        $headers = 'Content-Type: text/html; charset=UTF-8';
        $sent    = wp_mail( $email, $subject, $message, $headers );

        if ( $sent ) {
            // Display success message
            wc_add_notice( 'Please check your email to reset your password.', 'success' );
            // Redirect to the password reset page
            wp_redirect( home_url( '/password-reset' ) );
            exit;
        } else {
            // Handle password reset email sending failure
            wc_add_notice( 'Failed to send the password reset email.', 'error' );
            // Redirect to the password reset page
            wp_redirect( home_url( '/password-reset' ) );
            exit;
        }
    }
}

// Check if the function is not already hooked to the 'lostpassword_post' action
if ( ! has_action( 'lostpassword_post', 'custom_password_reset_request' ) ) {
    // Hook the function to the 'lostpassword_post' action
    add_action( 'lostpassword_post', 'custom_password_reset_request' );
}

/*===============================/*
 	Update product views count
/*===============================*/

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

/*===================================/*
	disable aad to cart from store
/*===================================*/

function disable_add_to_cart() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
add_action( 'init', 'disable_add_to_cart' );

/*===================================/*
	hide sale price from products
/*===================================*/

add_action('admin_head', 'hide_sale_price_backend');

function hide_sale_price_backend()
{
    $screen = get_current_screen();
    
    if ($screen->post_type === 'product') {
        echo '<style>.woocommerce_price_discount{display:none;}</style>';
    }
}



/*==========================/*
	ACF map widget setting
/*==========================*/
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyC72HFD7TrxeGNFn3z-J_VDkReXJCQK95I');
}
add_action('acf/init', 'my_acf_init');

/*========================================/*
	redirect annomous user to login page 
/*========================================*/
function redirect_unlogged_users() {
    $restricted_pages = array( 'dashboard', 'my-ads', 'post-ad', 'profile-setting', 'profile-setting', 'profile' );

    if ( ! is_user_logged_in() && in_array( get_post_field( 'post_name' ), $restricted_pages ) ) {
        wp_redirect( site_url( '/login/' ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_unlogged_users' );

/*================================/*
	transfer data from frontend
/*================================*/
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
    $tags_keyword = explode(',',$_POST['tags_keyword']);
    $ad_images = $_FILES['product_images'];
    
    $post_data = array(
        'post_title'   => $ad_title,
        'post_content' => $ad_content,
        'post_type'    => 'product',
        'post_status'  => 'draft'
    );
	$post_id=" ";
	if(isset($_POST['edit_field'])){
		$post_id=$_POST['edit_field'];
		$post_data['ID']=$post_id;
		wp_update_post($post_data);
	}else{
		$post_id = wp_insert_post($post_data);
	}
    if ($post_id) {
        // Set the category for the post
		$category = wp_set_object_terms($post_id, $category, 'product_cat');
        // Set the tags for the post
       $tags= wp_set_post_terms($post_id, $tags_keyword,'product_tag');

        // Add the product price as custom meta data
       $price_meta= update_post_meta($post_id, '_price', $price);
        // Upload and attach the images to the post
		// Check if any images were uploaded
		if (!empty($ad_images['tmp_name'])) {
			
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
				// Insert the attachment into the media library
				$featured_attachment_id = wp_insert_attachment($featured_attachment_data, $featured_image_path);
               
				if (!is_wp_error($featured_attachment_id)) {
					// Set the attachment as the featured image for a specific post
					set_post_thumbnail($post_id, $featured_attachment_id);

				} else {
					// Error occurred while inserting the featured attachment
					echo 'Error setting the featured image: ' . $featured_attachment_id->get_error_message();
				}
			}

			// Process the remaining images as gallery images
			$gallery_images = array_slice($uploaded_images['tmp_name'], 1); // Remove the first image
			//remove last element of the array
           	array_pop($gallery_images);

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
						$gallery_attachment_ids[]=$gallery_attachment_id;
					} else {
						// Error occurred while inserting a gallery attachment
						echo 'Error adding gallery image: ' . $gallery_attachment_id->get_error_message();
					}
				}
			}
		}
	// Add the gallery attachment IDs as an array to the product's gallery
	if (!empty($gallery_attachment_ids)) {
		 $gallery_attachment_ids_string = implode(',', $gallery_attachment_ids);
		 update_post_meta($post_id, '_product_image_gallery', $gallery_attachment_ids_string);
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


/*========================================/*
	Add woocommerce user image profile
/*========================================*/
add_action('wp_ajax_upload_profile_image', 'upload_profile_image');
add_action('wp_ajax_nopriv_upload_profile_image', 'upload_profile_image');

function upload_profile_image() {
    if (isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
        $file = $_FILES['file'];
        
        // Check for any errors during the file upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            wp_send_json_error('Error uploading file. Please try again.');
        }
        
        // Set the desired upload directory
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['path'] . '/';
        
        // Generate a unique filename for the uploaded file
        $filename = uniqid() . '-' . basename($file['name']);
        
        // Move the uploaded file to the target directory
        $target_file = $target_dir . $filename;
        if (!move_uploaded_file($file['tmp_name'], $target_file)) {
            wp_send_json_error('Error moving uploaded file. Please try again.');
        }
        
        // Update the user meta or perform any other necessary actions with the uploaded file
        
        // Return the file URL or any other relevant data in the success response
        $file_url = $upload_dir['url'] . '/' . $filename;
        wp_send_json_success('File uploaded successfully.', $file_url);
    } else {
        wp_send_json_error('No file uploaded.');
    }
}


/*=======================================================================/*
	Add phone and address fields to the WooCommerce "Edit Account" form
/*=======================================================================*/
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

/*=======================================================================/*
	Add phone and address fields to the WooCommerce "Edit Account" form
/*=======================================================================*/
function add_custom_fields_to_edit_store_information() {
    $user_id = get_current_user_id();
	$store_logo = get_user_meta( $user_id, 'store_logo', true );

	?>
		<div class="user-profile-card profile-store">
			<h4 class="user-profile-card-title">Store logo</h4>
			<div class="col-lg-12">
				<div class="user-profile-form">
                                            
                <div class="form-group">
                    <div class="store-logo-preview">
                        <?php if ( $store_logo ) : ?>
                            <img src="<?php echo esc_url( $store_logo ); ?>" alt="Store Logo" id="profile-image-preview" class="store-logo-preview" height="100px" width="100px">
                        <?php endif; ?>
                    </div>
                    <input type="file" class="woocommerce-Input woocommerce-Input--file input-file theme-btn store-upload" id="profile-image-upload" name="store_logo">
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
						$store_name = get_user_meta( $user_id, 'store_name', true );
					?>
					<div class="form-group">
						<label>Store Name</label>
						<input type="text" name="store_name" class="form-control" value="<?php echo $store_name  ?>"
							placeholder="Store Name">
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

/*======================================/*
	Save phone and address fields data
/*======================================*/
function save_custom_user_fields_on_edit_account( $user_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        $phone = sanitize_text_field( $_POST['billing_phone'] );
        update_user_meta( $user_id, 'billing_phone', $phone );
    }

    if ( isset( $_POST['billing_address_1'] ) ) {
        $address = sanitize_text_field( $_POST['billing_address_1'] );
        update_user_meta( $user_id, 'billing_address_1', $address );
    }

    
	if ( isset( $_POST['store_name'] ) ) {
        $store_name = sanitize_text_field( $_POST['store_name'] );
        update_user_meta( $user_id, 'store_name', $store_name );
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
	// print_r($product_query->found_posts);
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

/**
 * Pagination
 */
if ( ! function_exists( 'pagination' ) ) :

    function pagination( $paged = '', $max_page = '' ) {
        $big = 999999999; // need an unlikely integer
        if( ! $paged ) {
            $paged = get_query_var('paged');
        }

        if( ! $max_page ) {
            global $wp_query;
            $max_page = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
        }

        echo paginate_links( array(
            'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'  => __( '«' ),
            'next_text'  => __( '»' ),
            'type'       => 'list'
        ) );
    }
endif;

function redirect_my_account() {
    if (is_account_page()) {
        wp_redirect('/dashboard');
        exit;
    }
}
add_action('template_redirect', 'redirect_my_account');

/*==============================/*
	Add user ID to product data
/*==============================*/
// Hook into the WooCommerce REST API product creation request
add_action('woocommerce_rest_insert_product', 'custom_save_product_image', 10, 2);

function custom_save_product_image($product, $request) {
    // Check if the image data is present in the request
    if (isset($request['images']) && is_array($request['images'])) {
        // Loop through each image in the request
        foreach ($request['images'] as $image) {
            // Process and save the image to the database
            $attachment_id = custom_save_image($image['src']);
            
            // If the image was saved successfully, attach it to the product
            if ($attachment_id) {
                $product->add_image_id($attachment_id);
            }
        }
    }
}

function custom_save_image($base64Image) {
    // Decode the base64-encoded image string
    $decodedImage = base64_decode($base64Image);
    
    // Generate a unique filename for the image
    $filename = md5(uniqid()) . '.jpg';
    
    // Specify the upload directory path
    $uploadPath = wp_upload_dir()['path'] . '/' . $filename;
    
    // Save the image to the upload directory
    $imageSaved = file_put_contents($uploadPath, $decodedImage);
    
    // If the image was saved successfully, attach it to the media library
    if ($imageSaved) {
        $attachment = array(
            'guid'           => wp_upload_dir()['url'] . '/' . $filename,
            'post_mime_type' => 'image/jpeg',
            'post_title'     => sanitize_file_name($filename),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );
        
        // Insert the attachment into the media library
        $attachment_id = wp_insert_attachment($attachment, $uploadPath);
        
        // Generate metadata for the attachment
        $attachment_data = wp_generate_attachment_metadata($attachment_id, $uploadPath);
        
        // Update the attachment metadata
        wp_update_attachment_metadata($attachment_id, $attachment_data);
        
        return $attachment_id;
    }
    
    return false;
}

// save profile information
add_action( 'template_redirect', 'save_account_details' );

function save_account_details() {
    // Verify the form submission and nonce
    if ( isset( $_POST['save_account_details'] ) && isset( $_POST['action'] ) && $_POST['action'] === 'save_account_details' && wp_verify_nonce( $_POST['save-account-details-nonce'], 'save_account_details' ) ) {
        // Retrieve the user ID
        $user_id = get_current_user_id();

        // Retrieve the submitted form values
        $first_name = sanitize_text_field( $_POST['account_first_name'] );
        $last_name  = sanitize_text_field( $_POST['account_last_name'] );
        $email      = sanitize_email( $_POST['account_email'] );
        $password   = $_POST['password_1'];

        // Update the user account information
        $user_data = array(
            'ID'         => $user_id,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'user_email' => $email,
        );
        wp_update_user( $user_data );

        // Change password if provided
        if ( ! empty( $password ) ) {
            wp_set_password( $password, $user_id );
        }

        // Redirect the user or display a success message
        wp_redirect( 'https://staging.e-sell.today/profile/' );
        exit;
    }

}

// new image upload field backend

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">

        <tr>
            <th><label for="image">Profile Image</label></th>
 
            <td>
                <img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" style="height:50px;">
                <input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />
                <span class="description">Please upload your image for your profile.</span>
            </td>
        </tr>

    </table>
<?php }

/* 
 * Script for saving profile image
 *
 */

add_action('admin_head','my_profile_upload_js');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox'); 

function my_profile_upload_js() { ?>
    
    <script type="text/javascript">
        jQuery(document).ready(function() {
        
            jQuery(document).find("input[id^='uploadimage']").live('click', function(){
                //var num = this.id.split('-')[1];
                formfield = jQuery('#image').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
     
                window.send_to_editor = function(html) {
                    imgurl = jQuery('img',html).attr('src');
                    jQuery('#image').val(imgurl);
                    
                    tb_remove();
                }
     
                return false;
            });
        });

    </script>

<?php }



/*
 * Save custom user profile data
 *
 */

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_usermeta( $user_id, 'image', $_POST['image'] );
}
