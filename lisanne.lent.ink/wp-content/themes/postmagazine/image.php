<?php
/**
 * The template for displaying image attachments
 * @package PostMagazine
 */

get_header(); ?>

<div id="content" class="site-content container">
	<div class="row">
		<div id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main">

				<?php	while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<header class="post-header">
							<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
						</header>
						
						<div class="attachment-content">
						
							<div id="attachment-wrapper">
								<?php
									$image_size = apply_filters( 'postmagazine_attachment_size', 'large' );
									echo wp_get_attachment_image( get_the_ID(), $image_size );
								?>
							</div>
							
								<?php if ( has_excerpt() ) : ?>
									<div class="gallery-post-caption">
										<?php the_excerpt(); ?>
									</div>
								<?php endif; ?>

							<div id="attachment-description"><?php the_content(); ?></div>
							
						</div>

						<footer class="post-footer">
							<nav id="image-navigation" class="image-navigation">
								<div class="nav-links">
									<div class="prev-image"><?php previous_image_link( false, esc_html__( 'Previous Image', 'postmagazine' ) ); ?></div>
									<div class="next-image"><?php next_image_link( false, esc_html__( 'Next Image', 'postmagazine' ) ); ?></div>
								</div>
							</nav>
						</footer>

					</article>
				
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if (esc_attr(get_theme_mod( 'postmagazine_show_attachment_comments', false ) ) &&  comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					// End the loop.
					endwhile;
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>