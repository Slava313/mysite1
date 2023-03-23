<?php
/**
 * The Single Post page
 * @author Realtyna Inc.
 */
global $sesame_options;
get_header();
?>
    <?php do_action('sesame_breadcrumbs'); ?>
    <section id="content" class="re-container re-single-page re-main-section" role="main">
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
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry-content'); ?>
                    <?php if (!post_password_required()) comments_template('', true); ?>
                <?php endwhile; endif; ?>
                <?php get_template_part('nav-below-single'); ?>
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