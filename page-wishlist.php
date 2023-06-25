<?php get_header(); 
/* Template name: Wishlist Template */
?>

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

    <div class="container">
        <div class="col-lg-12 my-3 py-5">
            <div class="user-profile-wrapper">
                <div class="user-profile-card profile-favorite">
                    <h4 class="user-profile-card-title">My Favorites</h4>
                    <?php  
                        $products         = array();
                        $default_wishlist = YITH_WCWL_Wishlist_Factory::get_default_wishlist();
                        // print
                        if(!empty($default_wishlist)):

                    ?>
                    <div class="row">
                        <?php  
                            $items = $default_wishlist->get_items();
                            if ( ! empty( $items ) ):
                                $count=1;
                                foreach ( $items as $item ):
                                $product_id=$item->get_product()->get_id();
                                $product=wc_get_product( $product_id );
                        ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                    <?php  
                                        if(has_post_thumbnail($product_id)):
                                    ?>
                                    <img src="<?php echo get_the_post_thumbnail_url($product_id) ?>" alt="<?php echo get_the_title($product_id) ?>">
                                    <a href="#" class="product-favorite"><i class="far fa-heart"></i></a>
                                    <?php endif; ?>
                                </div>
                                <div class="product-content">
                                    <?php  
                                        $categories = get_the_terms($product_id, 'product_cat');    
                                        //var_dump($categories);
                                        if(!empty($categories)):
                                    ?>
                                    <div class="product-top">
                                        <div class="product-category">
                                            <div class="product-category-icon">
                                                <i class="far fa-tv"></i>
                                            </div>
                                            
                                            <h6 class="product-category-title"><a href="<?php echo get_category_link($categories[0]->term_id) ?>"><?php echo $categories[0]->name;  ?></a></h6>
                                        </div>
                                        <!-- <div class="product-rate">
                                            <i class="fas fa-star"></i>
                                            <span>4.5</span>
                                        </div> -->
                                    </div>
                                    <?php endif; ?>
                                    <div class="product-info">
                                        <h5><a href="<?php the_permalink($product_id) ?>"> <?php echo get_the_title($product_id) ?> </a></h5>
                                        <!-- <p><i class="far fa-location-dot"></i> 25/A Road New York, USA</p> -->
                                        <div class="product-date">
                                            <i class="far fa-clock"></i> 
                                            <?php
                                                $publish_date = get_post_field('post_date', $product->ID);
                                                $days_ago = human_time_diff(strtotime($publish_date), current_time('timestamp')) . ' ago';
                                                echo $days_ago;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
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
                                        </div>
                                        <a href="<?php  the_permalink($product_id) ?>" class="product-text-btn">View Details <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php 
                                $count++; 
                                endforeach;
                            endif;
                        ?>
                    </div>
                    <?php  
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    </main>
<?php get_footer(); 