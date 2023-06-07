<?php 
/* Template Name: Post Ad Template */
get_header(); ?>

<main class="main">
    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
        ?>
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
                        <div class="user-profile-card">
                            <h4 class="user-profile-card-title">Post Ads</h4>
                            <div class="col-lg-12">
                                <div class="post-ad-form">
                                    <h6 class="mb-4">Basic Information</h6>
                                    <form action="#">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" id="product-title" class="form-control" placeholder="Enter title">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="select">
                                                        <option value="">Category</option>
                                                        <option value="1">All Category</option>
                                                        <option value="2">Electronics</option>
                                                        <option value="3">Laptops & PCs</option>
                                                        <option value="4">Mobiles</option>
                                                        <option value="5">Property</option>
                                                        <option value="6">Vehicles</option>
                                                        <option value="7">Fashions</option>
                                                        <option value="8">Animals</option>
                                                        <option value="9">Furnitures</option>
                                                        <option value="10">Educations</option>
                                                        <option value="11">Jobs</option>
                                                        <option value="12">Sports & Games</option>
                                                        <option value="13">Health & Beauty</option>
                                                        <option value="14">Matrimony</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Price (USD)</label>
                                                    <input type="text" id="product-price" class="form-control" placeholder="Enter price">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Tags or keyword</label>
                                                    <input type="text" id="product-tag" class="form-control" placeholder="Enter tags ex: watch,laptop">
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Upload Images</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="product-upload-wrapper">
                                                        <div class="product-img-upload">
                                                            <span><i class="far fa-images"></i> Upload Product Images</span>
                                                        </div>
                                                        <input type="file" class="product-img-file" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Location</h6>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" id="user-location" class="form-control" placeholder="Enter address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" id="user-city" class="form-control" placeholder="Enter city">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" id="user-state" class="form-control" placeholder="Enter state">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Zip Code</label>
                                                    <input type="text" id="user-zip" class="form-control" placeholder="Enter zip code">
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Detailed Information</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="product-description" placeholder="Write description" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Contact Information</h6>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" id="contact-name" class="form-control" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" id="contact-email" class="form-control" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" id="contact-phone" class="form-control" placeholder="Enter phone">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="agree" type="checkbox" value="" id="agree">
                                                    <label class="form-check-label" for="agree">
                                                        I Agree With Your Terms Of Services And Privacy Policy.
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="col-lg-12 my-4 ads">
                                                <button type="submit" class="theme-btn">Post Your Ads</button>
                                            </div>
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
    <!-- user-profile end -->
</main>
<?php get_footer(); 