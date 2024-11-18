<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12' ); ?>>

	<header class="mb-4 entry-header">
		<?php
			the_title( sprintf( '<h2 class="mb-1 text-2xl font-extrabold leading-tight entry-title md:text-3xl"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-lg text-neutral-900 dark:text-neutral-200">
			<?php echo get_the_date(); ?>
		</time>
	</header>

	<?php if ( is_search() || is_archive() ) : ?>

		<div class="prose entry-summary dark:prose-invert max-w-none">
			<?php
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="block mb-4">
					<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto' ) ); ?>
				</a>
			<?php endif; ?>
			
			<?php the_excerpt(); ?>
		</div>

	<?php else : ?>

		<div class="prose entry-content dark:prose-invert max-w-none">
			<?php
			/* translators: %s: Name of current post */
			the_excerpt(
				sprintf(
					__( 'Continue reading %s', 'balefire' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'balefire' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'balefire' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
		</div>

	<?php endif; ?>

</article>