<?php get_header(); ?>

<main class="main">

    <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://staging.e-sell.today/wp-content/uploads/2023/04/head.jpeg)">
            <div class="container">
                <h2 class="breadcrumb-title">Blog</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>

        <!-- blog-area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Blog</span>
                            <h2 class="section-title">Our Latest News & Blog</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-lg-8 mb-5">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'category_name' => 'blog',
                                'posts_per_page' => 6,
                                'paged' => $paged
                            );
                            $query = new WP_Query($args);
                            ?>

                            <?php if ($query->have_posts()) : ?>
                                <div class="row">
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                        <div class="col-md-6">
                                            <div class="blog-item">
                                                <div class="blog-item-img">
                                                    <?php the_post_thumbnail('full', ['alt' => esc_html(get_the_title())]); ?>
                                                </div>
                                                <div class="blog-item-info">
                                                    <div class="blog-item-meta">
                                                        <ul>
                                                            <li><a href="<?php the_permalink(); ?>"><i class="far fa-user-circle"></i> By <?php echo get_the_author(); ?></a></li>
                                                            <li><a href="<?php the_permalink(); ?>"><i class="far fa-calendar-alt"></i><?php the_time('F j, Y'); ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="blog-title">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <a class="theme-btn" href="<?php the_permalink(); ?>">Read More<i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>

                                <div class="center">
                                    <div class="pagination">
                                        <?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- search-->
                            <div class="widget search">
                                <h5 class="widget-title">Search</h5>
                                <!-- <form class="blog-search-form">
                                    <input type="text" class="form-control" placeholder="Search Here...">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form> -->

                                <form role="search" method="get" class="search-form blog-search-form" action="<?php echo home_url( '/' ); ?>">
                                    <div class="form-group">
                                        <label>
                                            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                                            <div class="input-group">
                                                <input type="text" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search Here...', 'placeholder' ) ?>"
                                                    value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary"><i class="far fa-search"></i></button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </form>


                            </div>
                            <!-- category -->
                            <div class="widget category">
                                <h5 class="widget-title">Category</h5>
                                <div class="category-list">
                                    <?php
                                        $categories = get_the_category();
                                        $category_list = join( ', ', wp_list_pluck( $categories, 'name' ) );
                                        echo '<a href="#"><i class="far fa-arrow-right"></i>' . wp_kses_post( $category_list ) . '</a>';
                                    ?>
                                    
                                </div>
                            </div>
                            <!-- recent post -->
                            <div class="widget recent-post">
                                <h5 class="widget-title">Recent Post</h5>
                                <?php
                                    $recent_posts = wp_get_recent_posts(array(
                                        'numberposts' => 4,
                                        'post_status' => 'publish' 
                                    ));

                                foreach( $recent_posts as $post_item ) : ?>
                                <div class="recent-post-single">
                                    <div class="recent-post-img">
                                        <?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><?php echo $post_item['post_title'] ?></h6>
                                        <span><i class="far fa-clock"></i><?php the_time('F j, Y'); ?></span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- social share -->
                            <div class="widget social-share">
                                <h5 class="widget-title">Follow Us</h5>
                                <div class="social-share-link">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->

    </main>
<?php get_footer();