<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package esell
 */

get_header();
?>
<?php while(have_posts()): the_post(); ?>
<main class="main">

<!-- breadcrumb -->
<div class="site-breadcrumb" style="background: url(https://tinysol.com.au/esell/wp-content/uploads/2023/04/head.jpeg)">
	<div class="container">
		<h2 class="breadcrumb-title"><?php the_title(); ?></h2>
		<ul class="breadcrumb-menu">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li class="active"><?php the_title(); ?></li>
		</ul>
	</div>
</div>



<!-- blog single area -->
<div class="blog-single-area pt-60 pb-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-single-wrapper">
					<div class="blog-single-content">
						<div class="blog-thumb-img">
							<?php esell_post_thumbnail(); ?>
						</div>
						<div class="blog-info">
							<div class="blog-meta">
								<div class="blog-meta-left">
									<ul>
										<li><i class="far fa-user"></i><a href="#"><?php the_author_posts_link(); ?></a></li>
										<!-- <li><i class="far fa-comments"></i>3.2k Comments</li>
										<li><i class="far fa-thumbs-up"></i>1.4k Like</li> -->
									</ul>
								</div>
								<div class="blog-meta-right">
									 <a href="#" class="share-btn"><i class="far fa-share-alt"></i>Share</a>
								</div>
							</div>
							<div class="blog-details">
								<h3 class="blog-details-title mb-20"><?php the_title(); ?></h3>
								<?php the_content(); ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
                <aside class="sidebar">
                    <!-- search-->
                    <div class="widget search">
                        <h5 class="widget-title">Search</h5>
                        <form class="blog-search-form">
                            <input type="text" class="form-control" placeholder="Search Here...">
                            <button type="submit"><i class="far fa-search"></i></button>
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
<!-- blog single area end --> 


</main>
<?php endwhile; ?>

<?php
// get_sidebar();
get_footer();
