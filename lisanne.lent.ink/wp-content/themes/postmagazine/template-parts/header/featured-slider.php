<?php
/**
 * Setup the output for the Slick Slider
 * @package PostMagazine
 */

$slider_navigation 	= get_theme_mod( 'featured_slider_navigation', true );
$slider_pagination 	= get_theme_mod( 'featured_slider_pagination', true );
$slider_autoplay 	= get_theme_mod( 'featured_slider_autoplay', true );
$slider_autoplay_speed 	= get_theme_mod( 'postmagazine_autoplay_speed', '3000' );

$slider_data = '{';
	$slider_data .= '"slidesToShow":1, "fade":true';

	if ( !$slider_navigation ) {
		$slider_data .= ', "arrows":false';
	} 

	if ( $slider_pagination ) {
		$slider_data .= ', "dots":true';
	}

	if ( $slider_autoplay ) {
		$slider_data .= ', "autoplay":true';
	}
	
	if ( $slider_autoplay_speed && $slider_autoplay ) {
		$slider_data .= ', "autoplaySpeed":' . $slider_autoplay_speed .'';
	}	
	
$slider_data .= '}';
?>

<!-- Wrap Slider Area -->
<div class="featured-slider-area">
	<!-- Featured Slider -->
	<div id="featured-slider" data-slick="<?php echo esc_attr( $slider_data ); ?>">
		
		<?php	$post_types = array( 'post', 'page' );

		// Query Args
		$slidecat = esc_attr(get_theme_mod( 'postmagazine_featured_cat' ));

		$args = array(
			'cat'							=> $slidecat,
			'post_type'		      		=> $post_types,
			'orderby'		      		=> 'date',
			'order'			      		=> 'DESC',
			'posts_per_page'      	=> esc_attr(get_theme_mod( 'postmagazine_featured_limit' ) ),
			'ignore_sticky_posts'	=> 1,
			'meta_query' 				=> array( 
				array(
					'key' 					=> '_thumbnail_id',
					'compare' 			=> 'EXISTS'
				)
			),	
		);

		if ( get_theme_mod( 'postmagazine_featured_cat' ) === 'category' ) {
			$args['cat'] = get_theme_mod( 'postmagazine_featured_cat' );
		}

		$sliderQuery = new WP_Query();
		$sliderQuery->query( $args );

		// Loop Start
		if ( $sliderQuery->have_posts() ) :
		while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();		
			
		?>

		<div class="slider-item">
			<div class="slider-item-bg" style="background-image:url(<?php  the_post_thumbnail_url('postmagazine-slide'); ?>);"></div>

			<div class="valign-container image-overlay">
				<div class="valign-outer">
					<div class="valign-inner">
						<div class="slider-info">

							<?php $category_list = get_the_category_list( ', ' ); ?>		

							<?php if ( $category_list ) : ?>
							<div class="slide-category">
								<?php echo wp_kses_post($category_list); ?>
							</div> 
							<?php endif; ?>
							
							<h2 class="slider-title"> 
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>	
							</h2>
							
							<div class="slider-content"><?php postmagazine_excerpt( 20 ); ?></div>
							
							<div class="slider-readmore">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','postmagazine' ); ?></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php
		endwhile; // Loop end
		endif;
		?>

	</div><!-- #featured-slider -->

</div><!-- .featured-slider-area -->