<?php 
/**
 * 404 Page 
 * @author Realtyna Inc.
 */
get_header(); 
?>

<?php do_action('sesame_breadcrumbs'); ?>
<section id="content" role="main" class="re-container re-main-section re-page-not-found">
    <article id="post-0" class="post not-found">
        <header class="re-title-default">
            <h1 class="re-entry-title">
                <span class="large-font-size"><?php esc_html_e('Oops!', 'sesame'); ?></span>
                <span class="small-font-size"><?php esc_html_e('This page could not be found!', 'sesame'); ?></span>
            </h1>
            <p class="re-entry-subtitle"><?php esc_html_e('Try a search instead?', 'sesame'); ?></p>
        </header>
        <section class="re-entry-content">
            <?php get_search_form(); ?>
        </section>
        <div class="re-not-found-bg"></div>
    </article>
</section>
<?php get_footer(); ?>