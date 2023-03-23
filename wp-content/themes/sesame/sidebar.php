<?php
/**
 * The Sidebar View.
 * @author Realtyna Inc.
 */
global $sesame_options;
$sesame_sidebar = $sesame_options['default_sidebar'];
?>

<aside id="sidebar" role="complementary">
    <?php if (is_active_sidebar($sesame_sidebar)) : ?>
        <div id="primary" class="re-widget-area">
             <?php dynamic_sidebar($sesame_sidebar); ?>
        </div>
    <?php endif; ?>
</aside>