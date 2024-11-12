<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */
get_header(); ?>	

<section>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container mx-auto my-8 entry-content">
			<div class="max-w-4xl px-6 mx-auto my-16 entry-content">
				<h1 class="text-6xl dark:text-neutral-950 dark:text-white">
					404
				</h1>
				<p class="mb-8 font-light text-normal text-neutral-800 dark:text-neutral-200">
					<?php _e( 'Sorry, the page you are looking for could not be found.', 'tailpress' ); ?>
				</p>
				<div class="my-8">
					<?php get_template_part( 'inc/search', 'form' ); ?>
				</div>
				<div class="w-full py-9">
					<a href="<?php echo get_bloginfo( 'url' ); ?>" class="px-4 py-2 text-white rounded bg-primary">
						<?php _e( 'Go Home', 'tailpress' ); ?>
					</a>
				</div>
			</div>
		</div>
	</article>
</section>

<?php get_footer(); ?>