<?php get_header(); 
// Template Name: Registration Template
define('WP_INSTALL_PATH', dirname(__FILE__) . '/'); // Adjust the path if needed


// Redirect user after registration
// function custom_registration_redirect($redirect) {
//     $custom_url = 'https://google.com'; // Replace with your desired URL
//     return $custom_url;
// }
// add_filter('woocommerce_registration_redirect', 'custom_registration_redirect');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = sanitize_user($_POST['username']);
//     $email = sanitize_email($_POST['email']);
//     $password = $_POST['password'];

//     // Perform form validation and error handling as needed

//     // Register the user using WooCommerce registration function
//     $user_id = wc_create_new_customer($email, $username, $password);

//     if (is_wp_error($user_id)) {
//         // Registration failed
//         $error_message = $user_id->get_error_message();
//         // Display or handle the error as needed
//     }
// }
// ?>

<main class="main">

<!-- breadcrumb -->
<?php if(has_post_thumbnail($post->ID)):
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
    <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
        <div class="container">
            <h2 class="breadcrumb-title"><?php echo get_the_title(); ?></h2>
            <ul class="breadcrumb-menu">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active"><?php echo get_the_title(); ?></li>
            </ul>
        </div>
    </div>
<?php endif; ?>

<!-- register area -->
<div class="login-area py-120">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <?php the_custom_logo(); ?>
                    <p>Create your account</p>
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Your Name">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Your Password">
                        <i class="far fa-lock"></i>
                    </div>
                    <div class="form-check form-group">
                        <input class="form-check-input" type="checkbox" value="" id="agree">
                        <label class="form-check-label" for="agree">
                           I agree with the <a href="<?php echo site_url(); ?>/terms-of-use/">Terms Of Service.</a>
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Sign Up</button>
                    </div>

                    <?php if ( ! empty( $errors ) ) : ?>
                        <div class="alert alert-danger mt-3" id="error-message" role="alert">
                            <ul>
                                <?php foreach ( $errors as $error ) : ?>
                                    <li><?php echo esc_html( $error ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </form>
                <div class="login-footer">
                    <div class="login-divider"><span>Or</span></div>
                    <div class="social-login">
                        <!-- <a href="#" class="btn-fb"><i class="fab fa-facebook"></i> Login With Facebook</a> -->
                        <a href="#" class="btn-gl"><i class="fab fa-google"></i> Login With Google</a>
                    </div>
                    <p>Already have an account? <a href="<?php echo site_url(); ?>/login/">Sign In.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<?php get_footer(); ?>
