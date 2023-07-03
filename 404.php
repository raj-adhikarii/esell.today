<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package esell
 */

get_header();
?>

	<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(https://images.unsplash.com/photo-1584824486509-112e4181ff6b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)">
            <div class="container">
                <h2 class="breadcrumb-title">404 Error</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">404 Error</li>
                </ul>
            </div>
        </div>



        <!-- error area -->
        <div class="error-area py-120">
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="error-wrapper">
                        <h1>4<span>0</span>4</h1>
                        <h2>Opos... Page Not Found!</h2>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'esell' ); ?></p>
                        <a href="<?php echo site_url(); ?>" class="theme-btn">Go Back Home <i class="far fa-home"></i></a>
                    </div>

					<!-- <?php
					get_search_form();
					?> -->

				<div class="user-profile-search mt-40">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                            <i class="far fa-search"></i>
                    </div>
                </div>
					
                </div>
            </div>
        </div>
        <!-- error area end -->
        

    </main>
<!-- mysql pw " Prolific@123#!" -->
<!-- datapase: wordpress
user: wp_user
pass: Pro.... -->
<!-- https://i12bretro.github.io/tutorials/0770.html -->
<?php
get_footer();
