<?php
/**
 * For displaying breadcrumbs
 * @package PostMagazine
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}
?>

<div id="breadcrumbs-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<?php dynamic_sidebar( 'breadcrumbs' ); ?>
			</div>
		</div>
	</div>
</div>