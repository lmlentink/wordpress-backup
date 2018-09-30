<?php
/**
 * Displays the content top sidebar group
 * @package PostMagazine
*/

if (   ! is_active_sidebar( 'contenttop1'  )
	&& ! is_active_sidebar( 'contenttop2' )
	&& ! is_active_sidebar( 'contenttop3'  )		
	&& ! is_active_sidebar( 'contenttop4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
   
<div id="content-top-sidebar">   
<aside class="widget-area container">

		<div class="row">		   
			<?php if ( is_active_sidebar( 'contenttop1' ) ) : ?>
				<div id="content-top1" <?php postmagazine_content_top(); ?>>
					<?php dynamic_sidebar( 'contenttop1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contenttop2' ) ) : ?>      
				<div id="content-top2" <?php postmagazine_content_top(); ?>>
					<?php dynamic_sidebar( 'contenttop2' ); ?>
				</div>         
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contenttop3' ) ) : ?>        
				<div id="content-top3" <?php postmagazine_content_top(); ?>>
					<?php dynamic_sidebar( 'contenttop3' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'contenttop4' ) ) : ?>        
				<div id="content-top4" <?php postmagazine_content_top(); ?>>
					<?php dynamic_sidebar( 'contenttop4' ); ?>
				</div>
			<?php endif; ?>		
		</div>

</aside>         
</div>