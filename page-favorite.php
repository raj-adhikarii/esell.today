<?php 
// Template Name: Favorite page
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
                            <div class="user-profile-card profile-favorite">
                                <h4 class="user-profile-card-title">My Favorites</h4>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/beanie-with-logo-1.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-tv"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Electronics</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">Wireless Headphone</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$180</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/beanie-2.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-watch"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Fashions</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">Men's Golden Watch</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$120</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="product-status new">New</span>
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/sunglasses-2.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-mobile-button"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Mobiles</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">iPhone 12 Pro</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$320</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/tshirt-2.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-laptop"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Laptops</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">Macbook M2 Pro</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$460</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="product-status featured">Featured</span>
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/cap-2.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-backpack"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Backpacks</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">School Backpack</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$160</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <img src="http://localhost/esell.today/wp-content/uploads/2023/04/long-sleeve-tee-2.jpg" alt="">
                                                <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-buildings"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#">Property</a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="#">Modern Apartment</a></h5>
                                                    <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p>
                                                    <div class="product-date"><i class="far fa-clock"></i> 10 Days Ago</div>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">$150</div>
                                                    <a href="#" class="product-text-btn">View Details <i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- pagination -->
                                <div class="pagination-area">
                                    <div aria-label="Page navigation example">
                                        <ul class="pagination my-3">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
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