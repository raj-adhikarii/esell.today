<?php
function e_sell_options_page() {
    add_menu_page(
        'Theme Options', // Page title
        'Theme Options', // Menu title
        'manage_options', // Capability required to access the page
        'theme-options', // Menu slug
        'e_sell_options_callback', // Callback function to display the options page
        'dashicons-admin-generic' // Icon URL or dashicon class name
    );
}
add_action( 'admin_menu', 'e_sell_options_page' );

function e_sell_options_init() {
    register_setting(
        'e_sell_options_group', // Option group
        'address' // Option name
    );

    register_setting(
        'e_sell_options_group',
        'phone'
    );

    register_setting(
        'e_sell_options_group',
        'email'
    );

    register_setting(
        'e_sell_options_group',
        'open_time'
    );

    register_setting(
        'e_sell_options_group',
        'copyright'
    );
  
}
add_action( 'admin_init', 'e_sell_options_init' );

function e_sell_options_callback() {
    // Display your options page HTML here
    ?>
    <div class="wrap">
        <h1>Theme Options</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'e_sell_options_group' ); ?>
            <?php do_settings_sections( 'e_sell_options_page' ); ?>
            <div class="d-flex">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo esc_attr( get_option( 'address' ) ); ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo esc_attr( get_option( 'phone' ) ); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo esc_attr( get_option( 'email' ) ); ?>">
                </div>

                <div class="form-group">
                    <label for="open_time">Open Time</label>
                    <input type="text" name="open_time" id="open_time" class="form-control" value="<?php echo esc_attr( get_option( 'open_time' ) ); ?>">
                </div>
            </div>

            <div class="form-group mt-2">
                <label for="copyright">Copyright</label>
                <input type="text" name="copyright" id="copyright" class="form-control" value="<?php echo esc_attr( get_option( 'copyright' ) ); ?>">
            </div>
            <?php submit_button(); ?>
        </form>
    </div>

    <style>
        .wrap {
            max-width: 800px;
            /* margin: 0 auto; */
            padding: 20px;
        }

        .d-flex {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .mt-2{
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="email"] {
            text-align: left;
        }

        @media (max-width: 767px) {
            .form-control {
                font-size: 14px;
            }
        }
    </style>
    <?php
}
