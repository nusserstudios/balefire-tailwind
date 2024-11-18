</main>

<?php do_action('balefire_content_end'); ?>

</div>

<?php do_action('balefire_content_after'); ?>

<footer id="colophon" class="py-12 site-footer bg-neutral-50 dark:bg-black/90" role="contentinfo">
	<?php do_action('balefire_footer'); ?>

	<div class="container mx-auto text-center text-neutral-500 dark:text-neutral-50">
		&copy; <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?>
	</div>
</footer>

</div>

<?php wp_footer(); ?>
<?php if (is_user_logged_in() && current_user_can('administrator')) : ?>
    <div class="w-full bg-white border-y border-neutral-200">
        <div class="container px-4 mx-auto text-center py-9">
            <?php edit_post_link('Edit Post', '', '', null, 'edit-post-link'); ?>
        </div>
    </div>
<?php endif; ?>
</body>

</html>