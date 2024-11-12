<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'your-text-domain' ); ?></span>
        <input type="search" class="w-full px-4 py-2 border rounded search-field" placeholder="<?php _e( 'Search …', 'your-text-domain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php _e( 'Search for:', 'your-text-domain' ); ?>" />
    </label>
    <input type="submit" class="px-4 py-2 mt-2 font-bold text-white rounded bg-primary search-submit hover:bg-primary-700" value="<?php _e( 'Search', 'your-text-domain' ); ?>" />
</form>
