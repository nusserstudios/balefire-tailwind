<?php
/**
 * Template part for displaying a single post
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
	<?php //get_template_part( 'inc/content', 'byline' ); ?>	
    <div class="entry-content" itemprop="text">
		<?php the_post_thumbnail('large'); ?>
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'balefirewp' ), 'after'  => '</div>' ) ); ?>
	<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'balefirewp' ) . '</span> ', ', ', ''); ?></p>
	<?php //comments_template(); ?>												
</article>