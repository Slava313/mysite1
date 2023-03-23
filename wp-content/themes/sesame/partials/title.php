<?php
/**
 * Page Title HTML
 * @author Realtyna Inc.
 */
global $sesame_options;
?>
<?php if($sesame_options['page_title_visibility']): ?>
    <?php if($sesame_options['page_title_type'] == "1"): ?>
        <header class="re-page-title <?php echo "re-page-title-align-".esc_attr($sesame_options["page_title_text_align"]); ?>">
            <h<?php echo esc_attr($sesame_options['page_title_h_tag']); ?> class="re-entry-title">
                <?php if ( is_home() ) {
                    echo esc_html(single_post_title());
                } else if (is_single()) {
                    echo esc_html(get_the_title());
                } else if (is_page()) {
                    echo esc_html(get_the_title());
                } else if(is_category()) {
                  echo esc_html(single_cat_title());
                }else if(is_tag()){
                   echo esc_html(single_tag_title());
                }  else if(is_archive()) {
                    echo esc_html(get_the_archive_title());
                } ?>

            </h<?php echo esc_attr($sesame_options['page_title_h_tag']); ?>>
            <?php if($sesame_options['page_title_separator'] == "1"): ?>
                <span class="re-title-separator"></span>
            <?php endif; ?>
        </header>
    <?php endif; ?>
    <?php if($sesame_options['page_title_type'] == "2"): ?>
        <header class="re-page-title re-page-title-with-bg <?php echo "re-page-title-align-".esc_attr($sesame_options["page_title_text_align"]); ?>" style="background-image: url('<?php echo esc_url($sesame_options['page_title_background']['url']); ?>');">
            <div class="re-container">
                <h<?php echo esc_attr($sesame_options['page_title_h_tag']); ?> class="re-entry-title">
                    <?php if ( is_home() ) {
                        echo esc_html(single_post_title());
                    } else if (is_single()) {
                        echo esc_html(get_the_title());
                    } else if (is_page()) {
                        echo esc_html(get_the_title());
                    } else if(is_category()) {
                        echo esc_html(single_cat_title());
                    }else if(is_tag()){
                        echo esc_html(single_tag_title());
                    }  else if(is_archive()) {
                        echo esc_html(get_the_archive_title());
                    } ?>
                </h<?php echo esc_attr($sesame_options['page_title_h_tag']); ?>>
            </div>
        </header>
    <?php endif; ?>
<?php endif; ?>