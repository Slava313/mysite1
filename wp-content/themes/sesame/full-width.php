<?php
/*
Template Name: FullWidth Page
*/
get_header();
?>
    <section id="content" role="main" class="re-container-full-width">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php   get_template_part('partials/title', '1'); ?>
                <section class="re-entry-content">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                    <?php the_content(); ?>
                    <div class="re-entry-links clearfix"><?php wp_link_pages(); ?></div>
                </section>
            </article>
            <?php if (!post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>