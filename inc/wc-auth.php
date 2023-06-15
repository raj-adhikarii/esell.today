<?php 

//====== loggedin server site validation =======//
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
            echo 'Login failed: ' . $error_message;
        }
    } else {
        // Invalid nonce
        echo 'Security check failed. Please try again.';
    }
}

//====== signup validation =======//
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
        // Create a new user
        $user_id = wp_create_user( $username, $password, $email );

        if ( ! is_wp_error( $user_id ) ) {
            // Registration successful
            // You can perform additional actions here, such as sending a confirmation email, redirecting the user, etc.
            wp_redirect( site_url( '/profile' ) );
            exit;
        } else {
            // Registration failed
            $errors[] = $user_id->get_error_message();
        }
    }
}

//====== Server-side validation for forget password page ========//
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


//======== custom login endpoint =======//
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
  
    return new WP_REST_Response(array('message' => 'User logged in successfully'), 200);
}


//======= custom user register endpoint ========//
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

  //====== Password reset =========//
// Register custom endpoint for password reset
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

//======= wishlist rest route =======//
add_action('rest_api_init', 'register_wishlist_endpoint');

function register_wishlist_endpoint() {
    register_rest_route('wp/v2', '/wishlist/(?P<user_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_user_wishlist',
    ));
}

//callback function
function get_user_wishlist($request) {
    $user_id = get_current_user_id();

    if ( $user_id === 0 ) {
        // User is not logged in, handle accordingly
        return array();
    }

    // Implement your logic to retrieve wishlist data for the current user
    $wishlist = yith_wishlist_get_products($user_id);

    // Return the wishlist data as the API response
    return $wishlist;
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




  