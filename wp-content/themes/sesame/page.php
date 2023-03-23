<?php 
/**
 * Posts Page.
 * @author Realtyna Inc.
 */
get_header();
global $sesame_options;
?>
    <?php if($sesame_options['page_title_type'] == "2") get_template_part('partials/title', '1'); ?>

    <?php do_action('sesame_breadcrumbs'); ?>

    <?php if(is_active_sidebar('search-widget-area')): ?>
        <div id="re-search-sidebar" class="re-search-sidebar" role="searchbox">
            <div class="re-container">
                <?php dynamic_sidebar('search-widget-area'); ?>
            </div>
        </div>
    <?php endif; ?>

    <section id="content" role="main" class="re-container re-main-section">
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

        <?php if(have_posts()) : while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if($sesame_options['page_title_type'] == "1") get_template_part('partials/title', '1'); ?>
                <section class="re-entry-content">
                    <?php if(has_post_thumbnail()) the_post_thumbnail(); ?>
                    <?php the_content(); ?>
                    <div class="re-entry-links clearfix"><?php wp_link_pages(); ?></div>
                </section>
            </article>
            <?php if(!post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>
        <?php the_posts_pagination(); ?> 
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

<?php get_footer();