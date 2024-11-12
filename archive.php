<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/

 ------------------------------------------------------------------------------

 * Rendering category archive index pages uses the following path in WordPress:

 * category-{slug}.php – If the category’s slug is news, WordPress will look for category-news.php.
 * category-{id}.php – If the category’s ID is 6, WordPress will look for category-6.php.
 * category.php
 * archive.php
 * index.php

------------------------------------------------------------------------------

 * To display a tag archive index page, WordPress uses the following path:

 * tag-{slug}.php – If the tag’s slug is sometag, WordPress will look for tag-sometag.php.
 * tag-{id}.php – If the tag’s ID is 6, WordPress will look for tag-6.php.
 * tag.php
 * archive.php
 * index.php

------------------------------------------------------------------------------

 * Custom taxonomies use a slightly different template file path:

 * taxonomy-{taxonomy}-{term}.php – If the taxonomy is sometax, and taxonomy’s term is someterm, 
 	WordPress will look for taxonomy-sometax-someterm.php. In the case of post formats, the taxonomy is ‘post_format’ and the terms are ‘post-format-{format}. i.e. taxonomy-post_format-post-format-link.php for the link post format.
 * taxonomy-{taxonomy}.php – If the taxonomy were sometax, WordPress would look for taxonomy-sometax.php.
 * taxonomy.php
 * archive.php
 * index.php

------------------------------------------------------------------------------

 * Custom Post Types use the following path to render the appropriate archive index page.

 * archive-{post_type}.php – If the post type is product, WordPress will look for archive-product.php.
 * archive.php
 * index.php

------------------------------------------------------------------------------

 * Based on the above examples, rendering author archive index pages is fairly explanatory:
 
 * author-{nicename}.php – If the author’s nice name is matt, WordPress will look for author-matt.php.
 * author-{id}.php – If the author’s ID were 6, WordPress will look for author-6.php.
 * author.php
 * archive.php
 * index.php

------------------------------------------------------------------------------

 * Date-based archive index pages are rendered as you would expect:
 
 * date.php
 * archive.php
 * index.php
*/
get_header(); ?>
<section class="container">
	<div class="mx-auto max-w-7xl">
		<h1 class="page-title"><?php the_archive_title();?></h1>
		<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'inc/loop', 'archive' ); ?>
		<?php endwhile; ?>	
		<?php else : ?>
			<?php get_template_part( 'inc/content', 'missing' ); ?>
		<?php endif; ?>
	</div>
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>