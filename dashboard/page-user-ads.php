<?php 
/* Template Name: User Ads Template */
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
                    <div class="user-profile-card profile-ad">
                        <div class="user-profile-card-header">
                            <h4 class="user-profile-card-title">My Ads</h4>
                            <?php  
                                $current_user = wp_get_current_user();
                                $user_id = $current_user->ID;
                            ?>
                            <div class="user-profile-card-header-right">
                                <div class="user-profile-search">
                                    <div class="form-group">
                                        <form id="my-ads-search-form" method="POST">
                                            <input type="text" name="search_text" class="form-control" placeholder="Search...">
                                            <i class="far fa-search"></i>
                                        </form>
                                    </div>
                                </div>
                                <a href="<?php echo site_url(); ?>/post-ad/" class="theme-btn"><span class="far fa-plus-circle"></span>Post Ads</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <?php 
                                    $current_user = wp_get_current_user();
                                    $user_id = $current_user->ID;
                                    
                                    $args = array(
                                        'author'         => $user_id,
                                        'post_type'      => 'product',
                                        'post_status'    => array( 'publish', 'draft' ),
                                        'posts_per_page' => 8,
                                    );
                                    $query = new WP_Query( $args );
                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ads Info</th>
                                            <th>Category</th>
                                            <th>Publish</th>
                                            <th>Price</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="product-data">
                                    <?php 
                                        $count=1;
                                        while($query->have_posts()):
                                        $query->the_post();
                                        $product_id = get_the_ID();
                                        $product=wc_get_product($product_id);
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="<?php the_permalink() ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" class="img-responsive" alt="<?php the_title(); ?>"/>
                                                        <div class="table-ad-content">
                                                            <h6><?php echo get_the_title($product->ID); ?></h6>
                                                            <span>Ad ID: #<?php echo $product_id ?></span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="max-width:200px;overflow:hidden;">
                                                <?php
                                                    $categories = get_the_terms($product->ID, 'product_cat');
                                                    if ($categories && !is_wp_error($categories)) {
                                                        $category_names = array();
                                                        foreach ($categories as $category) {
                                                            $category_names[] = $category->name;
                                                        }
                                                        echo implode(', ', $category_names);
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $publish_date = get_post_field('post_date', $product->ID);
                                                    $days_ago = human_time_diff(strtotime($publish_date), current_time('timestamp')) . ' ago';
                                                    echo $days_ago;
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                    if ($product->is_on_sale()) {
                                                        $regular_price = $product->get_regular_price();
                                                        $sale_price = $product->get_sale_price();
                                                        echo '<del>' . wc_price($regular_price) . '</del> ' . wc_price($sale_price);
                                                    } else {
                                                        $price = $product->get_price();
                                                        echo wc_price($price);
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                    <?php
                                                    // Get the current view count
                                                    $view_count = get_post_meta($product->get_id(), 'view_count', true);
                                                    if(empty($view_count)):
                                                        $view_count=0;
                                                    endif;  
                                                    // Display the view count
                                                    echo 'Views: ' . $view_count;
                                                ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">
                                                <?php
                                                    $product_status = get_post_status($product->get_id());
                                                    echo $product_status;
                                                ?>
                                                </span>
                                                <a href="/post-ad/?edit=true&product_id=<?php echo $product_id ?>" class="btn btn-link">Edit AD</a>
                                            </td>
                                        </tr>
                                        <?php $count++; endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php  
                                if($count>8):
                            ?>
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
                            <?php  
                                endif;
                            ?>
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