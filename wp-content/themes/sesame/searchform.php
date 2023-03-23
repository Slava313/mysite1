<?php
/**
 * The Search Form.
 * @author Realtyna Inc.
 */
global $sesame_options;

// WP search widget is set to search on listings
if(isset($sesame_options['search_on_properties']) and $sesame_options['search_on_properties'] == 1 and function_exists('_wpl_import'))
{
    $sesame_action_name = wpl_property::get_property_listing_link();
    $sesame_search_name = 'sf_textsearch_textsearch';
    $sesame_search_value = (isset($_GET['sf_textsearch_textsearch']) ? sanitize_text_field(wp_unslash($_GET['sf_textsearch_textsearch'])) : '');
}
// It's set to search on WordPress posts/pages
else
{
    $sesame_action_name = esc_url(home_url('/'));
    $sesame_search_name = 's';
    $sesame_search_value = get_search_query();
}
?>
<div class="re-search clearfix">
    <form role="search" method="get" class="search-form" action="<?php echo esc_attr($sesame_action_name); ?>">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr__('Enter your search term', 'sesame'); ?>" value="<?php echo esc_attr($sesame_search_value); ?>" name="<?php echo esc_attr($sesame_search_name); ?>" />
        <div class="search_submit_box">
            <button type="submit" class="search-submit"><?php echo esc_html__('Search', 'sesame');?></button>
        </div>
    </form>
    <button class="re-search-toggle"><span class="screen-reader-text"><?php echo esc_html__('Close Search', 'sesame');?></span></button>
</div>