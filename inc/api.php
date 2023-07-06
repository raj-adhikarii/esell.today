<?php 
/*==========================/*
   custom login endpoint
/*==========================*/

add_action('rest_api_init', 'custom_user_login_endpoint');

function custom_user_login_endpoint() {
  register_rest_route('user/v1', '/login', array(
    'methods' => 'POST',
    'callback' => 'custom_user_login',
  ));
}

function custom_user_login($request) {
    $username = $request->get_param('username');
    $password = $request->get_param('password');

    // Perform validation on the input data

    $user = wp_authenticate($username, $password);

    if (is_wp_error($user)) {
        return new WP_REST_Response(array('error' => $user->get_error_message()), 401);
    }

    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID);

    return new WP_REST_Response(array('message' => 'User logged in successfully', 'user_id' => $user->ID), 200);
}

/*==================================/*
    custom user register endpoint
/*==================================*/
add_action('rest_api_init', 'custom_user_registration_endpoint');

function custom_user_registration_endpoint() {
  register_rest_route('user/v1', '/register', array(
    'methods' => 'POST',
    'callback' => 'custom_user_registration',
  ));
}

function custom_user_registration($request) {
    $username = $request->get_param('username');
    $email = $request->get_param('email');
    $password = $request->get_param('password');
  
    // Perform validation on the input data
  
    $user_id = wp_create_user($username, $password, $email);
  
    if (is_wp_error($user_id)) {
      return new WP_REST_Response(array('error' => $user_id->get_error_message()), 500);
    } 
    return new WP_REST_Response(array('message' => 'User registered successfully'), 200);
  }
  

/*================================================/*
    Register custom endpoint for password reset
/*================================================*/
add_action('rest_api_init', 'register_password_reset_endpoint');
function register_password_reset_endpoint() {
    register_rest_route('esell/v1', '/password-reset', array(
        'methods' => 'POST',
        'callback' => 'handle_password_reset_request',
    ));
}

// Handle password reset request
function handle_password_reset_request(WP_REST_Request $request) {
    $email = sanitize_email($request->get_param('email'));

    // Get user by email
    $user = get_user_by('email', $email);

    if (!$user) {
        return new WP_Error('invalid_email', 'Invalid email address.', array('status' => 400));
    }

    // Generate new password
    $new_password = wp_generate_password();

    // Update user password
    wp_set_password($new_password, $user->ID);

    // Send password reset notification
    wp_mail(
        $user->user_email,
        'Password Reset',
        'Your new password: ' . $new_password
    );

    // Return success response
    return array(
        'message' => 'Password reset successful. Please check your email for the new password.',
    );
}

function get_products_by_user( $request ) {
    $user_id = $request['user_id'];

    $args = array(
        'status'     => 'publish',
        'author'     => $user_id,
        'paginate'   => true,
        'per_page'   => 10, // Adjust the number of products per page as needed
    );

    $products = wc_get_products( $args );

    // Process and format the products as desired
    $formatted_products = array();
    foreach ( $products as $product ) {
        // Extract relevant product data
        $formatted_product = array(
            'id'   => $product->get_id(),
            'name' => $product->get_name(),
            // Add more desired fields
        );

        $formatted_products[] = $formatted_product;
    }

    return rest_ensure_response( $formatted_products );
}

/*============================/*
   Post product via rest api
/*============================*/
function create_product_via_api($product_data) {
    // WooCommerce API credentials
    $consumer_key = 'Esell_today';
    $consumer_secret = 'TTzs qQtC LvgM pdFG lEPj xz5o';

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

/*=======================================================================/*
    rest api to get all the product published by certain user
    @see https://staging.e-sell.today/wp-json/wc/v3/products/user/1?
    consumer_key=ck_2bfdecd44427762646b056a79035f944fa22c88c&consumer_secret=cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3
/*========================================================================*/
function retrieve_products_by_user($request) {
    $user_id = $request->get_param('user_id');

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'author' => $user_id,
    );

    $query = new WP_Query($args);

    // Retrieve the products
    $products = $query->get_posts();

    // Process each product to add image, category, and views
    $processed_products = array();
    foreach ($products as $product) {
        // Get the product object
        $product_obj = wc_get_product($product->ID);

        // Get the product data
        $product_data = $product_obj->get_data();

        // Get the featured image URL
        $featured_image_id = $product_obj->get_image_id();
        $featured_image_url = wp_get_attachment_image_src($featured_image_id, 'full');

        // Get the image URL
        $image_id = $product_obj->get_image_id();
        $image_url = wp_get_attachment_image_url($image_id, 'full');

        // Get the gallery image URLs
        $gallery_image_ids = $product_obj->get_gallery_image_ids();
        $gallery_image_urls = array();
        foreach ($gallery_image_ids as $gallery_image_id) {
            $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
            if ($gallery_image_url) {
                $gallery_image_urls[] = $gallery_image_url;
            }
        }

        // Get the category information
        $categories = wp_get_post_terms($product->ID, 'product_cat', array('fields' => 'all'));
        $category_data = array();
        foreach ($categories as $category) {
            $category_data[] = array(
                'id' => $category->term_id,
                'name' => $category->name,
            );
        }

        // Increase the views count
        $views = get_post_meta($product->ID, 'views', true);
        $views = empty($views) ? 1 : intval($views) + 1;
        update_post_meta($product->ID, 'views', $views);

        // Add the image, category, and views to the product data
        $product_data['featured_image_url'] = $featured_image_url ? $featured_image_url[0] : '';
        $product_data['image_url'] = $image_url ? $image_url : '';
        $product_data['gallery_image_urls'] = $gallery_image_urls;
        $product_data['category'] = $category_data;
        $product_data['views'] = $views;

        // Add the processed product to the list
        $processed_products[] = $product_data;
    }

    // Return the processed products as a REST API response
    return rest_ensure_response($processed_products);
}

add_action('rest_api_init', function () {
    register_rest_route('wc/v3', '/products/user/(?P<user_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'retrieve_products_by_user',
    ));
});


/*===============================================================/*
   Add custom REST API endpoint for retrieving user information
/*===============================================================*/
function custom_user_endpoint() {
    register_rest_route( 'custom/v1', '/users', array(
        'methods'  => 'GET',
        'callback' => 'custom_get_users',
    ) );
}
add_action( 'rest_api_init', 'custom_user_endpoint' );

// Callback function to handle the request and retrieve user information
function custom_get_users( $request ) {
    $users = get_users();

    $formatted_users = array();

    foreach ( $users as $user ) {
        $formatted_users[] = array(
            'id'        => $user->ID,
            'username'  => $user->user_login,
            'email'     => $user->user_email,
            'name'      => $user->display_name,
            // Add any additional user data you want to include
        );
    }

    return $formatted_users;
}

/*===============================================================/*
    Retrieve merged user data from WooCommerce and WordPress.
/*===============================================================*/
function get_customer_data($request) {
    $user_id = $request['user_id'];
    
    // Retrieve WordPress user data
    $user = get_userdata($user_id);

    // Concatenate first name and last name
    $name = $user->first_name . ' ' . $user->last_name;

    // Retrieve additional user meta data
    $image_url = get_user_meta($user_id, 'image_url', true);
    $additional_details = get_user_meta($user_id, 'additional_details', true);

    // Get user profile image URL
    $avatar_url = get_avatar_url($user_id);

    // Retrieve customer data
    $customer = new WC_Customer($user_id);

    // Get phone number
    $phone = $customer->get_billing_phone();

    // Get billing address
    $billing_address = array(
        'id' => $user->ID,
        'username' => $user->user_login,
        'email' => $user->user_email,
        'name' => $name,
        'image_url' => $avatar_url,
        'address_1' => $customer->get_billing_address_1(),
    );

    // Combine phone and billing address data
    $customer_data = array(
        'phone' => $phone,
        'billing_address' => $billing_address,
    );

    return rest_ensure_response($customer_data);
}

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/users/(?P<user_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_customer_data',
    ));
});


/*=========================================/*
    Related products
/*=========================================*/
function get_related_products($request) {
    $product_id = $request->get_param('product_id');

    // Get the current product
    $product = wc_get_product($product_id);

    // Check if the product exists
    if (!$product) {
        return new WP_Error('invalid_product_id', 'Invalid product ID.', array('status' => 404));
    }

    // Get the related product IDs
    $related_ids = $product->get_related();

    $related_products = array();

    foreach ($related_ids as $related_id) {
        $related_product = wc_get_product($related_id);

        // Get the category information
        $categories = wp_get_post_terms($related_id, 'product_cat', array('fields' => 'all'));
        $category_data = array();
        foreach ($categories as $category) {
            $category_data[] = array(
                'id' => $category->term_id,
                'name' => $category->name,
            );
        }

        // Get the reviews count
        $review_count = $related_product->get_review_count();

        // Get the views count
        $views_count = get_post_meta($related_id, 'views', true);

        $related_products[] = array(
            'id' => $related_product->get_id(),
            'name' => $related_product->get_name(),
            'price' => $related_product->get_price(),
            'image' => wp_get_attachment_image_src($related_product->get_image_id(), 'full')[0],
            'category' => $category_data,
            'reviews_count' => $review_count,
            'views_count' => $views_count,
            // Add any additional product data you want to include
        );
    }

    return rest_ensure_response($related_products);
}

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/related-products/(?P<product_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_related_products',
    ));
});


/*=======================/*
	password change API
/*=======================*/

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
    // ...

    // Get the user ID from the URL parameter
    $user_id = (int) $request->get_param('user_id');

    // Verify the previous password before allowing password change
    $previous_password = $request->get_param('previous_password');
    $previous_password = sanitize_text_field($previous_password);

    // Get the user object
    $user = get_userdata($user_id);
    if (!$user) {
        return new WP_Error('invalid_user', 'Invalid user ID.', array('status' => 400));
    }

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
        return new WP_Error('password_changed', 'Password changed successfully.', array('status' => 201));
    }

    return array('message' => 'Password changed successfully.');
}



/*====================/*
	Update user data
/*====================*/

add_action('rest_api_init', 'register_user_edit_endpoint');

function register_user_edit_endpoint() {
    register_rest_route('wp/v2', '/edit-users/(?P<id>\d+)', array(
        'methods'  => 'PUT',
        'callback' => 'update_user_data',
        'args'     => array(
            'id' => array(
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ),
            'first_name' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'last_name' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'email' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'avatar' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'phone' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
            'address' => array(
                'validate_callback' => 'rest_validate_request_arg',
            ),
        ),
    ));
}

function update_user_data($request) {
    $user_id = $request->get_param('id');
    $user_data = $request->get_json_params();

    $user = get_user_by('ID', $user_id);

    if ($user) {
        // Update WordPress user data
        $user_args = array(
            'ID' => $user_id,
        );

        if (isset($user_data['first_name'])) {
            $user_args['first_name'] = $user_data['first_name'];
            update_user_meta($user_id, 'first_name', $user_data['first_name']);
        }

        if (isset($user_data['last_name'])) {
            $user_args['last_name'] = $user_data['last_name'];
            update_user_meta($user_id, 'last_name', $user_data['last_name']);
        }

        if (isset($user_data['email'])) {
            $user_args['user_email'] = $user_data['email'];
            wp_update_user($user_args); // Update WordPress user email
            update_user_meta($user_id, 'billing_email', $user_data['email']); // Update WooCommerce customer email
        }

        if (isset($user_data['phone'])) {
            update_user_meta($user_id, 'billing_phone', $user_data['phone']);
        }

        // Update user avatar
        if (isset($user_data['avatar'])) {
            $avatar_url = $user_data['avatar'];

            // Check if the Simple Local Avatars plugin is active
            if (function_exists('sla_add')) {
                sla_add($user_id, $avatar_url);
            } else {
                // If the plugin is not active, update the default WordPress avatar
                update_user_meta($user_id, 'simple_local_avatar', $avatar_url);
            }
        }

        // Update WooCommerce customer billing address data
        $billing_address = array(
            'first_name' => $user_data['first_name'],
            'last_name'  => $user_data['last_name'],
            'email'      => $user_data['email'],
            'phone'      => $user_data['phone'],
            'address'    => isset($user_data['address']) ? $user_data['address'] : '',
        );

        // Update the customer's first name, last name, email, and phone
        wp_update_user(array(
            'ID'           => $user_id,
            'first_name'   => $billing_address['first_name'],
            'last_name'    => $billing_address['last_name'],
            'user_email'   => $billing_address['email'],
            'billing_phone' => $billing_address['phone'],
        ));

        // Update the billing address line 1
        update_user_meta($user_id, 'billing_address_1', $billing_address['address']);

        return new WP_REST_Response('User updated successfully.', 200);
    } else {
        return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
    }
}

/*=========================/*
    Search Product
/*=========================*/
function search_products($request) {
    $search_term = $request->get_param('search');

    // Query parameters for product search
    $params = array(
        'status' => 'publish',
        'search' => $search_term,
    );

    // WooCommerce API credentials
    $consumer_key = 'ck_2bfdecd44427762646b056a79035f944fa22c88c';
    $consumer_secret = 'cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3';

    // Perform the product search using the WooCommerce REST API
    $response = wp_remote_get('https://staging.e-sell.today/wp-json/wc/v3/products', array(
        'method' => 'GET',
        'timeout' => 45,
        'body' => $params,
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
        ),
    ));

    // Check for errors
    if (is_wp_error($response)) {
        return $response;
    }

    // Retrieve the response body
    $body = wp_remote_retrieve_body($response);

    // Convert the response to an array
    $products = json_decode($body, true);

    // Return the products as a REST API response
    return rest_ensure_response($products);
}

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/products/search', array(
        'methods' => 'GET',
        'callback' => 'search_products',
        'permission_callback' => function () {
            // Allow access to all users (public access)
            return true;
        },
    ));
});

//============================handeling image=========================
// function create_product_image($request) {
//     $product_id = $request->get_param('product_id');

//     // Check if the image file exists in the request
//     if (!isset($_FILES['image']['tmp_name']) || empty($_FILES['image']['tmp_name'])) {
//         return new WP_Error('image_upload_error', 'Image file is missing.');
//     }

//     // Process the uploaded image file
//     $uploaded_file = $_FILES['image'];

//     var_dump($product_id);
//     var_dump($_FILES['image']);
//     // Validate file type
//     $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
//     $file_type = $uploaded_file['type'];
//     if (!in_array($file_type, $allowed_types)) {
//         return new WP_Error('image_upload_error', 'Invalid file type. Only JPEG, JPG, and PNG files are allowed.');
//     }

//     // Validate and save the uploaded file to the WordPress uploads directory
//     $upload_dir = wp_upload_dir();
//     $target_dir = $upload_dir['path'] . '/';
//     $target_file = $target_dir . basename($uploaded_file['name']);

//     var_dump($target_file);
//     // Move the uploaded file to the target directory
//     if (!move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
//         return new WP_Error('image_upload_error', 'Failed to save the uploaded image file.');
//     }

//     // Set appropriate permissions for the uploaded file
//     chmod($target_file, 0644);

//     // Obtain the file URL
//     $image_file_url = $upload_dir['url'] . '/' . basename($target_file);

//     // Get the JSON payload from the request body
//     $json_data = $request->get_json_params();

//     // Extract the image name and position from the JSON data
//     $name = isset($json_data['name']) ? $json_data['name'] : '';
//     $position = isset($json_data['position']) ? $json_data['position'] : '';

//     $image_data = array(
//         'src' => $image_file_url,
//         'name' => $name,
//         'position' => $position,
//     );

//     // WooCommerce API credentials
//     $consumer_key = 'ck_2bfdecd44427762646b056a79035f944fa22c88c';
//     $consumer_secret = 'cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3';

//     // Create the image in WooCommerce using the REST API
//     $response = wp_safe_remote_post("https://staging.e-sell.today/wp-json/wc/v3/products/$product_id/images", array(
//         'method' => 'POST',
//         'timeout' => 45,
//         'headers' => array(
//             'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
//             'Content-Type' => 'application/json',
//         ),
//         'body' => wp_json_encode($image_data),
//     ));

//     // Check for errors
//     if (is_wp_error($response)) {
//         $error_message = $response->get_error_message();
//         return new WP_Error('image_upload_error', $error_message);
//     }

//     // Retrieve the response body
//     $body = wp_remote_retrieve_body($response);

//     // Convert the response to an array
//     $created_image = json_decode($body, true);

//     // Return the created image as a REST API response
//     return rest_ensure_response($created_image);
// }

// add_action('rest_api_init', function () {
//     register_rest_route('wc/v3', '/products/(?P<product_id>\d+)/images', array(
//         'methods' => 'POST',
//         'callback' => 'create_product_image',
//         'permission_callback' => '__return_true', // Allow public access
//     ));
// });

function create_product_image($request) {
    $product_id = $request->get_param('product_id');

    // Check if the image file exists in the request
    if (!isset($_FILES['image']['tmp_name']) || empty($_FILES['image']['tmp_name'])) {
        return new WP_Error('image_upload_error', 'Image file is missing.');
    }

    // Process the uploaded image file
    $uploaded_file = $_FILES['image'];


        var_dump($product_id);
    var_dump($_FILES['image']);
    // Validate file type
    $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
    $file_type = $uploaded_file['type'];
    if (!in_array($file_type, $allowed_types)) {
        return new WP_Error('image_upload_error', 'Invalid file type. Only JPEG, JPG, and PNG files are allowed.');
    }

    // Validate and save the uploaded file to the WordPress uploads directory
    $upload_dir = wp_upload_dir();
    $target_dir = $upload_dir['path'] . '/';
    $target_file = $target_dir . basename($uploaded_file['name']);
    var_dump($target_file);
    // Move the uploaded file to the target directory
    if (!move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        return new WP_Error('image_upload_error', 'Failed to save the uploaded image file.');
    }

    // Set appropriate permissions for the uploaded file
    chmod($target_file, 0644);

    // Obtain the file URL
    $image_file_url = $upload_dir['url'] . '/' . basename($target_file);

    // Set appropriate permissions for the target file
    if (!move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {
        return new WP_Error('image_upload_error', 'Failed to save the uploaded image file.');
    }

    // Set appropriate permissions for the uploaded file
    chmod($target_file, 0644);

    // Obtain the file URL
    $image_file_url = $upload_dir['url'] . '/' . basename($uploaded_file['name']);

    // Get the JSON payload from the request body
    $json_data = $request->get_json_params();

    // Extract the image name and position from the JSON data
    $name = isset($json_data['name']) ? $json_data['name'] : '';
    $position = isset($json_data['position']) ? $json_data['position'] : '';

    var_dump($name);
    var_dump($position);
    $image_data = array(
        'file' => $image_file_url,
        'name' => $name,
        'position' => $position,
    );

    // WooCommerce API credentials
    $consumer_key = 'ck_2bfdecd44427762646b056a79035f944fa22c88c';
    $consumer_secret = 'cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3';

    // Create the image in WooCommerce using the REST API
    $response = wp_safe_remote_post("https://staging.e-sell.today/wp-json/wc/v3/products/$product_id/images", array(
        'method' => 'POST',
        'timeout' => 45,
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
            'Content-Type' => 'application/json',
        ),
        'body' => wp_json_encode($image_data),
    ));

    // Check for errors
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        return new WP_Error('image_upload_error', $error_message);
    }

    // Retrieve the response body
    $body = wp_remote_retrieve_body($response);

    // Convert the response to an array
    $created_image = json_decode($body, true);

    // Return the created image as a REST API response
    return rest_ensure_response($created_image);
}

add_action('rest_api_init', function () {
    register_rest_route('wc/v3', '/products/(?P<product_id>\d+)/images', array(
        'methods' => 'POST',
        'callback' => 'create_product_image',
        'permission_callback' => '__return_true', // Allow public access
    ));
});


/*============================================/*
    Add Id of user which published the product

    @see https://staging.e-sell.today/wp-json/wc/v3/products/867?
    consumer_key=ck_2bfdecd44427762646b056a79035f944fa22c88c&
    consumer_secret=cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3
/*============================================*/

function get_product_with_user_id($request) {
    $product_id = $request->get_param('product_id');

    // Get the product
    $product = wc_get_product($product_id);

    // Check if the product exists
    if (!$product) {
        return new WP_Error('invalid_product_id', 'Invalid product ID.', array('status' => 404));
    }

    // Get the product's author ID
    $author_id = get_post_field('post_author', $product_id);

    // Get the product data
    $product_data = $product->get_data();

    // Create an array to store all images
    $images = array();

    // Get the featured image URL
    $image_id = $product->get_image_id();
    $image_url = wp_get_attachment_image_url($image_id, 'full');
    if ($image_url) {
        $images[] = array(
            'id' => $image_id,
            'date_created' => get_the_time('c', $image_id),
            'date_created_gmt' => get_the_time('c', $image_id, 'gmt'),
            'date_modified' => get_the_modified_time('c', $image_id),
            'date_modified_gmt' => get_the_modified_time('c', $image_id, 'gmt'),
            'src' => $image_url,
            'name' => '',
            'alt' => '',
        );
    }

    // Get the gallery image URLs
    $gallery_image_ids = $product->get_gallery_image_ids();
    foreach ($gallery_image_ids as $gallery_image_id) {
        $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
        if ($gallery_image_url) {
            $images[] = array(
                'id' => $gallery_image_id,
                'date_created' => get_the_time('c', $gallery_image_id),
                'date_created_gmt' => get_the_time('c', $gallery_image_id, 'gmt'),
                'date_modified' => get_the_modified_time('c', $gallery_image_id),
                'date_modified_gmt' => get_the_modified_time('c', $gallery_image_id, 'gmt'),
                'src' => $gallery_image_url,
                'name' => '',
                'alt' => '',
            );
        }
    }

    // Add the author ID and the array of images to the product data
    $product_data['user_id'] = $author_id;
    $product_data['images'] = $images;

    return rest_ensure_response($product_data);
}

add_action('rest_api_init', function () {
    register_rest_route('wc/v3', '/products/(?P<product_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_product_with_user_id',
    ));
});

