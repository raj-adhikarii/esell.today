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
                                    <button type="button" class="profile-img-btn"><a  class="active" href="<?php echo site_url(); ?>/profile"><i class="far fa-camera"></i></a></button>
                                    <!-- <input type="file" class="profile-img-file"> -->
                                </div>

                                <h5><?php echo esc_html( $current_user->display_name ); ?></h5>
                                <p><?php echo esc_html( $current_user->user_email ); ?></p>
                            <?php endif; ?>
                        </div>
                        <ul class="user-profile-sidebar-list">
                        <ul>
                            <?php  
                                require get_template_directory() . '/inc/dashboard-sidebar.php'; 
                            ?>
                        </ul>
                    </div>
                </div>
                    <div class="col-lg-9">
                        <div class="user-profile-wrapper">
                            <div class="user-profile-card profile-favorite">
                                <h4 class="user-profile-card-title">My Favorites</h4>
                                <?php
                                    $default_wishlist = YITH_WCWL_Wishlist_Factory::get_default_wishlist();

                                    if (!empty($default_wishlist)) :
                                        $items = $default_wishlist->get_items();
                                        if (!empty($items)) :
                                    ?>
                                            <div class="row">
                                                <?php
                                                foreach ($items as $item) :
                                                    $product_id = $item->get_product_id();
                                                    $product = wc_get_product($product_id);
                                                    if ($product) :
                                                ?>
                                                        <div class="col-md-6 col-lg-4">
                                                            <div class="product-item">
                                                                <div class="product-img">
                                                                    <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                                                    <?php if (has_post_thumbnail($product_id)) : ?>
                                                                        <img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" alt="<?php echo get_the_title($product_id); ?>">
                                                                        <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="product-content">
                                                                    <?php
                                                                    $categories = get_the_terms($product_id, 'product_cat');
                                                                    if (!empty($categories)) :
                                                                        $category = reset($categories);
                                                                    ?>
                                                                        <div class="product-top">
                                                                            <div class="product-category">
                                                                                <div class="product-category-icon">
                                                                                    <i class="far fa-tv"></i>
                                                                                </div>
                                                                                <h6 class="product-category-title"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></h6>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="product-info">
                                                                        <h5><a href="<?php the_permalink($product_id); ?>"><?php echo get_the_title($product_id); ?></a></h5>
                                                                        <div class="product-date">
                                                                            <i class="far fa-clock"></i>
                                                                            <?php
                                                                            $publish_date = get_post_field('post_date', $product_id);
                                                                            $days_ago = human_time_diff(strtotime($publish_date), current_time('timestamp')) . ' ago';
                                                                            echo $days_ago;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-bottom">
                                                                        <div class="product-price">
                                                                            <?php
                                                                            if ($product->is_on_sale()) {
                                                                                echo '<del>' . wc_price($product->get_regular_price()) . '</del> ' . wc_price($product->get_sale_price());
                                                                            } else {
                                                                                echo wc_price($product->get_price());
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <a href="<?php the_permalink($product_id); ?>" class="product-text-btn">View Details <i class="fas fa-arrow-right"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </div>
                                    <?php
                                        endif;
                                    endif;
                                    ?>

                                <!-- pagination -->
                                <!-- <div class="pagination-area">
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user-profile end -->
    </main>
<?php get_footer(); 