<?php 
/**
 * Promo boxes for the front page
 * @package PostMagazine
*/

function postmagazine_promo_box1_image() {
    if ( get_theme_mod( 'postmagazine_promo_box1_image' ) > 0 ) {
        return wp_get_attachment_url( get_theme_mod( 'postmagazine_promo_box1_image' ) );
    } else {
        return get_template_directory_uri() . '/images/no-promo-image.png';
    }
}

function postmagazine_promo_box2_image() {
    if ( get_theme_mod( 'postmagazine_promo_box2_image' ) > 0 ) {
        return wp_get_attachment_url( get_theme_mod( 'postmagazine_promo_box2_image' ) );
    } else {
        return get_template_directory_uri() . '/images/no-promo-image.png';
    }
}

function postmagazine_promo_box3_image() {
    if ( get_theme_mod( 'postmagazine_promo_box3_image' ) > 0 ) {
        return wp_get_attachment_url( get_theme_mod( 'postmagazine_promo_box3_image' ) );
    } else {
        return get_template_directory_uri() . '/images/no-promo-image.png';
    }
} 

?>

 <div id="promobox-section" class="container">	 
	  <div class="row">
	  
		<!-- promo image box 1 -->		  
		<div class="promobox-wrapper col-md-4">	  
			<div class="promo-image-content">
				<a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box1_link' )); ?>" class="promo-image-link" rel="nofollow"><img src="<?php echo esc_url( postmagazine_promo_box1_image() ); ?>" alt="<?php echo esc_attr(get_theme_mod('postmagazine_promo_box1_title' )); ?>"></a>
					<div class="promo-image-caption-box">
						<p class="promo-image-caption"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box1_title' )); ?></p>
						<p class="promo-image-readmore"><a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box1_link' )); ?>"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box1_button_label' )); ?></a></p>
					</div>
			</div>	  
		</div>

		<!-- promo image box 2 -->	  
		<div class="promobox-wrapper col-md-4">	  
			<div class="promo-image-content">
				<a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box2_link' )); ?>" class="promo-image-link" rel="nofollow"><img src="<?php echo esc_url( postmagazine_promo_box2_image() ); ?>" alt="<?php echo esc_attr(get_theme_mod('postmagazine_promo_box2_title' )); ?>"></a>
					<div class="promo-image-caption-box">
						<p class="promo-image-caption"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box2_title' )); ?></p>
						<p class="promo-image-readmore"><a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box2_link' )); ?>"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box2_button_label' )); ?></a></p>
					</div>
			</div>	  
		</div>	  
			  
		<!-- promo image box 3 -->		  
		<div class="promobox-wrapper col-md-4">	  
			<div class="promo-image-content">
				<a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box3_link' )); ?>" class="promo-image-link" rel="nofollow"><img src="<?php echo esc_url( postmagazine_promo_box3_image() ); ?>" alt="<?php echo esc_attr(get_theme_mod('postmagazine_promo_box3_title' )); ?>"></a>
					<div class="promo-image-caption-box">
						<p class="promo-image-caption"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box3_title' )); ?></p>
						<p class="promo-image-readmore"><a href="<?php echo esc_url(get_theme_mod('postmagazine_promo_box3_link' )); ?>"><?php echo esc_attr(get_theme_mod('postmagazine_promo_box3_button_label' )); ?></a></p>
					</div>
			</div>	  
		</div>	  
	  
	 </div>
 </div>
