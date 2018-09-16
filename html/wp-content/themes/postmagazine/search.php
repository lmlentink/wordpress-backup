<?php
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package PostMagazine
 */

get_header(); ?>

	<div id="content" class="site-content container">
		<div class="row">
			<div id="primary" class="content-area col-lg-12">
				<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for %s', 'postmagazine' ), '<span>' . get_search_query() . '</span>' );
							?></h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', 'search' );
						endwhile;
							the_posts_navigation();
						else :
							get_template_part( 'template-parts/post/content', 'none' );
						endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
