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


// Add the custom field to the user profile
function add_banner_image_field($user) {
    ?>
    <h3><?php esc_html_e('Banner Image', 'text-domain'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="banner_image"><?php esc_html_e('Upload Banner Image', 'text-domain'); ?></label></th>
            <td>
                <?php
                $banner_image = get_user_meta($user->ID, 'banner_image', true);
                $banner_image_url = $banner_image ? wp_get_attachment_url($banner_image) : '';
                ?>
                <input type="hidden" name="banner_image" id="banner_image" value="<?php echo esc_attr($banner_image); ?>">
                <div id="banner_image_preview">
                    <?php if ($banner_image_url) : ?>
                        <img src="<?php echo esc_url($banner_image_url); ?>" alt="<?php esc_attr_e('Banner Image Preview', 'text-domain'); ?>" style="max-width: 200px;">
                    <?php endif; ?>
                </div>
                <button type="button" class="button" id="upload_banner_image_button"><?php esc_html_e('Upload Image', 'text-domain'); ?></button>
                <button type="button" class="button" id="remove_banner_image_button"><?php esc_html_e('Remove Image', 'text-domain'); ?></button>
            </td>
        </tr>
    </table>

    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;

            // Handle the upload button click
            $('#upload_banner_image_button').on('click', function(e) {
                e.preventDefault();

                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: '<?php esc_html_e("Upload Banner Image", "text-domain"); ?>',
                    button: {
                        text: '<?php esc_html_e("Select Image", "text-domain"); ?>'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#banner_image').val(attachment.id);
                    $('#banner_image_preview').html('<img src="' + attachment.url + '" alt="<?php esc_attr_e("Banner Image Preview", "text-domain"); ?>" style="max-width: 200px;">');
                });

                mediaUploader.open();
            });

            // Handle the remove button click
            $('#remove_banner_image_button').on('click', function(e) {
                e.preventDefault();
                $('#banner_image').val('');
                $('#banner_image_preview').html('');
            });
        });
    </script>
    <?php
}
add_action('show_user_profile', 'add_banner_image_field');
add_action('edit_user_profile', 'add_banner_image_field');

// Save the custom field data
function save_banner_image_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    if (isset($_POST['banner_image'])) {
        update_user_meta($user_id, 'banner_image', sanitize_text_field($_POST['banner_image']));
    }
}
add_action('personal_options_update', 'save_banner_image_field');
add_action('edit_user_profile_update', 'save_banner_image_field');


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

