<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>
<div class="post-not-found">	
	<?php if ( is_search() ) : ?>
		<h1><?php _e( 'Sorry, No Results.', 'balefirewp' );?></h1>
		<section class="entry-content">
			<p><?php _e( 'Try your search again.', 'balefirewp' );?></p>
		</section>
		<section class="search">
		    <?php //get_search_form(); ?>
		    <?php //get_template_part( 'inc/search', 'form' ); ?>
		</section>
	<?php else: ?>
		<h1><?php _e( 'Oops, Post Not Found!', 'balefirewp' ); ?></h1>
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'balefirewp' ); ?></p>
		</section>
		<section class="search">
		    <?php //get_search_form(); ?>
		    <?php //get_template_part( 'inc/search', 'form' ); ?>
		</section>
	<?php endif; ?>
</div>