<?php 
// Template Name: Profile Setting Template
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
                        <div class="user-profile-sidebar-top">
    <?php if ( is_user_logged_in() ) : ?>
        <div class="user-profile-img">
            <?php echo $user_profile_image; ?>
            <form method="POST" enctype="multipart/form-data">
                <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                <input type="file" class="profile-img-file" name="profile_image">
                <input type="submit" value="Upload" name="submit">
            </form>
        </div>
        <h5><?php echo esc_html( $current_user->display_name ); ?></h5>
        <p><?php echo esc_html( $current_user->user_email ); ?></p>
    <?php endif; ?>
</div>
                        <ul class="user-profile-sidebar-list">
                        <ul>
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
                            <div class="user-profile-card profile-setting">
                                <h4 class="user-profile-card-title">Settings</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="mb-3">Privacy Setting</h6>
                                        <div class="profile-privacy-setting">
                                            <form action="#">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="privacy-setting" value="1" type="checkbox" role="switch" id="privacy-setting-1" checked>
                                                    <label class="form-check-label" for="privacy-setting-1">Enable Messages</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="privacy-setting" value="2" type="checkbox" role="switch" id="privacy-setting-2">
                                                    <label class="form-check-label" for="privacy-setting-2">I Want To Receive Email Notify</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="privacy-setting" value="3" type="checkbox" role="switch" id="privacy-setting-3" checked>
                                                    <label class="form-check-label" for="privacy-setting-3">Hide My Phone Number From Public</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="privacy-setting" value="4" type="checkbox" role="switch" id="privacy-setting-4">
                                                    <label class="form-check-label" for="privacy-setting-4">I Want To Receive Message</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="privacy-setting" value="5" type="checkbox" role="switch" id="privacy-setting-5" checked>
                                                    <label class="form-check-label" for="privacy-setting-5">Make My Profile Private</label>
                                                </div>
                                                <div class="my-4">
                                                    <button type="submit" class="theme-btn">Update Settings</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="mb-3">Delete Account</h6>
                                        <div class="post-ad-form">
                                            <form action="#">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option value="">Choose Reason</option>
                                                        <option value="1">Reason One</option>
                                                        <option value="2">Reason Two</option>
                                                        <option value="3">Reason Three</option>
                                                        <option value="4">Reason Four</option>
                                                        <option value="5">Reason Five</option>
                                                        <option value="6">Reason Six</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" cols="30" rows="4" placeholder="Describe Your Reason"></textarea>
                                                </div>
                                                <div class="my-4">
                                                    <button type="submit" class="theme-btn">Delete Account</button>
                                                </div>
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
        <!-- user-profile end -->
    </main>
<?php get_footer();