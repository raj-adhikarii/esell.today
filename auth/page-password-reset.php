<?php
/*
 * Template Name: Password Reset
 */

 get_header();

 if (isset($_POST['password_reset']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
     $user_login = $_GET['login'];
     $reset_key = $_GET['key'];
 
     $user = check_password_reset_key($reset_key, $user_login);
 
     if (!is_wp_error($user)) {
         $new_password = $_POST['new_password'];
         $confirm_password = $_POST['confirm_password'];
 
         if ($new_password === $confirm_password) {
             reset_password($user, $new_password);
             wc_add_notice(__('Your password has been reset successfully!', 'woocommerce'), 'success');
         } else {
             wc_add_notice(__('New password and confirm password do not match.', 'woocommerce'), 'error');
         }
     } else {
         wc_add_notice(__('Invalid password reset key.', 'woocommerce'), 'error');
     }
 }
 ?>
 
 <div id="primary" class="content-area">
     <main id="main" class="site-main">
 
         <div class="woocommerce">
             <?php wc_print_notices(); ?>
 
             <form method="post" class="woocommerce-form woocommerce-form-reset-password">
                 <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                     <label for="new_password"><?php esc_html_e('New Password', 'woocommerce'); ?><span class="required">*</span></label>
                     <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="new_password" id="new_password" required />
                 </p>
                 <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                     <label for="confirm_password"><?php esc_html_e('Confirm Password', 'woocommerce'); ?><span class="required">*</span></label>
                     <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="confirm_password" id="confirm_password" required />
                 </p>
                 <input type="hidden" name="password_reset" value="true" />
                 <?php wp_nonce_field('password-reset', 'password-reset-nonce'); ?>
                 <p class="form-row">
                     <button type="submit" class="woocommerce-Button button" name="reset_submit"><?php esc_html_e('Reset Password', 'woocommerce'); ?></button>
                 </p>
             </form>
         </div>
 
     </main><!-- #main -->
 </div><!-- #primary -->
 
 <?php get_footer(); ?>