<?php 
add_action('rest_api_init', 'register_user_route');

function register_user_route() {
    register_rest_route('jwt-rest/v1', '/register', array(
        'methods' => 'POST',
        'callback' => 'register_user',
    ));
}


function register_user(WP_REST_Request $request) {
    $params = $request->get_params();

    $username = $params['username'];
    $email = $params['email'];
    $password = $params['password'];

    // Additional validation and sanitization can be added here

    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        $error_message = $user_id->get_error_message();
        return new WP_REST_Response(array('error' => $error_message), 400);
    }

    // User registration successful
    return new WP_REST_Response(array('message' => 'User registered successfully'), 200);
}
