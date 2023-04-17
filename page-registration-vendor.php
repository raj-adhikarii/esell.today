<?php get_header(); 
// Template Name: Vendor Registration
?>

<main class="main">

<!-- breadcrumb -->
<div class="site-breadcrumb" style="background: url(https://tinysol.com.au/esell/wp-content/uploads/2023/04/abt.jpeg)">
    <div class="container">
        <h2 class="breadcrumb-title">Sign Up</h2>
        <ul class="breadcrumb-menu">
            <li><a href="index.html">Home</a></li>
            <li class="active">Sign Up</li>
        </ul>
    </div>
</div>



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
                           I agree with the <a href="#">Terms Of Service.</a>
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
                    <p>Already have an account? <a href="login.html">Sign In.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register area end -->

</main>


<?php get_footer(); ?>