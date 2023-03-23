<?php
/*!
 * Defining Theme Options
 * Author Realtyna Inc.
 * Copyright 2019 Realtyna Inc. | realtyna.com
 */
if(!defined('ABSPATH')) exit;

global $sesame_fields;
$sesame_fields = new stdClass();

function sesame_get_registered_sidebars()
{
    global $wp_registered_sidebars;
    static $choices = array();
    
    foreach($wp_registered_sidebars as $sidebar)
    {
        $choices[$sidebar['id']] = $sidebar['name'];
    }

    return apply_filters('init', $choices);
}

// General Options
$sesame_fields->section_general_options = array(
    'title'      => __('General', 'sesame'),
    'id'         => 'section_general_options',
    'fields'     => array(
        array(
            'id'       => 'container_width',
            'type'     => 'text',
            'title'    => __('Container Width', 'sesame'),
            'subtitle' => __('The layout container width', 'sesame'),
            'desc'     => __('px' , 'sesame'),
            'default'  => '1170',
        ),
        array(
            'id'       => 'search_on_properties',
            'type'     => 'switch',
            'title'    => __('Property Search', 'sesame'),
            'subtitle' => __('If you turn it on, then default WordPress search widget, searches on properties instead of WP pages/posts', 'sesame'),
            'default'  => false,
        ),
        array(
            'id'       => 'breadcrumb',
            'type'     => 'switch',
            'title'    => __('Show Breadcrumb', 'sesame'),
            'subtitle' => __('Show or Hide Breadcrumb', 'sesame'),
            'default'  => false
        )
    )
);

// Color Options
$sesame_fields->section_colors_options = array(
    'title'      => __('Colors', 'sesame'),
    'id'         => 'section_colors_options',
    'icon'       => 'el el-brush',
    'fields'     => array(
        array(
            'id'       => 'main_color',
            'type'     => 'color',
            'title'    => __('Main Color', 'sesame'),
            'subtitle' => __('The main color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#004274',
        ),
        array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'title'    => __('Secondary Color', 'sesame'),
            'subtitle' => __('The Secondary color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#ec1c2a',
        ),
        array(
            'id'       => 'link_color',
            'type'     => 'color',
            'title'    => __('Link Color', 'sesame'),
            'subtitle' => __('The link color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#00aeef',
        ),
        array(
            'id'       => 'link_hover_color',
            'type'     => 'color',
            'title'    => __('Link Hover Color', 'sesame'),
            'subtitle' => __('The link Mouseover color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#0bacdd',
        ),
        array(
            'id'       => 'text_color',
            'type'     => 'color',
            'title'    => __('Text Color', 'sesame'),
            'subtitle' => __('The text color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#888888',
        )
    )
);

// Font Options
$sesame_fields->section_fonts_options = array(
    'title'      => __('Fonts', 'sesame'),
    'id'         => 'section_fonts_options',
    'icon'       => 'el el-text-width',
    'fields'     => array(
        array(
            'id'       => 'h1_font_size',
            'type'     => 'text',
            'title'    => __('H1 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '30',
        ),
        array(
            'id'       => 'h2_font_size',
            'type'     => 'text',
            'title'    => __('H2 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '28',
        ),
        array(
            'id'       => 'h3_font_size',
            'type'     => 'text',
            'title'    => __('H3 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '24',
        ),
        array(
            'id'       => 'h4_font_size',
            'type'     => 'text',
            'title'    => __('H4 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '20',
        ),
        array(
            'id'       => 'h5_font_size',
            'type'     => 'text',
            'title'    => __('H5 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '16',
        ),
        array(
            'id'       => 'h6_font_size',
            'type'     => 'text',
            'title'    => __('H6 font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '14',
        ),
        array(
             'id'       => 'text_font_size',
             'type'     => 'text',
             'title'    => __('Text font size', 'sesame'),
             'desc'     => __('px', 'sesame'),
             'default'  => '13',
        ),
        array(
            'id'       => 'title_font_family',
            'type'     => 'select',
            'title'    => __('Title font family', 'sesame'),
            'options'  => array(
                'Karla' => 'Karla',
                'Montserrat' => 'Montserrat',
                'Open Sans' => 'Open Sans',
                'Lato' => 'Lato'
            ),
            'default'  => 'Montserrat',
        ),
         array(
             'id'       => 'content_font_family',
             'type'     => 'select',
             'title'    => __('Content font family', 'sesame'),
             'options'  => array(
                'Karla' => 'Karla',
                'Montserrat' => 'Montserrat',
                'Open Sans' => 'Open Sans',
                'Lato' => 'Lato'
             ),
             'default'  => 'Karla',
         ),
          array(
             'id'       => 'button_font_family',
             'type'     => 'select',
             'title'    => __('Button font family', 'sesame'),
             'options'  => array(
                'Karla' => 'Karla',
                'Montserrat' => 'Montserrat',
                'Open Sans' => 'Open Sans',
                'Lato' => 'Lato'
             ),
             'default'  => 'Montserrat',
         )
    )
);

// Header Options
$sesame_fields->section_header_options = array(
    'title'      => __('Header', 'sesame'),
    'icon'   => 'el el-arrow-up',
    'id'         => 'section_header_options',
    'fields'     => array(
        array(
            'id'       => 'tel_visibility',
            'type'     => 'switch',
            'title'    => __('Show Tel', 'sesame'),
            'subtitle' => __('If checked the Tel will be shown.', 'sesame'),
            'default'  => '0'
        ),
        array(
            'id'       => 'tel',
            'type'     => 'text',
            'title'    => __('Tel', 'sesame'),
            'subtitle' => __('Your telephone number', 'sesame'),
            'default'  => '',
            'required' => array('tel_visibility', '=', 1) // Dependency
        ),
        array(
            'id'       => 'email_visibility',
            'type'     => 'switch',
            'title'    => __('Show Email', 'sesame'),
            'subtitle' => __('If checked the Email will be shown.', 'sesame'),
            'default'  => '0'
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => __('Email', 'sesame'),
            'subtitle' => __('Your email number.', 'sesame'),
            'default'  => '',
            'required' => array('email_visibility', '=', 1) // Dependency
        ),
        array(
            'id'       => 'user_links_visibility',
            'type'     => 'switch',
            'title'    => __('User Links', 'sesame'),
            'subtitle' => __('If checked the Login, Register and other user links will be shown.', 'sesame'),
            'default'  => '0'
        ),
        array(
            'id'       => 'search_visibility',
            'type'     => 'switch',
            'title'    => __('Search ', 'sesame'),
            'subtitle' => __('Show search on header', 'sesame'),
            'default'  => '1'
        ),
        array(
            'id'       => 'social_media_visibility',
            'type'     => 'switch',
            'title'    => __('Social Media ', 'sesame'),
            'subtitle' => __('Show social media on header', 'sesame'),
            'default'  => '0'
        ),
        array(
            'id'       => 'sticky_header',
            'type'     => 'switch',
            'title'    => __('Sticky Header', 'sesame'),
            'subtitle' => __('The header will move by the page scroll', 'sesame'),
            'default'  => '1'
        ),
        array(
            'id'       => 'sticky_header_mobile',
            'type'     => 'switch',
            'title'    => __('Sticky Header on mobile', 'sesame'),
            'subtitle' => __('The header will move by the page scroll', 'sesame'),
            'default'  => '1'
        ),
        array(
            'id'       => 'header_type',
            'type'     => 'select',
            'title'    => __('Header Type', 'sesame'),
            'subtitle' => __('Select the header layout you prefer', 'sesame'),
            'options'  => array(
                '1' => __('Type 1', 'sesame'),
                '2' => __('Type 2', 'sesame'),
                '3' => __('Type 3', 'sesame')
            ),
            'default'  => '1',
        ),
        array(
            'id'       => 'header_transparency',
            'type'     => 'text',
            'title'    => __('Header Transparency', 'sesame'),
            'subtitle' => __('It should be between 0 till 1', 'sesame'),
            'default'  => '0',
            'required' => array('header_type', '=', 3) // Dependency
        ),
        array(
            'id'       => 'logo_type',
            'type'     => 'select',
            'title'    => __('Logo Type', 'sesame'),
            'options'  => array(
                '1' => 'Image',
                '2' => 'Title / Subtitle',
            ),
            'subtitle'     => __('If you choose Title / Subtitle you should change it in Customizer -> Site Identity' , 'sesame'),
            'default'  => '2',
        ),
    )
);

// Footer Options
$sesame_fields->section_footer_options = array(
    'title'      => __('Footer', 'sesame'),
    'id'         => 'section_footer_options',
    'icon'     => 'el el-arrow-down',
    'fields'     => array(
        array(
            'id'       => 'footer_background_color',
            'type'     => 'color',
            'title'    => __('Footer Background Color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#1c2029',
        ),
        array(
            'id'       => 'footer_background_visibility',
            'type'     => 'switch',
            'title'    => __('Show Background Image', 'sesame'),
            'subtitle' => __('Show a background image for footer.', 'sesame'),
            'default'  => '0'
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Background Image', 'sesame'),
            'subtitle' => __('Upload your Background image', 'sesame'),
            'default'  => array(
                'url'=> get_template_directory_uri().'/assets/img/footer-background2.jpg'
            ),
            'required' => array('footer_background_visibility', '=' ,1) // Dependency
        ),
        array(
            'id'       => 'footer_background_overlay',
            'type'     => 'text',
            'title'    => __('Footer Background Overlay', 'sesame'),
            'subtitle' => __('It should be between 0 and 1', 'sesame'),
            'default'  => '0.5',
            'required' => array('footer_background_visibility', '=', 1) // Dependency
        ),
        array(
            'id'       => 'footer_column_count',
            'type'     => 'select',
            'title'    => __('Number of columns', 'sesame'),
            'options'  => array(
                'one' => '1',
                'two' => '2',
                'three' => '3',
                'four' => '4'
            ),
            'default'  => 'four',
        ),
        array(
            'id'       => 'copyright',
            'type'     => 'text',
            'title'    => __('Copyright', 'sesame'),
            'subtitle' => __('Enter Your website Copyright text', 'sesame'),
            'default'  => __('Copyright © All rights reserved.', 'sesame')
        ),
        array(
            'id'       => 'developed_by_realtyna',
            'type'     => 'switch',
            'title'    => __('Developed By Realtyna', 'sesame'),
            'subtitle' => __('If you disable this You can not use affiliate program.', 'sesame'),
            'default'  => false
        )
    )
);

// Page Title Options
$sesame_fields->section_page_title_options = array(
    'title'      => __('Page Title', 'sesame'),
    'id'         => 'section_page_title_options',
    'icon'   => 'el el-minus',
    'fields'     => array(
        array(
            'id'       => 'page_title_visibility',
            'type'     => 'switch',
            'title'    => __('Show Title', 'sesame'),
            'subtitle' => __('If checked the page title will be shown.', 'sesame'),
            'default'  => '1'
        ),
        array(
            'id'       => 'page_title_type',
            'type'     => 'select',
            'title'    => __('Title Type', 'sesame'),
            'subtitle' => __('Select the type of the page title.', 'sesame'),
            'options'  => array(
                '1' => __('Simple', 'sesame'),
                '2' => __('Background', 'sesame')
            ),
            'default'  => '1',
        ),
        array(
            'id'       => 'page_title_background',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Background', 'sesame'),
            'subtitle' => __('Upload your Background image', 'sesame'),
            'default'  => array(
                'url'=> get_template_directory_uri().'/assets/img/page-title-background.png'
            ),
            'required' => array('page_title_type', '=', 2) // Dependency
        ),
        array(
            'id'       => 'page_title_text_align',
            'type'     => 'select',
            'title'    => __('Title Text Align', 'sesame'),
            'subtitle' => __('Select the text align of the page title.', 'sesame'),
            'options'  => array(
                'left' => __('Left', 'sesame'),
                'center' => __('Center', 'sesame')
            ),
            'default'  => 'left',
        ),
        array(
            'id'       => 'page_title_separator',
            'type'     => 'switch',
            'title'    => __('Show Separator', 'sesame'),
            'subtitle' => __('If checked the page title will be shown.', 'sesame'),
            'default'  => '1',
            'required' => array('page_title_type', '=', 1) // Dependency
        ),
        array(
            'id'       => 'page_title_h_tag',
            'type'     => 'select',
            'title'    => __('Title H Tag', 'sesame'),
            'options'  => array(
                '1' => 'h1',
                '2' => 'h2',
                '3' => 'h3',
                '4' => 'h4',
                '5' => 'h5',
                '6' => 'h6',

            ),
            'default'  => '1',
        ),
    )
);

// Sidebar Options
$sesame_fields->section_sidebar_options = array(
    'title'      => __('Sidebar', 'sesame'),
    'id'         => 'section_sidebar_options',
    'icon'       => 'el el-blogger',
    'fields'     => array(
        array(
            'id'       => 'sidebar_visibility',
            'type'     => 'switch',
            'title'    => __('Show Sidebar ', 'sesame'),
            'subtitle' => __('Show sidebar for all pages', 'sesame'),
            'default'  => '0'
        ),
        //TODO: The sidebar options should be developed to show all sidebars in order to be chosen by the user as the sidebar of the page or post
        array(
            'id'       => 'default_sidebar',
            'type'     => 'select',
            'title'    => __('Default Sidebar', 'sesame'),
            'data' =>  'sidebar',
            'default'  => 'primary-widget-area',
        ),
        array(
            'id'       => 'sidebar_position',
            'type'     => 'select',
            'title'    => __('Sidebar Position', 'sesame'),
            'options' =>  array(
                'left' => 'left',
                'right' => 'right',
            ),
            'default'  => 'right',
        )
    )
);

// Blog Options
$sesame_fields->section_blog_options = array(
    'title'      => __('Blog', 'sesame'),
    'id'         => 'section_blog_options',
    'icon'       => 'el el-blogger',
    'fields'     => array(
        array(
            'id'       => 'excerpt-chars-number',
            'type'     => 'text',
            'title'    => __('Excerpt Number of Chars', 'sesame'),
            'subtitle' => __('How many Characters should be shown for the blog posts in the blog page', 'sesame'),
            'default'  => '50'
        ),
        array(
            'id'       => 'excerpt-more-text',
            'type'     => 'text',
            'title'    => __('More link text', 'sesame'),
            'subtitle' => __('The more link text of a blog post', 'sesame'),
            'default'  => __('Read More...', 'sesame')
        ),
        array(
            'id'       => 'posts_column_number',
            'type'     => 'select',
            'title'    => __('Number of posts Columns', 'sesame'),
            'options' =>  array(
                '12' => '1',
                '6' => '2',
                '4' => '3',
                '3' => '4',
                '2' => '6',
            ),
            'default'  => '4',
        ),
        array(
            'id'       => 'post_title_color',
            'type'     => 'color',
            'title'    => __('Post Title Color', 'sesame'),
            'transparent' => 'false',
            'default'  => '#1e73be',
        ),
        array(
            'id'       => 'post_title_font_size',
            'type'     => 'text',
            'title'    => __('Post title font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '20',
        ),
        array(
            'id'       => 'single_post_title_font_size',
            'type'     => 'text',
            'title'    => __('Single Post title font size', 'sesame'),
            'desc'     => __('px', 'sesame'),
            'default'  => '28',
        ),
    )
);

// Social Options
$sesame_fields->section_social_options = array(
    'title'      => __('Social', 'sesame'),
    'id'         => 'section_social_options',
    'icon'       => 'el el-facebook',
    'fields'     => array(
        array(
            'id'       => 'facebook_link',
            'type'     => 'text',
            'title'    => __('Facebook Page Link', 'sesame'),
            'subtitle' => __('Your facebook page link', 'sesame'),
        ),
        array(
            'id'       => 'linkedin_link',
            'type'     => 'text',
            'title'    => __('Linked in link', 'sesame'),
            'subtitle' => __('Your linked In page link', 'sesame'),
        ),
        array(
            'id'       => 'twitter_link',
            'type'     => 'text',
            'title'    => __('Twitter Page Link', 'sesame'),
            'subtitle' => __('Your Twitter page link', 'sesame'),
        ),
        array(
            'id'       => 'instagram_link',
            'type'     => 'text',
            'title'    => __('Instagram Page Link', 'sesame'),
            'subtitle' => __('Your Instagram page link', 'sesame'),
        )
    )
);

function sesame_get_fields()
{
    global $sesame_fields;
    return $sesame_fields;
}