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
                                            <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                                            <input type="file" class="profile-img-file">
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
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'phone', true)) ?: 'Phone not available'; ?>" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'address', true)) ?: 'Address not available'; ?>" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="user-profile-card">
                                        <h4 class="user-profile-card-title">Change Password</h4>
                                        <div class="col-lg-12">
                                            <div class="user-profile-form">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Old Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="New Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Re-Type Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Re-Type Password">
                                                    </div>
                                                    <button type="button" class="theme-btn my-3"><span class="far fa-key"></span> Change Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="user-profile-card profile-store">
                                        <h4 class="user-profile-card-title">Store Info</h4>
                                        <div class="col-lg-12">
                                            <div class="user-profile-form">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <div class="store-logo-preview">
                                                            
                                                        <?php echo get_avatar(get_current_user_id(), 150); ?>
                                                        </div>
                                                        <input type="file" class="store-file">
                                                        <button type="button" class="theme-btn store-upload"><span class="far fa-upload"></span> Upload Logo</button>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="store-banner-preview">
                                                            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/store/banner.jpg')); ?>" alt="<?php _e('Asset description'); ?>">
                                                        </div>
                                                        <input type="file" class="store-file">
                                                        <button type="button" class="theme-btn store-upload mb-4"><span class="far fa-upload"></span> Upload Banner</button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Store Name</label>
                                                        <input type="text" class="form-control" value="Ritro Fashion"
                                                            placeholder="Store Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact Phone Number</label>
                                                        <input type="text" class="form-control" value="+977 9808009469"
                                                            placeholder="Contact Phone Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact Email</label>
                                                        <input type="text" class="form-control" value="Admin@admin.com"
                                                            placeholder="Contact Email">
                                                    </div>
                                                    <button type="button" class="theme-btn my-3"><span class="far fa-save"></span> Save Changes</button>
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