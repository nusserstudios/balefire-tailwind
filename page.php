<?php get_header(); ?>

<div class="container mx-auto my-8">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part('inc/content-page', get_post_format()); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>