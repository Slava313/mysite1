<?php
// Exit if accessed directly.
if(!defined('ABSPATH')) exit;

return '/*!
 * Dynamic Styles
 * Author UI Department of Realtyna Inc.
 */

body{
    color: (text_color);
    font-family: (content_font_family), sans-serif;
}

/*Font*/

h1,h2,h3,h4,h5,h6,
.re-page-title,
.re-title-default,
.widget-title
{
  font-family: (title_font_family), sans-serif;
}

#header
{
  font-family: (title_font_family), sans-serif;
}

.wpl_search_from_box .wpl_search_from_box_top label,.wpl-gen-form-label,
.wpl_prp_listing_location
{
   font-family: (content_font_family), sans-serif;
}

.wpl_search_from_box .wpl_search_from_box_top .wpl_search_reset,
.re-recent-post-content .read-more,
.re-contact-form-style1 .wpcf7-submit
{
    font-family: (button_font_family), sans-serif;
}

/*Color*/

.widget-title,
.re-site-title a,
.re-site-description
{
    color: (main_color);
}
.re-nav
{
    background-color: (main_color);
}
.re-header-contact-info-text>a
{
    color: (main_color);
}
.re-header-contact-info>[class*="re-icon-"]
{
    color: (secondary_color);
}
.re-btn-default
{
    font-family: (button_font_family), sans-serif;
    background-color: (main_color);
    border-color: (main_color);
}
.re-btn-default:hover
{
    color: (main_color);
}
.re-page-title,.re-title-default,
.re-header-search .re-icon-search,.re-header-type-3 .re-user-links a
{
    color: (main_color);
}
.wpl_search_from_box.advanced .wpl_search_from_box_top .search_submit_box{
    color: (main_color);
}
.wpl_search_from_box.advanced .wpl_search_from_box_top .wpl_search_field_container.wpl_search_field_listings.radios_type input:checked + label,
.wpl_search_from_box.advanced .wpl_search_from_box_top .wpl_search_field_container.wpl_search_field_listings.radios_any_type input:checked + label,
.wpl_search_from_box.advanced .wpl_search_from_box_top .wpl_search_field_container.wpl_search_field_listings.radios_type label:hover,
.wpl_search_from_box.advanced .wpl_search_from_box_top .wpl_search_field_container.wpl_search_field_listings.radios_any_type label:hover{
    color: (main_color);
}

.btn.btn-primary,
.wpl_addon_membership_container button,
.wpl_addon_membership_container .btn-primary,
#wpl_membership_register_button,
.wpl_property_manager .wpl-wp .wpl-button.button-1,
.wpl_addon_membership_container .wpl-button.button-1,
.wpl_addon_membership_container #wpl_change_password_submit,
.wpl_user_contact_container .form-field input[type="submit"]{
    background: (main_color);
}
.btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary.focus, .btn.btn-primary:active, .btn.btn-primary.active,
.wpl_addon_membership_container button:hover, .wpl_addon_membership_container button:focus, .wpl_addon_membership_container button.focus,
.wpl_addon_membership_container button:active, .wpl_addon_membership_container button.active,
.wpl_addon_membership_container .btn-primary:hover, .wpl_addon_membership_container .btn-primary:focus, .wpl_addon_membership_container .btn-primary.focus,
.wpl_addon_membership_container .btn-primary:active, .wpl_addon_membership_container .btn-primary.active,
#wpl_membership_register_button:hover, #wpl_membership_register_button:focus, #wpl_membership_register_button.focus,
#wpl_membership_register_button:active, #wpl_membership_register_button.active,
.wpl_property_manager .wpl-wp .wpl-button.button-1:hover, .wpl_property_manager .wpl-wp .wpl-button.button-1:focus, .wpl_property_manager .wpl-wp .wpl-button.button-1.focus,
.wpl_property_manager .wpl-wp .wpl-button.button-1:active, .wpl_property_manager .wpl-wp .wpl-button.button-1.active,
.wpl_addon_membership_container .wpl-button.button-1:hover, .wpl_addon_membership_container .wpl-button.button-1:focus,
.wpl_addon_membership_container .wpl-button.button-1.focus, .wpl_addon_membership_container .wpl-button.button-1:active, .wpl_addon_membership_container .wpl-button.button-1.active,
.wpl_addon_membership_container #wpl_change_password_submit:hover, .wpl_addon_membership_container #wpl_change_password_submit:focus, .wpl_addon_membership_container #wpl_change_password_submit.focus,
.wpl_addon_membership_container #wpl_change_password_submit:active, .wpl_addon_membership_container #wpl_change_password_submit.active,
.wpl_prp_show_container .listing_contact input[type="button"]:hover, .wpl_prp_show_container .listing_contact input.btn.btn-primary[type="submit"]:hover,
.wpl_user_contact_container .form-field input[type="submit"]:hover{
    color: (main_color);
    border-color: (main_color);
}

.wpl_prp_position3_boxes_title,
.wpl_prp_position_contact_title,
.wpl_prp_show_detail_boxes_title,
.wpl_prp_right_boxes_title,
.wpl_prp_right_boxes_title span,
.pwizard-wp header h2, .pmanager-wp header h2,
.pmanager-wp .properties-wp .propery-wp .info-action-wp .plist_price,
.wpl_addon_membership_container .wpl_dashboard_header,
.wpl_addon_membership_container .wpl_memberships_label,
.wpl_addon_membership_container .wpl_membership_addon_label,
.wpl-membership-wpluser-head .wpl_activity_title,
#wpl_dashboard_bottom_container .wpl_activity_title,
.wpl-ewallet-balance{
    color: (main_color) !important;
}

.wpl_prp_show_container .wpl_agent_info .company_details .company_name,
.wpl_prp_show_container .wpl_agent_info .email:before {
     color: (main_color);
}
.wpl_prp_show_container .wpl-listing-results-links-cnt a{
     color: (main_color);
}
.wpl_prp_show_container .wpl_prp_show_detail_boxes .rows span{
     color: (main_color) !important;
}
.wpl_prp_show_container .wpl_prp_show_tabs-maps.wpl_prp_left_box .tabs{
     border-color: (main_color);
}
.wpl_prp_show_container .wpl_prp_show_tabs-maps.wpl_prp_left_box .tabs li.active a{
     background: (main_color);
}
.wpl_property_listing_container .wpl_prp_top .wpl_prp_top_boxes.back {
     background: (main_color);
}
#wpl_profile_listing_container .wpl_profile_container .wpl_profile_picture div.back{
    background: (main_color) !important;
}
.wpl_agent_info_c>ul li:before, ul.wpl_agent_info_r li:before{
    color: (main_color);
}
.wpl_agent_info .company, .wpl_agent_info .company_details{
    color: (main_color);
}
.wpl_mcalc_container .form-result .text-box {
    color: (secondary_color);
}
.wpl_mcalc_container .form-result .wpl-mortgage-symbol {
    color: (main_color);
}
.wpl-gen-tab-wp.wpl-complex-tabs-wp, .wpl-crm-form.wpl-crm-form-frontend .wpl-crm-grid-tab{
    border-bottom-color: (main_color);
}
.wpl-gen-tab-wp.wpl-complex-tabs-wp ul li.wpl-gen-tab-active-parent a.wpl-gen-tab-active,
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-grid-tab ul li.wpl-gen-tab-active-parent a.wpl-gen-tab-active {
    background: (main_color);
}
.wpl-gen-tab-wp.wpl-complex-tabs-wp ul li.wpl-gen-tab-active-parent a.wpl-gen-tab-active span,
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-grid-tab ul li.wpl-gen-tab-active-parent a.wpl-gen-tab-active span{
    background: (secondary_color);
}
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-form-next-btn,
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-form-submit-btn{
    background: (main_color);
}
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-form-next-btn:hover,
.wpl-crm-form.wpl-crm-form-frontend .wpl-crm-form-submit-btn:hover{
    color: (main_color);
    border-color: (main_color);
}
.wpl_addon_membership_container .wpl_dashboard_side2 .wpl_dashboard_links li:not(.properties_link):hover{
    background: (main_color);
}

.wpl_search_widget_links .wpl-save-search-wp a:after ,
.wpl_search_widget_links .wpl-rss-wp a:after {
    color: (main_color);
}
.wpl_search_widget_links .wpl-save-search-wp a:hover:after,
.wpl_search_widget_links .wpl-rss-wp a:hover:after{
    color: (secondary_color);
}
.re-search .search_submit_box
{
    background: (main_color);
}
#wpl_login_form button[type="submit"]:hover{
    border-color: (main_color);
    background: (main_color);
}
.wpl_subscription_form_account_info_container legend{
    color: (main_color);
}
.wpl_addon_membership_container .wpl_dashboard_header:before,
.wpl_addon_membership_container .wpl_memberships_label:before,
.wpl_addon_membership_container .wpl_membership_addon_label:before {
     background: (secondary_color);
}
.wpl-membership-wpluser-head .wpl_activity_title:after,
#wpl_dashboard_bottom_container .wpl_activity_title:after{
     background: (secondary_color);
}
.re-title-separator,.widget-title:after
{
    background-color: (secondary_color);
}

.wpl_prp_show_container .wpl_prp_container_content_title .wpl_prp_top_box_details .price_box {
    background: (secondary_color);
}
.wpl_prp_show_container .location_build_up:before{
     color: (secondary_color);
}
.wpl_prp_show_container .wpl-gallery-pshow-wp .lSSlideOuter .lSGallery > li.active img{
     border-color: (secondary_color) !important;
}
.wpl-ewallet-balance span{
    color: (secondary_color);
}

#wpl_prp_show_container .wpl_prp_position3_boxes_title:after,
#wpl_prp_show_container .wpl_prp_position_contact_title:after,
#wpl_prp_show_container .wpl_prp_show_detail_boxes_title:after,
#wpl_prp_show_container .wpl_prp_right_boxes_title:after{
    background: (secondary_color) !important;
}

.wpl-booking-button-date>a{
    background: (secondary_color);
}
.wpl-booking-button-date>a:hover{
    color: (secondary_color);
    border-color: (secondary_color);
}
.wpl_pagination_container .pagination li.active a,
.wpl_property_listing_container.wpl-property-listing-mapview .wpl_pagination_container .pagination li.active a,
.pagination-wp .pagination li.active a,
.wpl-profile-listing-wp .wpl_pagination_container .pagination li.active a{
     color: (secondary_color) !important;
     border-color: (main_color) !important;
}
.pwizard-wp.wpl_view_container .side-content-wp input[type=\'checkbox\']:checked + label:before,
.wpl-subscription-form-container input[type=\'checkbox\']:checked + label:before,
.wpl-login-form-remember-wp input[type=\'checkbox\']:checked + label:before {
     background: (secondary_color);
}
.pmanager-wp #wpl_listings_top_tabs_container .wpl-tabs li.wpl-selected-tab a{
    color: (secondary_color);
}
#wpl_register_info strong:first-child:after{
    background: (secondary_color);
}

.re-section-call-us
{
    color: (main_color);
}
a{
    color: (link_color);
}
a:hover{
    color: (link_hover_color);
}
.re-header-type-2 .re-user-links a{
    border-color: (link_color);
}
.re-header-type-2 .re-user-links a:hover,
.re-header-type-2 .re-user-links a:focus{
    color: (link_hover_color);
    border-color: (link_hover_color);
}
.vc_separator.vc_sep_color_juicy_pink .vc_sep_line {
    color: (secondary_color);
}
.wpl_sort_options_container .wpl-sort-options-selectbox select,
.wpl_sort_options_container .wpl-sort-options-selectbox:after{
     color: (link_color);
}
.wpl_list_grid_switcher div.active:before,
.wpl_list_grid_switcher a.active:before,
.wpl_list_grid_switcher a.active,
.wpl_list_grid_switcher div.active,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text div.active:before,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text a.active:before,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text a.active,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text div.active
{
    color: (link_color) !important;
}
.wpl_list_grid_switcher .map_view:before,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text .map_view:before {
    color: (secondary_color) !important;
}
.wpl_list_grid_switcher .map_view,
.wpl_list_grid_switcher.wpl-list-grid-switcher-icon-text .map_view{
    color: (main_color);
}
.wpl_carousel_container .simple_list.wpl-plugin-owl .right_section .location:before,
.wpl_property_listing_container .view_detail .wpl_prp_title,
.wpl_agents_widget_container .wpl_profile_container .wpl_profile_container_title .title{
    color: (link_color);
}
.wpl_property_listing_container .view_detail .wpl_prp_title:hover,
.wpl_agents_widget_container .wpl_profile_container .wpl_profile_container_title .title:hover{
    color:(link_hover_color);
}
.wpl_carousel_container .simple_list.wpl-plugin-owl .right_section .more_info{
    background: (link_color);
}
.re-carousel .slick-dots li.slick-active button{
     background-color: (secondary_color);
}

#footer
{
    background-color: (footer_background_color);
}
.footer-overlay
{
    background-color: (footer_background_color);
    opacity: (footer_background_overlay);
}

.post .entry-title a
{
   color: (post_title_color);
   font-size: (post_title_font_size)px;
}
.single .post .entry-title a
{
   font-size: (single_post_title_font_size)px;
}

/*Container*/
.re-container
{
    max-width: (container_width)px;
}

/*Font-size*/
h1
{
    font-size: (h1_font_size)px;
}
h2
{
    font-size: (h2_font_size)px;
}
h3
{
    font-size: (h3_font_size)px;
}
h4
{
    font-size: (h4_font_size)px;
}
h5
{
    font-size: (h5_font_size)px;
}
h6
{
    font-size: (h6_font_size)px;
}

body
{
    font-size: (text_font_size)px;
}

.wpl_prp_show_container
{
    font-size: (text_font_size)px;
}';