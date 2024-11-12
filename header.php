<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta charset="utf-8">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<link rel="dns-prefetch" href="//apis.google.com">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Balefire Marketing + Advertising">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/src/img/favicon.png">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/src/img/apple-icon-touch.png" rel="apple-touch-icon" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-neutral-950 antialiased dark:bg-neutral-950 dark:text-neutral-200' ); ?>>

<?php do_action( 'balefire_site_before' ); ?>

<div id="page" class="flex flex-col min-h-screen">

	<?php do_action( 'balefire_header' ); ?>

	<?php get_template_part( 'inc/header', 'nav' ); ?>

	<div id="content" class="flex-grow site-content">

		<main>