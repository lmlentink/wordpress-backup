<?php
/**
 * Featured Bottom sidebar
 * @package PostMagazine
*/

if (   ! is_active_sidebar( 'featuredbottom'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
   
<aside id="featured-bottom-sidebar" class="widget-area">		     
	<?php dynamic_sidebar( 'featuredbottom' ); ?> 					
</aside> 