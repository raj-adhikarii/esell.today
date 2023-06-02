<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package esell
 */

get_header();
?>

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

	<div class="container my-5">
		<?php if ( have_posts() ) : ?>

			<header class="page-header mb-30">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'esell' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</div>

	</main><!-- #main -->

<?php
get_footer();
