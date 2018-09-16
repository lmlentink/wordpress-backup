<?php
/**
 * For the CTA Sidebar
 * @package PostMagazine
*/

if (   ! is_active_sidebar( 'cta'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>


<aside id="cta-sidebar" class="widget-area">		     
	<div class="container">
		<div class="row">
			<div class="col-lg-12">        
				<?php dynamic_sidebar( 'cta' ); ?> 					
			</div>
		</div>
	</div>
</aside> 
