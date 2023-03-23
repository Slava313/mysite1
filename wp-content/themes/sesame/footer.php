<?php
/**
 * Theme Footer
 * @author Realtyna Inc.
 */
global $sesame_options;

$copyright = (isset($sesame_options['copyright']) ? $sesame_options['copyright'] : '');
?>
        <div class="clear"></div>
    </div>
    <footer id="footer" class="re-footer" role="contentinfo" style="background-image:url('<?php echo esc_url($sesame_options['footer_background']['url']); ?>')">
        <div class="footer-overlay"></div>
            <div class="re-footer-top-area <?php echo (isset($sesame_options['footer_column_count']) ? esc_attr($sesame_options['footer_column_count'].'-columns') : 'four-columns'); ?>">
                <div class="re-container">
                    <div class="re-footer-column re-footer-column1">
                        <?php dynamic_sidebar('footer-widget-area-1'); ?>
                    </div>
                    <div class="re-footer-column re-footer-column2">
                        <?php dynamic_sidebar('footer-widget-area-2'); ?>
                    </div>
                    <div class="re-footer-column re-footer-column3">
                        <?php dynamic_sidebar('footer-widget-area-3'); ?>
                    </div>
                    <div class="re-footer-column re-footer-column4">
                        <?php dynamic_sidebar('footer-widget-area-4'); ?>
                    </div>
                </div>
            </div>

            <?php if(trim($copyright) or (isset($sesame_options['developed_by_realtyna']) and $sesame_options['developed_by_realtyna'])): ?>
            <div id="copyright" class="re-footer-bottom-area">
                <div class="re-container">
                    <?php echo esc_html($copyright); ?>
                    <?php
                        /* translators: %s is the theme author name */
                        echo ((isset($sesame_options['developed_by_realtyna']) and $sesame_options['developed_by_realtyna']) ? sprintf(esc_html__('Developed By %s', 'sesame'), '<a href="https://realtyna.com/?utm_source=theme&utm_medium=footer&utm_campaign=sesame" target="_blank">'.esc_html__('Realtyna', 'sesame').'</a>') : ''); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                </div> 
            </div>
            <?php endif; ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>