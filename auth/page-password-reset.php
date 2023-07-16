<?php
/*
 * Template Name: Password Reset
 */

 get_header();

 if ( isset( $_POST['reset_submit'] ) ) {
     $user_login = isset( $_GET['login'] ) ? $_GET['login'] : '';
     $reset_key  = isset( $_GET['key'] ) ? $_GET['key'] : '';
 
     $user = check_password_reset_key( $reset_key, $user_login );
 
     if ( ! is_wp_error( $user ) ) {
         $new_password        = $_POST['new_password'];
         $confirm_new_password = $_POST['confirm_password'];
 
         if ( $new_password === $confirm_new_password ) {
             reset_password( $user, $new_password );
             wc_add_notice( __( 'Your password has been reset successfully!', 'woocommerce' ), 'success' );
         } else {
             wc_add_notice( __( 'New password and confirm password do not match.', 'woocommerce' ), 'error' );
         }
     } else {
         wc_add_notice( __( 'Invalid password reset key.', 'woocommerce' ), 'error' );
     }
 }
 ?>

<main class="main">
    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail'); ?>
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

    <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo/logo.png')); ?>" alt="<?php _e('Asset description'); ?>">
                            <p>Reset your account password</p>
                        </div>
                        
                        <?php
    if (!password_reset_was_successful()) {
        echo '<form class="woocommerce-form-reset-password" method="POST">';
        echo '<div class="form-group">';
        echo '<label>New Password</label>';
        echo '<input type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="new_password" id="new_password" required />';
        echo '<i class="far fa-lock"></i>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label>Confirm Password</label>';
        echo '<input type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="confirm_password" id="confirm_password" required />';
        echo '<i class="far fa-lock"></i>';
        echo '</div>';

        echo '<input type="hidden" name="reset_submit" value="true" />';
        echo wp_nonce_field( 'reset_password', 'reset_password_nonce', false, false );

        echo '<div class="d-flex align-items-center">';
        echo '<input type="hidden" name="action" value="custom_login_authentication">';
        echo wp_nonce_field('custom_login_nonce', 'custom_login_nonce', false, false );
        echo '<button type="submit" class="theme-btn" name="reset_submit">' . esc_html_e( 'Reset Password', 'woocommerce' ) . '</button>';
        echo '</div>';

        echo '</form>';
    } else {
        echo '<p>Password reset successful!</p>';
        if (is_user_logged_in()) {
            echo '<a href="/login" class="theme-btn text-center">Login</a>';
        }
    }
?>
<div class="mt-3">
    <?php wc_print_notices(); ?>
</div>

                    </div>
                </div>
            </div>
        </div>
</main><!-- #main -->

 <?php get_footer(); ?>