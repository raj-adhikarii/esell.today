<?php 

// loggedin server site validation
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


//signup validation
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
            wp_redirect( site_url( '/login/' ) );
            exit;
        } else {
            // Registration failed
            $errors[] = $user_id->get_error_message();
        }
    }
}

// Server-side validation for forget password page 
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


// custom login endpoint
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


//custom user register endpoint
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
  