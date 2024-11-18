<?php get_header(); ?>



<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="relative pt-0 overflow-hidden isolate">
    <?php 
    if (has_post_thumbnail()) :
        $featured_image_url = get_the_post_thumbnail_url(null, 'full');
    else :
        // Local fallback image path
        $featured_image_url = get_template_directory_uri() . '/src/img/balefire-bg.webp';
    endif;
    ?>
        <img 
            src="<?php echo esc_url($featured_image_url); ?>" 
            alt="<?php echo esc_attr(get_the_title()); ?>" 
            class="absolute inset-0 object-cover w-full h-full mt-0 -z-10"
            style="filter: brightness(0.4) saturate(1) contrast(1.6);"
        >
        <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#fcb989] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="max-w-2xl px-6 py-32 mx-auto sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="pb-6 text-4xl font-bold tracking-tight text-white text-balance sm:text-6xl">
                    <?php the_title(); ?>
                </h1>
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div class="relative px-4 py-1.5 text-sm leading-6 rounded-full text-neutral-300 ring-1 ring-white/10 hover:ring-white/20">
                        Get version 1.0 on GitHub <a href="https://github.com/balefireict/balefire-tailwind" class="font-semibold text-white"><span class="absolute inset-0 ml-3" aria-hidden="true"></span>See More <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <p class="max-w-2xl mx-auto mt-6 text-lg leading-8 text-neutral-300">
                    This is an opinionated starter fork of TailPress, with pagination, styled archives, blog, pages, nav dropdowns, and more.
                </p>
                <div class="flex items-center justify-center mt-10 gap-x-6">
                    <a href="https://github.com/balefireict/balefire-tailwind" class="rounded-md bg-primary px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-400">View GitHub Repo</a>
                    <a href="https://github.com/balefireict/balefire-tailwind" class="text-sm font-semibold leading-6 text-white">View Demo <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#b75813] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
    
    <div class="container mx-auto my-8">

    <?php do_action( 'balefire_content_start' ); ?>

    <?php get_template_part('inc/content', get_post_format()); ?>

    <?php endwhile; ?>

    <?php endif; ?>

</div>

<?php get_footer(); ?>