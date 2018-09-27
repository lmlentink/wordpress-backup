<?php
/**
 * Template file for the list blog content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PostMagazine
 */
?>
	<?php if (is_archive() ) : ?>
			<header id="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="description lead">', '</div>' );
			?>
		</header>	
	<?php endif; ?>

<?php if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>
			
	<div class="row align-items-center list-wrapper">	
		<div class="col-lg-5">	
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php esc_url(the_permalink()); ?>">			
								<?php 
								if ( esc_attr(get_theme_mod( 'postmagazine_list_thumbnails', false )) ) :
									the_post_thumbnail( 'postmagazine-list' );  
								else :
									the_post_thumbnail( 'post-thumbnails' ); 
								endif;				
								?>
							</a>				
								
							<?php if( esc_attr(get_theme_mod( 'postmagazine_show_featured_captions', true ) ) ) {			
							$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
							  if(!empty($get_description) ) {
								  //If description is not empty show the div
							  echo '<div class="post-caption-container"><p class="post-caption">' . esc_html($get_description) . '</p></div>';
							  }
							  }
							?>	
							
						</div>
					<?php endif; ?>
		</div>

		<div class="col-lg-7">
			<div class="list-content">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">	
						<?php	
						if ( is_front_page() && is_home() ) {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						} else {
							the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						}		
					 ?>		
					 <?php			
						if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php postmagazine_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>	
					</header>				
					<div class="entry-content">
						<?php	the_excerpt(); 
							wp_link_pages( array(
								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'postmagazine' ),
								'after'       => '</div>',
								'link_before' => '<span class="page-number">',
								'link_after'  => '</span>',
							) );							
						?>
					</div>
				</article>
			</div>
		</div>	
	</div>	
				
	<?php
	endwhile;
		the_posts_navigation();
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>
