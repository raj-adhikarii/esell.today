<?php 
// Template Name: Buy and sell Template
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

    <div class="container">
    <!-- buy and sell area -->
    <div class="contact-area mt-5 pb-120">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-content">
                            <div class="contact-info">
                                <div class="contact-info-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5>Office Address</h5>
                                    <p>25/B Milford, New York, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 align-self-center">
                        <div class="blog-single-wrapper contact-form">
                            <div class="blog-single-content">
                                <div class="blog-thumb-img">
                                    <img src="assets/img/blog/single.jpg"  alt="thumb">
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                <li><i class="far fa-user"></i><a href="#">Jean R Gunter</a></li>
                                                <li><i class="far fa-comments"></i>3.2k Comments</li>
                                                <li><i class="far fa-thumbs-up"></i>1.4k Like</li>
                                            </ul>
                                        </div>
                                        <div class="blog-meta-right">
                                            <a href="#" class="share-btn"><i class="far fa-share-alt"></i>Share</a>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <h3 class="blog-details-title mb-20">It is a long established fact that a reader</h3>
                                        <p class="mb-10">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                                        </p>
                                        <p class="mb-10">
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. 
                                        </p>
                                        <blockquote class="blockqoute">
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.
                                            <h6 class="blockqoute-author">Mark Crawford</h6>
                                        </blockquote>
                                        <p class="mb-20">
                                            In a free hour when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection.
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end buy and sell area  -->
    </div>
    <div class="container">
    <!-- buy and sell area -->
    <div class="contact-area pb-120">
            <div class="container">
                <div class="contact-wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-content">
                                <div class="contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h5>Office Address</h5>
                                        <p>25/B Milford, New York, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 align-self-center">
                            <div class="blog-single-wrapper contact-form">
                                <div class="blog-single-content">
                                    <div class="blog-thumb-img">
                                        <img src="assets/img/blog/single.jpg"  alt="thumb">
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-meta">
                                            <div class="blog-meta-left">
                                                <ul>
                                                    <li><i class="far fa-user"></i><a href="#">Jean R Gunter</a></li>
                                                    <li><i class="far fa-comments"></i>3.2k Comments</li>
                                                    <li><i class="far fa-thumbs-up"></i>1.4k Like</li>
                                                </ul>
                                            </div>
                                            <div class="blog-meta-right">
                                                <a href="#" class="share-btn"><i class="far fa-share-alt"></i>Share</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3 class="blog-details-title mb-20">It is a long established fact that a reader</h3>
                                            <p class="mb-10">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                                            </p>
                                            <p class="mb-10">
                                                But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. 
                                            </p>
                                            <blockquote class="blockqoute">
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.
                                                <h6 class="blockqoute-author">Mark Crawford</h6>
                                            </blockquote>
                                            <p class="mb-20">
                                                In a free hour when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection.
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end buy and sell area  -->
    </div>
</main>


<?php get_footer();
