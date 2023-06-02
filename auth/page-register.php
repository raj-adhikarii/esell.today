<?php get_header(); 
// Template Name: Registration Template
?>

<main class="main">

    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail'); ?>
        <div class="site-breadcrumb" style="background: url(<?php echo $image[0]; ?>)">
            <div class="container">
                <h2 class="breadcrumb-title">My Profile</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Profile</li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

<!-- register area -->
<div class="login-area py-120">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <img src="assets/img/logo/logo-dark.png" alt="">
                    <p>Create your clasad account</p>
                </div>
                <form action="#">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Your Name">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Your Email">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Your Password">
                        <i class="far fa-lock"></i>
                    </div>
                    <div class="form-check form-group">
                        <input class="form-check-input" type="checkbox" value="" id="agree">
                        <label class="form-check-label" for="agree">
                           I agree with the <a href="<?php echo site_url(); ?>/terms-condition">Terms Of Service.</a>
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Sign Up</button>
                    </div>
                </form>
                <div class="login-footer">
                    <div class="login-divider"><span>Or</span></div>
                    <div class="social-login">
                        <a href="#" class="btn-fb"><i class="fab fa-facebook"></i> Login With Facebook</a>
                        <a href="#" class="btn-gl"><i class="fab fa-google"></i> Login With Google</a>
                    </div>
                    <p>Already have an account? <a href="<?php echo site_url(); ?>/login/">Sign In.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register area end -->

</main>


<?php get_footer(); ?>