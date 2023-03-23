<?php 
/**
 * Single Attachment Page
 * @author Realtyna Inc.
 */
get_header();
global $post; 
global $sesame_options;
?>
<?php do_action('sesame_breadcrumbs'); ?>
    <section id="content" role="main" class="re-container re-attachment re-main-section">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="header re-page-title">
                <h1 class="entry-title"><?php echo esc_html(get_the_title()); ?></h1>
                <span class="re-title-separator"></span>

            </header>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                    <nav id="nav-above" class="re-navigation clearfix" role="navigation">
                        <div class="re-nav-previous">
                            <?php previous_image_link(false, __('Previous','sesame')); ?>
                        </div>
                        <div class="re-nav-next">
                            <?php next_image_link(false, __('Next','sesame')); ?>
                        </div>
                    </nav>
                </header>
                <section class="re-entry-content">
                    <div class="re-entry-attachment">
                        <?php if (wp_attachment_is_image($post->ID)) : $sesame_att_image = wp_get_attachment_image_src($post->ID, "large"); ?>
                            <p class="attachment">
                                <a href="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
                                    <img src="<?php echo esc_attr($sesame_att_image[0]); ?>" width="<?php echo esc_attr($sesame_att_image[1]); ?>" height="<?php echo esc_attr($sesame_att_image[2]); ?>" 
                                        class="attachment-medium"
                                        alt="<?php $post->post_excerpt; ?>"/>
                                    </a>
                                </p>
                        <?php else : ?>
                            <a href="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>"
                               title="<?php echo esc_attr(get_the_title($post->ID), 1); ?>"
                               rel="attachment">
                               <?php echo esc_html(basename($post->guid)); ?>    
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($post->post_excerpt)): ?>
                        <div class="re-entry-caption"><?php  the_excerpt(); ?></div>
                    <?php endif; ?>
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                </section>
            </article>
            <?php
                $sesame_post_author = get_the_author();
                $sesame_post_author_link = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ));
                $sesame_post_date = get_the_date();
            ?>
            <div class="re-author clearfix">
                <div class="avatar">
                    <?php echo get_avatar( get_the_author_meta( 'email' ), '50' ); ?>

                </div>
                <div class="description">
                    <div class="author-name">
                        <span class=""><?php esc_html_e('By','sesame'); ?></span>
                        <a href="<?php echo esc_attr($sesame_post_author_link); ?>"><?php echo esc_html($sesame_post_author); ?></a>
                    </div>
                    <div><?php echo esc_html($sesame_post_date); ?></div>
                </div>
            </div>

            <?php comments_template(); ?>
        <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>