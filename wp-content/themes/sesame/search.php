<?php 
/**
 * The Search Result Page.
 * @author Realtyna Inc.
 */
get_header();
global  $sesame_options;
?>

<?php do_action('sesame_breadcrumbs'); ?>
<?php if(is_active_sidebar('search-widget-area')): ?>
    <div id="re-search-sidebar" class="re-search-sidebar" role="searchbox">
        <div class="re-container">
            <?php dynamic_sidebar('search-widget-area'); ?>
        </div>
    </div>
<?php endif; ?>

    <section id="content" role="main" class="re-container re-single-page re-main-section">
        <?php if($sesame_options['sidebar_visibility']): ?>
        <div class="re-row">
            <?php endif; ?>
            <?php if($sesame_options['sidebar_visibility'] and $sesame_options['sidebar_position'] == "left"): ?>
                <div class="re-col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
            <?php if($sesame_options['sidebar_visibility']): ?>
            <div class="re-col-md-9">
                <?php endif; ?>

                <?php if (have_posts()) : ?>
                <header class="re-page-title">
                    <h1 class="re-entry-title">
                        <?php
                            /* translators: %s is the searched term */
                            printf(esc_html__('Search Results for: %s', 'sesame'), get_search_query());
                        ?>
                    </h1>
                </header>
                <?php if (have_posts()) :  ?>
                    <div class="re-row re-equal-height">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="re-post re-col-md-4">
                                <?php get_template_part('entry'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php  endif; ?>
                <?php get_template_part('nav', 'below'); ?>
            <?php else : ?>
            <article id="post-0" class="post no-results not-found">
                <header class="header">
                    <h2 class="entry-title"><?php esc_html_e('Nothing Found', 'sesame'); ?></h2>
                </header>
                <section class="entry-content">
                    <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'sesame'); ?></p>
                    <?php get_search_form(); ?>
                </section>
            </article>
        <?php endif; ?>

                <?php if($sesame_options['sidebar_visibility']): ?>
            </div>
        <?php endif; ?>
            <?php if($sesame_options['sidebar_visibility'] and $sesame_options['sidebar_position'] == "right"): ?>
                <div class="re-col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>

            <?php if($sesame_options['sidebar_visibility']): ?>
        </div>
    <?php endif; ?>
    </section>
<?php get_footer(); ?>