<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">					
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php get_template_part( 'parts/content', 'byline' ); ?>		
	<div class="entry-content" itemprop="text">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php the_content('<button class="tiny">' . __( 'Read more...', 'balefirewp' ) . '</button>'); ?>
	</div>		
    <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'balefirewp') . '</span> ', ', ', ''); ?></p>	
</article>