<?php get_header()
// Template Name: Check you mail
?>

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



<!-- error area -->
<div class="error-area py-120">
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="error-wrapper">
                <h2>Email Sent!</h2>
                <p>Please check your email to reset your account password.</p>
                <a href="<?php echo site_url(); ?>/login/" class="theme-btn">Go Back Login <i class="far fa-user"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- error area end -->


</main>

<?php get_footer();