<?php 
/**
 * Theme Index File. Post Page.
 * @author Realtyna Inc.
 */
get_header();
global  $sesame_options;
?>

    <?php if($sesame_options['page_title_type'] == "2") get_template_part('partials/title', '1'); ?>
    <?php do_action('sesame_breadcrumbs'); ?>
    <?php if ( is_active_sidebar( 'search-widget-area' ) ) : ?>
        <div id="re-search-sidebar" class="re-search-sidebar" role="searchbox">
            <div class="re-container">
                <?php dynamic_sidebar( 'search-widget-area' ); ?>
            </div>
        </div>
    <?php endif; ?>

    <section id="content" role="main" class="re-container re-single-page re-main-section">
        <?php if($sesame_options['page_title_type'] == "1") get_template_part('partials/title', '1'); ?>
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

        <?php if (have_posts()) :  ?>
            <div class="re-row re-equal-height">
            <?php while (have_posts()) : the_post(); ?>
            <div class="re-post re-col-md-<?php echo esc_attr($sesame_options['posts_column_number']) ?>">
                <?php get_template_part('entry'); ?>
            </div>
        <?php endwhile; ?>
            </div>
        <?php  endif; ?>
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
<?php get_footer(); ?>