<?php
/**
 * Template part for displaying page content in page.php
 */
?>
<main id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
	   <?php the_content(); ?>
	<?php wp_link_pages(); ?>				    
	<?php comments_template(); ?>		
</main>