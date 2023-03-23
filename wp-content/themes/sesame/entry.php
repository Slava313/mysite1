<?php
/**
 * A single post to be used in any post list loop.
 * @author Realtyna Inc.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php if (is_singular()) {
            echo '<h1 class="entry-title">';
        } else {
            echo '<h2 class="entry-title">';
        } ?><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php esc_attr(the_title_attribute()); ?>"
               rel="bookmark"><?php echo esc_html(get_the_title()); ?></a><?php if (is_singular()) {
            echo '</h1>';
        } else {
            echo '</h2>';
        } ?>
    </header>
    <?php echo wp_kses(get_the_post_thumbnail(), 'post'); ?>
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
                <a href="<?php echo esc_attr($sesame_post_author_link); ?>" >
                    <?php echo esc_html($sesame_post_author); ?>
                </a>
            </div>
            <div><?php echo esc_html($sesame_post_date); ?></div>
        </div>
    </div>
    <?php the_excerpt();  ?>
    <?php if (!is_search()) get_template_part('entry-footer'); ?>
</article>

