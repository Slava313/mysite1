<!DOCTYPE html>
<?php
/**
 * Theme Header
 * @author Realtyna Inc.
 */
?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
    if(function_exists('wp_body_open')) wp_body_open();
    else do_action('wp_body_open');
?>
<div id="wrapper" class="hfeed">
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Skip to content', 'sesame'); ?>
    </a>
    <?php
        /**
         * Load the header-1.php (or header.php if failed)
         * @todo Change the number to the selected header type by user
         */
        get_template_part('partials/header', '1');
    ?>
    <div id="container">