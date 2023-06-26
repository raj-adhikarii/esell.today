<?php 
/* Template Name: Profile Template */
get_header(); ?>

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

        <!-- user-profile -->
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="user-profile-sidebar">
                            <div class="user-profile-sidebar-top">
                                <?php if ( is_user_logged_in() ) : ?>
                                    <?php
                                        $current_user = wp_get_current_user();
                                        $user_profile_link = get_author_posts_url( $current_user->ID );
                                        $user_profile_image = get_avatar( $current_user->ID, 32 );
                                    ?>
                                    <div class="user-profile-img">
                                        <?php echo $user_profile_image; ?>
                                        <button type="button" class="profile-img-btn"><a  class="active" href="<?php echo site_url(); ?>/profile"><i class="far fa-camera"></i></a></button>
                                        <!-- <input type="file" class="profile-img-file"> -->
                                    </div>

                                    <h5><?php echo esc_html( $current_user->display_name ); ?></h5>
                                    <p><?php echo esc_html( $current_user->user_email ); ?></p>
                                <?php endif; ?>
                            </div>

                            <ul class="user-profile-sidebar-list">
                                <?php  
                                    require get_template_directory() . '/inc/dashboard-sidebar.php'; 
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-profile-wrapper">
                            <div class="row">
                                <?php
                                    do_action( 'woocommerce_before_edit_account_form' ); 
                                    $user=$current_user;
                                ?>
                                <form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?>  enctype="multipart/form-data" >

                                    <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="user-profile-card">
                                                    <h4 class="user-profile-card-title">Profile Info</h4>
                                                    <div class="user-profile-form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" style="display:none">
                                                                <div class="form-group">
                                                                    <label>Display Name</label>
                                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                                                                </div>
                                                            </div>
                                                            <?php do_action( 'woocommerce_edit_account_form' ); ?>
                                                            <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                                                            <button type="submit" class="theme-btn my-3 woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><span class="far fa-user"></span><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
                                                            <input type="hidden" name="action" value="save_account_details" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="user-profile-card">
                                                    <h4 class="user-profile-card-title">Change Password</h4>
                                                    <div class="col-lg-12">
                                                        <div class="user-profile-form">
                                                            <div class="form-group">
                                                                <label for="password_current">Old Password</label>
                                                                <input type="password" class="form-control" name="password_current" id="password_current" autocomplete="off" placeholder="Old Password">
                                                            </div>
                                            
                                                            <div class="form-group">
                                                                <label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
                                                                <input type="password" class="form-control" name="password_1" id="password_1" autocomplete="off" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
                                                                <input type="password" class="form-control" name="password_2" id="password_2" autocomplete="off" />
                                                            </div>
                                                            
                                                            <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                                                            <button type="submit" class="theme-btn my-3" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><span class="far fa-key"></span><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
                                                            <input type="hidden" name="action" value="save_account_details" />
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-lg-12">
                                                <div class="user-profile-card profile-store">
                                                    <h4 class="user-profile-card-title">Store Info</h4>
                                                    <div class="col-lg-12">
                                                        <div class="user-profile-form">
                                                        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    
                                </form>
                                <?php do_action( 'woocommerce_after_edit_account_form' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user-profile end -->
    </main>
<?php get_footer(); ?>
<!-- https://stackoverflow.com/questions/68909032/set-order-of-uploaded-images-js-php -->