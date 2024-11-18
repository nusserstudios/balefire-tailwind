<?php
function balefire_page_navi() {
    global $wp_query;
    
    // Don't print empty markup if there's only one page
    if ($wp_query->max_num_pages <= 1) return;
    
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);
    
    echo '<ul class="flex justify-center h-10 mx-auto -space-x-px text-base align-center">';
    
    // Previous arrow - always shown
    $prev_link = $paged > 1 ? esc_url(get_pagenum_link($paged - 1)) : '#';
    $prev_disabled = $paged == 1 ? 'pointer-events-none opacity-50' : '';
    printf(
        '<li><a href="%s" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-neutral-400 dark:text-neutral-100 ring-1 ring-inset ring-neutral-300 hover:bg-default focus:z-20 focus:outline-offset-0 dark:hover:text-white %s">
            <span class="sr-only">Previous</span>
            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
            </svg>
        </a></li>',
        $prev_link,
        $prev_disabled
    );
    
    // Add page numbers
    for ($i = 1; $i <= $max; $i++) {
        $is_current = $paged === $i;
        $link_class = $is_current 
            ? 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-default focus:z-20'
            : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-neutral-900 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-50 focus:z-20 dark:text-neutral-100 dark:hover:text-neutral-900';
            
        printf(
            '<li><a href="%s" class="%s">%s</a></li>',
            esc_url(get_pagenum_link($i)),
            $link_class,
            $i
        );
    }
    
    // Next arrow - always shown
    $next_link = $paged < $max ? esc_url(get_pagenum_link($paged + 1)) : '#';
    $next_disabled = $paged == $max ? 'pointer-events-none opacity-50' : '';
    printf(
        '<li><a href="%s" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-neutral-400 dark:text-neutral-100 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-500 hover:text-neutral-50 focus:z-20 focus:outline-offset-0 dark:hover:text-white %s">
            <span class="sr-only">Next</span>
            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
            </svg>
        </a></li>',
        $next_link,
        $next_disabled
    );
    
    echo '</ul>';
}