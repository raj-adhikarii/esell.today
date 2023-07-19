<?php get_header(); ?>

<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://staging.e-sell.today/wp-content/uploads/2023/04/head.jpeg)">
            <div class="container">
                <h2 class="breadcrumb-title">Product Category</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Category</li>
                </ul>
            </div>
        </div>



                <!-- product area -->
                    <div class="product-area py-120">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-md-12">
                                        <div class="product-sort">
                                            <h6>Showing 1-10 of 50 Results</h6>
                                            <!-- <div class="product-sort-list-grid">
                                                <a class="product-sort-grid active" href="ad-grid.html"><i class="far fa-grid-2"></i></a>
                                                <a class="product-sort-list" href="ad-list.html"><i class="far fa-list-ul"></i></a>
                                            </div> -->
                                            <div class="col-md-3 product-sort-box">
                                                <select class="select">
                                                    <option value="1">Sort By Default</option>
                                                    <option value="5">Sort By Featured</option>
                                                    <option value="2">Sort By Latest</option>
                                                    <option value="3">Sort By Low Price</option>
                                                    <option value="4">Sort By High Price</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                        <?php
                            $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 8,
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            );

                            $products = new WP_Query( $args );

                            if ( $products->have_posts() ) :
                                while ( $products->have_posts() ) : $products->the_post();
                                    global $product;
                                    $product_id   = $product->get_id();
                                    $product_name = $product->get_name();
                                    $product_price = $product->get_price();
                                    $product_sku = $product->get_sku();
                                    $product_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product_id), 'medium' )[0];
                                    ?>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="product-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                                            <div class="product-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="product-status trending"><i class="fas fa-bolt-lightning"></i></span>
                                                    <?php if ( $product_image_url ): ?>
                                                        <img src="<?php echo esc_url( $product_image_url ); ?>" alt="<?php echo esc_attr( $product_name ); ?>">
                                                    <?php endif; ?>
                                                    <a href="#" class="product-favorite" data-product-id="<?php echo get_the_ID(); ?>"><i class="far fa-heart"></i></a>
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-top">
                                                    <div class="product-category">
                                                        <div class="product-category-icon">
                                                            <i class="far fa-tv"></i>
                                                        </div>
                                                        <h6 class="product-category-title"><a href="#"><?php echo $product->get_categories(); ?></a></h6>
                                                    </div>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5><a href="<?php the_permalink(); ?>"><?php echo $product_name; ?></a></h5>
                                                        <?php
                                                            // Get the vendor ID for the current product
                                                            $vendor_id = get_post_field( 'post_author', get_the_ID() );

                                                            $posted_time = get_the_time('U'); // get the post published time
                                                            $current_time = current_time('timestamp'); // get the current time

                                                            $time_diff = human_time_diff($posted_time, $current_time); // get the time elapsed since post was published

                                                            echo ' <div class="product-date"><i class="far fa-clock"></i> ' . $time_diff . ' ago' . ' </div>'; // display the time elapsed
                                                        ?>

                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price"><?php echo wc_price($product_price); ?></div>
                                                    <a href="<?php the_permalink(); ?>" class="product-text-btn">View Details <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No products found</p>';
                        endif; ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product area end -->

    </main>
<?php get_footer(); 