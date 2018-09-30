<?php
/**
 * Template part for displaying a featured post
 * @package PostMagazine
 */

?>


	<div class="row">
		<div class="col-lg-12">

		<?php
		$stickycat = get_theme_mod( 'postmagazine_stickycat_cat' );
		$args = array(
			'cat' 		=> $stickycat,
			'posts_per_page' => 1,
			'post__in'       => get_option( 'sticky_posts' ),
		);
		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		while ( $the_query->have_posts() ) {
			$the_query->the_post();		
			?>

		<div class="sticky-wrapper">	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="row align-items-center no-gutters">
					<div class="col-lg-7">
						<div class="sticky-content">
							<header class="entry-header">						
								<?php	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
									<div class="entry-meta"></div><!-- .entry-meta -->						
							</header><!-- .entry-header -->

							<div class="entry-content featured">
								<?php postmagazine_excerpt( 30 ); 
								
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'postmagazine' ),
									'after'  => '</div>',
								) );
																
								?>
								<a class="readmore" href="<?php the_permalink(); ?>">Read More</a>
							</div><!-- .entry-content -->
						</div>
					</div>
					<div class="col-lg-5">
						<?php if ( '' !== get_the_post_thumbnail() ) : ?>
							<a href="<?php esc_url(the_permalink()); ?>">			
								<?php the_post_thumbnail( 'postmagazine-featured-sticky' ); ?>
							</a>			
						<?php	endif; ?>

					</div>
				</div>
				
			</article><!-- #post -->
		</div>	

		<?php } ?>

		</div>	
	</div>
