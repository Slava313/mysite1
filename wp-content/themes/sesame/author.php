<?php
/**
 * Single Author Page
 * @author Realtyna Inc.
 */
 get_header(); 
?>
<?php do_action('sesame_breadcrumbs'); ?>
    <section id="content" role="main" class="re-container re-main-section re-author-page">
        <header class="header">
            <?php the_post(); ?>
            <?php
            $sesame_post_author = get_the_author();
            $sesame_post_author_link = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ));
            ?>
            <div class="re-author re-author-single clearfix">
                <div class="avatar">
                    <?php echo get_avatar( get_the_author_meta( 'email' ), '120' ); ?>
                </div>
                <div class="description">
                    <div class="author-details">
                        <div class="author-name">
                            <span class=""><?php esc_html_e('By','sesame'); ?></span>
                            <a href="<?php echo esc_attr($sesame_post_author_link); ?>"><?php echo esc_html($sesame_post_author); ?></a>
                        </div>
                        <div class="author-detail">
                            <?php
                            echo esc_html(get_the_author_meta('user_email'));
                            echo " | ";
                            echo esc_html(count_user_posts(get_the_author_meta('ID')));
                            echo " ";
                            echo esc_html__('Blog(s)','sesame');
                            ?>
                        </div>
                    </div>

                    <?php 
                        if ('' != get_the_author_meta('user_description')) 
                        {
                            echo '<div class="archive-meta">';
                            echo esc_html(get_the_author_meta('user_description'));
                            echo '</div>'; 
                        }        
                    ?>
                </div>

            </div>

            <?php rewind_posts(); ?>
        </header>
        <div class="re-row re-equal-height">
            <?php while (have_posts()) :  ?>
                <div class="re-post re-col-md-4">                    
                    <?php the_post(); get_template_part('entry'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php get_template_part('nav', 'below'); ?>
    </section>
<?php get_footer(); ?>