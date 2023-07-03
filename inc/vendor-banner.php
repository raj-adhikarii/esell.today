<?php 
// Add store name field to user profile
function add_store_name_field($user) {
    ?>
    <h2><?php esc_html_e('Store Information', 'woocommerce'); ?></h2>

    <table class="form-table">
        <tr>
            <th>
                <label for="store_name"><?php esc_html_e('Store Name', 'woocommerce'); ?></label>
            </th>
            <td>
                <input type="text" name="store_name" id="store_name" value="<?php echo esc_attr(get_user_meta($user->ID, 'store_name', true)); ?>" class="regular-text">
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'add_store_name_field');
add_action('edit_user_profile', 'add_store_name_field');

// Save store name field
function save_store_name_field($user_id) {
    if (current_user_can('edit_user', $user_id)) {
        update_user_meta($user_id, 'store_name', sanitize_text_field($_POST['store_name']));
    }
}
add_action('personal_options_update', 'save_store_name_field');
add_action('edit_user_profile_update', 'save_store_name_field');


//===== Password Change =======//
function handle_password_change_submission() {
    if (isset($_POST['change_password_submit'])) {
        $current_user = wp_get_current_user();
        $old_password = sanitize_text_field($_POST['old_password']);
        $new_password = sanitize_text_field($_POST['new_password']);
        $confirm_password = sanitize_text_field($_POST['confirm_password']);

        // Verify the old password
        if (wp_check_password($old_password, $current_user->user_pass, $current_user->ID)) {
            // Old password is correct, proceed with password update
            if ($new_password === $confirm_password) {
                // Update the user's password
                wp_set_password($new_password, $current_user->ID);

                // Display success message or redirect to a success page
                echo 'Password updated successfully!';
            } else {
                // New password and confirm password do not match
                echo 'New password and confirm password do not match.';
            }
        } else {
            // Old password is incorrect
            echo 'Invalid old password.';
        }
    }
}
add_action('init', 'handle_password_change_submission');

