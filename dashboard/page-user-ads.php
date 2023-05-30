<?php 
// Template Name: User Ads Template
get_header(); ?>


<main class="main">

    <!-- breadcrumb -->
    <?php if(has_post_thumbnail($post ->ID)):
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'single-post-thumbnail');
        ?>
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



<!-- user-profile -->
<div class="user-profile py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="user-profile-sidebar">
                    <div class="user-profile-sidebar-top">
                        <div class="user-profile-img">
                            <?php if ( is_user_logged_in() ) : ?>
                                <?php
                                    $current_user = wp_get_current_user();
                                    $user_profile_link = get_author_posts_url( $current_user->ID );
                                    $user_profile_image = get_avatar( $current_user->ID, 32 );
                                ?>

                                <?php echo $user_profile_image; ?>
                            <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                            <input type="file" class="profile-img-file">
                            <?php endif; ?>
                        </div>
                        <h5>Antoni Jonson</h5>
                        <p>antoni@example.com</p>
                    </div>
                    <ul class="user-profile-sidebar-list">
                        <li><a href="<?php echo site_url(); ?>/dashboard/"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                        <li><a class="active" href="<?php echo site_url(); ?>/profile/"><i class="far fa-user"></i> My Profile</a></li>
                        <li><a href="<?php echo site_url(); ?>/my-ads/"><i class="far fa-layer-group"></i> My Ads</a></li>
                        <li><a href="<?php echo site_url(); ?>/post-ad/"><i class="far fa-plus-circle"></i> Post Ads</a></li>
                        <li><a href="<?php echo site_url(); ?>/profile-setting/"><i class="far fa-gear"></i> Settings</a></li>
                        <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="far fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="user-profile-wrapper">
                    <div class="user-profile-card profile-ad">
                        <div class="user-profile-card-header">
                            <h4 class="user-profile-card-title">My Ads</h4>
                            <div class="user-profile-card-header-right">
                                <div class="user-profile-search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="far fa-search"></i>
                                    </div>
                                </div>
                                <a href="#" class="theme-btn"><span class="far fa-plus-circle"></span>Post Ads</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Ads Info</th>
                                            <th>Category</th>
                                            <th>Publish</th>
                                            <th>Price</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                        <div class="table-ad-content">
                                                            <h6>Men's Golden Watch</h6>
                                                            <span>Ad ID: #123456</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Fashion</td>
                                            <td>5 days ago</td>
                                            <td>$150</td>
                                            <td>350k+</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                <a href="<?php echo site_url(); ?>/post-ad/" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                        <div class="table-ad-content">
                                                            <h6>Men's Golden Watch</h6>
                                                            <span>Ad ID: #123456</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Fashion</td>
                                            <td>5 days ago</td>
                                            <td>$150</td>
                                            <td>0</td>
                                            <td><span class="badge badge-info">Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                <a href="<?php echo site_url(); ?>/post-ad/" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                        <div class="table-ad-content">
                                                            <h6>Men's Golden Watch</h6>
                                                            <span>Ad ID: #123456</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Fashion</td>
                                            <td>5 days ago</td>
                                            <td>$150</td>
                                            <td>350k+</td>
                                            <td><span class="badge badge-primary">Sold</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                <a href="<?php echo site_url(); ?>/post-ad/" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                        <div class="table-ad-content">
                                                            <h6>Men's Golden Watch</h6>
                                                            <span>Ad ID: #123456</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Fashion</td>
                                            <td>5 days ago</td>
                                            <td>$150</td>
                                            <td>0</td>
                                            <td><span class="badge badge-danger">Expired</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                <a href="<?php echo site_url(); ?>/post-ad/" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/product/01.jpg')); ?>" alt="<?php _e( 'Asset description' ) ?>">
                                                        <div class="table-ad-content">
                                                            <h6>Men's Golden Watch</h6>
                                                            <span>Ad ID: #123456</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>Fashion</td>
                                            <td>5 days ago</td>
                                            <td>$150</td>
                                            <td>350k+</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                <a href="<?php echo site_url(); ?>/post-ad/" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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