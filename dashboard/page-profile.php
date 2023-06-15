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
                                <li><a <?php echo is_page(sanitize_title('dashboard')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/dashboard/"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                                <li><a <?php echo is_page(sanitize_title('profile')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/profile/"><i class="far fa-user"></i> My Profile</a></li>
                                <li><a <?php echo is_page(sanitize_title('my-ads')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/my-ads/"><i class="far fa-layer-group"></i> My Ads</a></li>
                                <li><a <?php echo is_page(sanitize_title('post-ad')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/post-ad/"><i class="far fa-plus-circle"></i> Post Ads</a></li>
                                <li><a <?php echo is_page(sanitize_title('profile-setting')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/profile-setting/"><i class="far fa-gear"></i> Settings</a></li>
                                <li><a <?php echo is_page(sanitize_title('favorite')) ? 'class="active"' : ''; ?> href="<?php echo site_url(); ?>/favorite/"><i class="far fa-heart"></i> Wishlist</a></li>
                                <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="far fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-profile-wrapper">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="user-profile-card">
                                        <h4 class="user-profile-card-title">Profile Info</h4>
                                        <div class="user-profile-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'first_name', true)); ?>" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'last_name', true)); ?>" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'billing_phone', true)) ?: 'Phone not available'; ?>" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <?php
                                                            $user_id = get_current_user_id();
                                                            $address = get_user_meta($user_id, 'billing_address_1', true);
                                                            $city = get_user_meta($user_id, 'billing_city', true);
                                                            $country = get_user_meta($user_id, 'billing_country', true);
                                                            $postcode = get_user_meta($user_id, 'billing_postcode', true);
                                                            $full_address = $address . ', ' . $city . ', ' . $country . ', ' . $postcode;
                                                            ?>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr($full_address); ?>" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                            </form>
                                            <!-- <form id="user-profile-form" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'first_name', true)); ?>" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'last_name', true)); ?>" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" name="email" value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" name="phone" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'billing_phone', true)) ?: 'Phone not available'; ?>" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <?php
                                                            $user_id = get_current_user_id();
                                                            $address = get_user_meta($user_id, 'billing_address_1', true);
                                                            $city = get_user_meta($user_id, 'billing_city', true);
                                                            $country = get_user_meta($user_id, 'billing_country', true);
                                                            $postcode = get_user_meta($user_id, 'billing_postcode', true);
                                                            $full_address = $address . ', ' . $city . ', ' . $country . ', ' . $postcode;
                                                            ?>
                                                            <input type="text" class="form-control" name="address" value="<?php echo esc_attr($full_address); ?>" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                            </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="user-profile-card">
                                        <h4 class="user-profile-card-title">Change Password</h4>
                                        <div class="col-lg-12">
                                            <div class="user-profile-form">
                                            <form action="<?php echo esc_url( wp_lostpassword_url() ); ?>" method="post">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Re-Type Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Re-Type Password" required>
                                                </div>
                                                <button type="submit" class="theme-btn my-3" name="change_password_submit">
                                                    <span class="far fa-key"></span> Change Password
                                                </button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="user-profile-card profile-store">
                                        <h4 class="user-profile-card-title">Personal Info</h4>
                                        <div class="col-lg-12">
                                            <div class="user-profile-form">
                                                <form action="POST" enctype="multipart/form-data">
                                                    <!-- <div class="form-group">
                                                        <div class="store-logo-preview">
                                                            <img src="assets/img/store/01.jpg" alt="">
                                                        </div>
                                                        <input type="file" class="store-file">
                                                        <button type="button" class="theme-btn store-upload"><span class="far fa-upload"></span> Upload Logo</button>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <div class="store-logo-preview">
                                                            <img id="profile-image-preview" src="<?php bloginfo('template_directory'); ?>/assets/img/logo/logow.png" alt="">
                                                        </div>
                                                        <input type="file" id="profile-image-upload" class="store-file">
                                                        <button type="button" id="profile-image-upload-button" class="theme-btn store-upload"><span class="far fa-upload"></span> Upload Profile Image</button>
                                                    </div>

                                                    <script>
                                                        document.getElementById('profile-image-upload').addEventListener('change', function (e) {
                                                            var reader = new FileReader();
                                                            reader.onload = function (event) {
                                                                document.getElementById('profile-image-preview').src = event.target.result;
                                                            }
                                                            reader.readAsDataURL(e.target.files[0]);
                                                        });
                                                    </script>


                                                   
                                                    <div class="form-group">
                                                        <label>Contact Phone Number</label>
                                                        <input type="text" name="contact_phone" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'billing_phone', true)) ?: 'Phone not available'; ?>"
                                                            placeholder="Contact Phone Number">
                                                    </div>
                                                   

                                                    <div class="form-group">
                                                        <label>Contact Email</label>
                                                        <input type="text" name="contact_email" class="form-control" value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>"
                                                            placeholder="Contact Email">
                                                    </div>
                                                    <button type="submit" class="theme-btn my-3"><span class="far fa-save"></span> Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user-profile end -->
    </main>
<?php get_footer(); ?>