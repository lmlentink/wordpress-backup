<?php
/**
 * Displays the feature bottom sidebar group
 * @package PostMagazine
*/

if (   ! is_active_sidebar( 'contentbottom1'  )
	&& ! is_active_sidebar( 'contentbottom2' )
	&& ! is_active_sidebar( 'contentbottom3'  )		
	&& ! is_active_sidebar( 'contentbottom4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
 
<aside class="widget-area container">
		<div class="row">
		
			<?php if ( is_active_sidebar( 'contentbottom1' ) ) : ?>
				<div id="content-bottom1" <?php postmagazine_content_bottom(); ?>>
					<?php dynamic_sidebar( 'contentbottom1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contentbottom2' ) ) : ?>      
				<div id="content-bottom2" <?php postmagazine_content_bottom(); ?>>
					<?php dynamic_sidebar( 'contentbottom2' ); ?>
				</div>         
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contentbottom3' ) ) : ?>        
				<div id="content-bottom3" <?php postmagazine_content_bottom(); ?>>
					<?php dynamic_sidebar( 'contentbottom3' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contentbottom4' ) ) : ?>        
				<div id="content-bottom4" <?php postmagazine_content_bottom(); ?>>
					<?php dynamic_sidebar( 'contentbottom4' ); ?>
				</div>
			<?php endif; ?>		
		</div>

</aside>         
