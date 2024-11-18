<?php get_header(); ?>

<div class="bg-default">
	<div class="container py-12 mx-auto max-w-7xl">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</div>
</div>

<div class="container mx-auto my-8 max-w-7xl">
	<?php if ( have_posts() ) : ?>
		
		<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
		<div class="grid grid-cols-1 gap-16 md:grid-cols-3">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
		
			<div>
				<?php get_template_part( 'inc/content', get_post_format() ); ?>
			</div>
		
		<?php endwhile; ?>
		</div>
		<?php balefire_page_navi(); ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>