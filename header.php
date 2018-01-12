<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package aldehyde
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php  esc_html_e( 'Skip to content', 'aldehyde' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

	<div class="mega-container" >

		<div id="content" class="site-content container">