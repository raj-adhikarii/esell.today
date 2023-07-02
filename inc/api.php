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
            wp_redirect( site_url( '/dashboard/' ) ); // Redirect to home page after login
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

    // if ( ! $agree ) {
    //     $errors[] = 'You must agree to the Terms of Service.';
    // }

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
function custom_lost_password_validation($errors, $username) {
    if (empty($username)) {
        $errors->add('empty_username', __('Please enter your email address.', 'woocommerce'));
    } elseif (!is_email($username)) {
        $errors->add('invalid_username', __('Invalid email address.', 'woocommerce'));
    } elseif (!email_exists($username)) {
        $errors->add('email_not_found', __('The provided email address is not registered.', 'woocommerce'));
    }

    return $errors;
}
add_filter('woocommerce_lostpassword_post_errors', 'custom_lost_password_validation', 10, 2);

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
function get_merged_user_data($request) {
    $user_id = $request['user_id'];

    // Retrieve WooCommerce user data
    if (function_exists('wc_get_customer')) {
        $customer = wc_get_customer($user_id);

        // Add any WooCommerce user-related data you want to include
        $billing_address = $customer->get_billing();
        $shipping_address = $customer->get_shipping();
    }

    // Retrieve WordPress user data
    $user = get_userdata($user_id);

    // Concatenate first name and last name
    $name = $user->first_name . ' ' . $user->last_name;

    // Retrieve additional user meta data
    $image_url = get_user_meta($user_id, 'image_url', true);
    $additional_details = get_user_meta($user_id, 'additional_details', true);

    // Get user profile image URL
    $avatar_url = get_avatar_url($user_id);

    // Combine WooCommerce and WordPress user data
    $merged_data = array(
        'id' => $user->ID,
        'username' => $user->user_login,
        'email' => $user->user_email,
        'name' => $name,
        'billing_address' => $billing_address,
        'shipping_address' => $shipping_address,
        'image_url' => $avatar_url,
        'additional_details' => $additional_details,
        // Add any additional user data you want to include
    );

    return rest_ensure_response($merged_data);
}

/*===========================================================/*
    Register custom endpoint to retrieve product by user ID
/*===========================================================*/
function get_products_by_user_id($request) {
    $user_id = $request->get_param('user_id');

    // Query for products associated with the user
    $products = wc_get_products(array(
        'author'      => $user_id,
        'status'      => 'publish',
        'limit'       => -1,
    ));

    $formatted_products = array();

    foreach ($products as $product) {
        $product_data = $product->get_data();
        $product_image = wp_get_attachment_image_src($product->get_image_id(), 'full');
        $product_categories = wp_get_post_terms($product_data['id'], 'product_cat', array('fields' => 'names'));

        $formatted_products[] = array(
            'id' => $product_data['id'],
            'title' => $product_data['name'],
            'permalink' => $product_data['permalink'],
            'price' => $product->get_price(),
            'image' => $product_image[0],
            'categories' => $product_categories,
            'description' => $product_data['description'],
            'published_date' => $product_data['date_created']->date('Y-m-d H:i:s'),
            // Add any additional product data you want to include
        );
    }

    return rest_ensure_response($formatted_products);
}

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/products/(?P<user_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_products_by_user_id',
    ));
});

/*=========================================/*
    Related products
/*=========================================*/
function get_related_products($request) {
    $product_id = $request->get_param('product_id');
    
    $product = wc_get_product($product_id);
    
    if ($product) {
        $related_ids = $product->get_related();

        $related_products = array();

        foreach ($related_ids as $related_id) {
            $related_product = wc_get_product($related_id);

            $related_products[] = array(
                'id' => $related_product->get_id(),
                'name' => $related_product->get_name(),
                'price' => $related_product->get_price(),
                'image' => wp_get_attachment_image_src($related_product->get_image_id(), 'full')[0],
                // Add any additional product data you want to include
            );
        }

        return rest_ensure_response($related_products);
    } else {
        return new WP_Error('invalid_product_id', 'Invalid product ID.', array('status' => 404));
    }
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
