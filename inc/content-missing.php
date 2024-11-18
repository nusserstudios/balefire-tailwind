<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>
<div class="post-not-found">	
	<?php if ( is_search() ) : ?>
		<h1><?php _e( 'Sorry, No Results.', 'balefire' );?></h1>
		<section class="entry-content">
			<p><?php _e( 'Try your search again.', 'balefire' );?></p>
		</section>
		<section class="search">
		    <?php //get_search_form(); ?>
		    <?php //get_template_part( 'inc/search', 'form' ); ?>
		</section>
	<?php else: ?>
		<h1><?php _e( 'Oops, Post Not Found!', 'balefire' ); ?></h1>
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'balefire' ); ?></p>
		</section>
		<section class="search">
		    <?php //get_search_form(); ?>
		    <?php //get_template_part( 'inc/search', 'form' ); ?>
		</section>
	<?php endif; ?>
</div>