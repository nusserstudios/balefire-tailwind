<?php get_header(); ?>

<div class="container mx-auto my-8">

	<div class="mx-auto max-w-7xl">

		<h1 class="text-6xl font-bold text-neutral-900 dark:text-neutral-200">
			<?php printf( __( 'Search Results for: %s', 'balefire' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('inc/content', get_post_format()); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<p class="text-neutral-800 dark:text-neutral-200 py-9">
				<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'balefire' ); ?>
			</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div>
	
</div>

<?php get_footer(); ?>
