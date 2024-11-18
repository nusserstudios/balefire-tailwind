<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12' ); ?> role="article">					
	<header class="mb-4 entry-header">
		<?php
			the_title(
				sprintf(
					'<h2 class="mb-1 text-2xl font-extrabold leading-tight entry-title md:text-3xl"><a href="%s" rel="bookmark" title="%s">',
					esc_url( get_permalink() ),
					the_title_attribute( array( 'echo' => false ) )
				),
				'</a></h2>'
			);
			?>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header>

	<div class="prose entry-content dark:prose-invert max-w-none" itemprop="text">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" class="block mb-4">
				<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto' ) ); ?>
			</a>
		<?php endif; ?>
		
		<?php
		the_content(
			sprintf(
				'<button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-md bg-primary-600 hover:bg-primary-700">%s</button>',
				__( 'Read more...', 'balefire' )
			)
		);
		?>
	</div>		
	
	<?php if ( has_tags() ) : ?>
		<div class="mt-4">
			<?php
			the_tags(
				'<span class="font-medium">' . __( 'Tags:', 'balefire' ) . '</span> ',
				', ',
				''
			);
			?>
		</div>
	<?php endif; ?>
</article>