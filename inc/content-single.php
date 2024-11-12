<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="mb-4 entry-header">
		<h1 class="mb-1 text-2xl font-extrabold leading-tight entry-title lg:text-5xl">
			<?php the_title(); ?>
		</h1>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-lg text-neutral-900 dark:text-neutral-200"><?php echo get_the_date(); ?></time>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
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

</article>
