<?php
/**
 * Theme Base Class. All the required functions for the theme are defined here.
 * @author Realtyna Inc.
 */
if(!defined('ABSPATH')) exit;

// Sesame Options
global $sesame_options;

// Sesame Base Class
class sesame_base
{
    /**
     * sesame_base constructor.
     */
    public function __construct()
    {
    }

    /**
     * Initialize the Sesame theme
     */
    public function setup()
    {
        add_action('after_setup_theme', array($this, 'load_languages'));
        add_action('after_setup_theme', array($this, 'load_theme_support'));
        add_action('after_setup_theme', array($this, 'set_content_width'));
        add_action('after_setup_theme', array($this, 'load_nav_menus'));
        
        // Load Sidebars
        add_action('widgets_init', array($this, 'load_sidebars'));
        
        // Include needed assets (CSS, JavaScript etc) in the website frontend
		add_action('wp_enqueue_scripts', array($this, 'load_frontend_assets'), 0); 

        // Include needed assets (CSS, JavaScript etc) in the website frontend
        add_action('wp_enqueue_scripts', array($this, 'load_frontend_assets'), 0);
        
        // Include needed assets (CSS, JavaScript etc) for WP comment form
        add_action('comment_form_before', array($this, 'load_comment_assets'));
        
        // Load Redux Framework
        $this->load_redux();
        
        // Load Dependencies Interface in the WordPress admin
        if(is_admin()) $this->load_dependencies();
        
        // Breadcrumb
        add_action('sesame_breadcrumbs', array($this, 'breadcrumbs'));

        // Excerpts
        add_filter('excerpt_length', array($this, 'set_excerpt_length'));
        add_filter('excerpt_more', array($this, 'set_excerpt_more'));
    }

    /**
     * Load Sesame Textdomain
     */
    public function load_languages()
    {
        load_theme_textdomain('sesame', get_template_directory().'/languages');
    }

    /**
     * Add Theme Supports
     */
    public function load_theme_support()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        
        add_theme_support('html5', array('comment-list', 'comment-form', 'gallery', 'search-form'));

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies metus nec congue sollicitudin. Phasellus lobortis lacus quis dolor vehicula mattis. Etiam mattis pretium fermentum. Integer tincidunt velit odio, nec malesuada mauris tempus vel. Proin dui dolor, imperdiet sed nibh vitae, ultrices elementum lectus. Quisque facilisis ligula a ligula commodo tincidunt. Praesent eget cursus ex. Vivamus tincidunt, odio eget rutrum auctor, elit odio imperdiet nisi, at placerat lorem augue nec lorem. Donec maximus est feugiat erat gravida venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
        Morbi vel nisl et sem ultrices ultrices. Curabitur tincidunt suscipit lectus et volutpat. Nunc fringilla at diam id tincidunt. Etiam ultricies porttitor augue, dictum consequat tortor consequat at. Sed vitae dui in massa molestie ultrices. Phasellus ac ante dignissim, elementum neque vel, finibus dui. Aliquam faucibus rutrum dolor, in varius leo efficitur sed. Ut condimentum porttitor vulputate. Sed mauris sapien, mattis eu odio eu, pretium facilisis quam. Vivamus ut maximus mi, quis pulvinar est. Vivamus ipsum libero, aliquet et semper vel, sagittis vitae mauris. Nulla ac sapien non nulla interdum accumsan. Sed porttitor, ipsum ut feugiat interdum, turpis ligula ultricies elit, ut sagittis arcu felis eu sapien.
        Integer non eros nisl. Integer pretium, dui quis hendrerit sodales, nulla purus accumsan nulla, non ultricies justo elit sit amet ligula. Mauris nec auctor ligula. Etiam convallis nisl ac blandit dapibus. Sed fermentum odio tellus, ultrices accumsan nisi varius eu. Sed nec bibendum nunc. Nullam ut molestie felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum lorem augue, eleifend sagittis lobortis pulvinar, elementum et ante. Mauris vel scelerisque ante. Praesent non lectus bibendum, mollis tellus at, tristique tortor.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies metus nec congue sollicitudin. Phasellus lobortis lacus quis dolor vehicula mattis. Etiam mattis pretium fermentum. Integer tincidunt velit odio, nec malesuada mauris tempus vel. Proin dui dolor, imperdiet sed nibh vitae, ultrices elementum lectus. Quisque facilisis ligula a ligula commodo tincidunt. Praesent eget cursus ex. Vivamus tincidunt, odio eget rutrum auctor, elit odio imperdiet nisi, at placerat lorem augue nec lorem. Donec maximus est feugiat erat gravida venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.';

        add_theme_support('starter-content', array(
            'options' => array(
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{blog}}',
                'sesame_options' => maybe_serialize(array(
                    'email' => get_option('admin_email'),
                    'tel' => '+1 (234) 345 6789',
                )
            )),
            'widgets' => array(
                'footer-widget-area-1' => array(
                    'text_about' => array(
                        'title' => __('About Us', 'sesame')
                    ),
                ),
                'footer-widget-area-2' => array(
                    'text_business_info'
                ),
                'footer-widget-area-3' => array(
                    'meta_custom' => array(
                        'meta', array(
                            'title' => __('Meta', 'sesame'),
                        )
                    ),
                ),
                'footer-widget-area-4' => array(
                    'archives',
                )
            ),
            'posts' => array(
                'home' => array(
                    'post_content' => $lorem
                ),
                'about' => array(
                    'post_content' => $lorem
                ),
                'contact' => array(
                    'post_content' => $lorem
                ),
                'blog'
            ),
            'nav_menus' => array(
                'main-menu' => array(
                    'name' => __('Main Menu', 'sesame'),
                    'items' => array(
                        'page_home',
                        'page_about',
                        'page_blog',
                        'page_contact',
                    ),
                )
            ),
        ));
    }

    /**
     * Set Width of Content Cantainer
     */
    public function set_content_width()
    {
        global $content_width;
        if(!isset($content_width)) $content_width = 640;
    }

    /**
     * Register Theme Menus
     */
    public function load_nav_menus()
    {
        register_nav_menus(
            array('main-menu'=>__('Main Menu', 'sesame'))
        );
    }

    /**
     * Register Theme Widget Areas (Sidebars)
     */
    public function load_sidebars()
    {
        register_sidebar(array(
            'name'=>__('Sidebar Widget Area', 'sesame'),
            'id'=>'primary-widget-area',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));

        register_sidebar(array(
            'name'=>__('Search Widget Area', 'sesame'),
            'id'=>'search-widget-area',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Header', 'sesame'),
            'id'=>'header-widget-area',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer Column 1', 'sesame'),
            'id'=>'footer-widget-area-1',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer Column 2', 'sesame'),
            'id'=>'footer-widget-area-2',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer Column 3', 'sesame'),
            'id'=>'footer-widget-area-3',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer Column 4', 'sesame'),
            'id'=>'footer-widget-area-4',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));

        register_sidebar(array(
            'name'=>__('Header Membership', 'sesame'),
            'id'=>'header-membership',
            'before_widget'=>'<div id="%1$s" class="widget-container %2$s">',
            'after_widget'=>"</div>",
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
    }

    /**
     * Enqueue Frontend (Site) Styles and Javascript Libraries
     */
    public function load_frontend_assets()
    {
        wp_enqueue_script('jquery');
        
        wp_enqueue_style('sesame_style', get_template_directory_uri().'/style.css');
        wp_enqueue_style('sesame_all_styles', get_template_directory_uri().'/assets/css/style.min.css');
        wp_enqueue_script('sesame_script', get_template_directory_uri().'/assets/js/general.min.js');

        wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.min.js');
        wp_enqueue_script('sesame_footer_script', '', array(), '', true);
        
        // Customizer Style
        $customizer = '/assets/css/customizer.css';
        if(get_current_blog_id() and get_current_blog_id() != 1) $customizer = '/assets/css/customizer'.get_current_blog_id().'.css';
        
        if(file_exists(get_template_directory().$customizer)) wp_enqueue_style('sesame_customizer', get_template_directory_uri().$customizer, array(), '1.2.3.'.time(), 'all');
    }

    /**
     * Enqueue Javascript Library of Comment Reply
     */
    public function load_comment_assets()
    {
        if(get_option('thread_comments')) wp_enqueue_script('comment-reply');
    }

    /**
     * Initialize Redux Options Framework
     */
    public function load_redux()
    {
        // Define Fields
        require_once get_template_directory().'/includes/options/sesame-fields.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

        // Load Redux Extensions
        add_action('redux/extensions/sesame_options/before', array($this, 'load_redux_extensions'), 0);
    
        require_once get_template_directory().'/includes/redux/framework.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        require_once get_template_directory().'/includes/options/sesame.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        
        // Generate Dynamic Styles
        add_action('redux/options/sesame_options/saved', array($this, 'generate_dynamic_styles'), 0);

        if(get_current_user_id() and isset($_GET['customize_changeset_uuid']))
        {
            add_action('redux/loaded', array($this, 'generate_dynamic_styles'), 0);
        }

        // Register Meta Box Options
        add_action('redux/metaboxes/sesame_options/boxes', array($this, 'add_redux_metaboxes'), 0);
    }

    /**
     * Include Redux Extensions
     * @param $ReduxFramework
     */
    public function load_redux_extensions($ReduxFramework)
    {
        $path = get_template_directory().'/includes/redux_extensions/';
        $folders = scandir($path, 1);
        
        foreach($folders as $folder)
        {
            if($folder === '.' or $folder === '..' or ! is_dir($path . $folder)) continue;
            
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if(!class_exists($extension_class))
            {
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters('redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file);
                
                if($class_file) require_once($class_file); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
            }
            
            if(!isset($ReduxFramework->extensions[$folder]))
            {
                $ReduxFramework->extensions[$folder] = new $extension_class($ReduxFramework);
            }
        }
    }

    /**
     * Initialize TGMPA for dependencies
     */
    public function load_dependencies()
    {
        // Include Dependencies File
        if(file_exists(get_template_directory().'/includes/dependencies.php'))
        {
            include_once get_template_directory().'/includes/dependencies.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        }
    }

    /**
     * Generate Custom Styles File
     * @param array $options
     */
    public function generate_dynamic_styles($options = array())
    {
        if(!is_array($options) or (is_array($options) and !count($options)))
        {
            global $sesame_options;
            $options = $sesame_options;
        }

        /** @var WP_Filesystem_Direct $wp_filesystem */
        global $wp_filesystem;

        require_once(ABSPATH . '/wp-admin/includes/file.php'); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        WP_Filesystem();

        $raw = include get_template_directory().'/includes/options/raw.php';
        foreach($options as $key=>$value)
        {
            if(!is_array($value) and !is_object($value)) $raw = str_replace('('.$key.')', $value, $raw);
        }
        
        // CSS File
        $css_path = get_template_directory().'/assets/css/customizer.css';
        
        // Multisite Support
        $current_blog_id = get_current_blog_id();
        if($current_blog_id and $current_blog_id != 1) $css_path = get_template_directory().'/assets/css/customizer'.$current_blog_id.'.css';

        // Write on _variables.scss file
        $wp_filesystem->put_contents($css_path, $raw);
    }

    /**
     * Add Redux Metabox for pages and posts
     * @param $metaboxes
     * @return array
     */
    public function add_redux_metaboxes($metaboxes)
    {
        // Declare Sections
        $boxSections = array();
        
        $boxSections[] = sesame_get_fields()->section_page_title_options;
        $boxSections[] = sesame_get_fields()->section_sidebar_options;

        // Declare Metaboxes
        $metaboxes[] = array(
            'id' => 'sesame_metabox',
            'title' => __('Theme Options', 'sesame'),
            'post_types' => array('page', 'post'),
            'position' => 'normal',
            'priority' => 'default',
            'sections' => $boxSections,
        );

        return $metaboxes;
    }

    /**
     * Print Breadcrumbs
     */
    public function breadcrumbs()
    {
        // Settings
        $breadcrums_id      = 'breadcrumbs';
        $breadcrums_class   = 'breadcrumbs';
        $home_title         = __('Home', 'sesame');

        // Get the query & post information
        global $post;
        global $sesame_options;

        // Breadcrumb is not enabled
        if(isset($sesame_options['breadcrumb']) and !$sesame_options['breadcrumb']) return;

        // Do not display on the homepage
        if(is_front_page()) return;
        
        // Build the breadcrums
        echo '<div class="re-breadcrumbs"><div class="re-container"><ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
        echo '<li class="separator separator-home"><span class="re-icon-arrow-up"></span></li>';

        if(is_archive() && !is_tax() && !is_category() && !is_tag() && !is_author())
        {
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
        }
        else if(is_archive() && is_tax() && !is_category() && !is_tag())
        {
            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post')
            {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_attr($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"><span class="re-icon-arrow-up"></span></li>';
            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</strong></li>';
        }
        else if(is_single())
        {
            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post')
            {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_attr($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"><span class="re-icon-arrow-up"></span></li>';
            }

            // Get post category info
            $category = get_the_category();

            $cat_display = '';
            if(!empty($category))
            {
                // Get last category post is in
                $last_category = end(array_values($category));

                $cat_display .= '<li class="item-cat"><a href="'.esc_url(get_term_link($last_category->term_id)).'">'.esc_html($last_category->name).'</a></li>';
                $cat_display .= '<li class="separator"><span class="re-icon-arrow-up"></span></li>';
            }

            // Check if the post is in a category
            if(!empty($last_category))
            {
                echo $cat_display; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo '<li class="item-current item-' . esc_html($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
            }
            else
            {
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
            }
        }
        else if(is_category())
        {
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        }
        else if(is_page())
        {
            // Standard page
            if($post->post_parent)
            {
                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if(!isset($parents)) $parents = null;
                
                foreach($anc as $ancestor)
                {
                    $parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . esc_url(get_permalink($ancestor)) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
                    $parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> <span class="re-icon-arrow-up"></span></li>';
                }

                // Display parent pages
                echo $parents; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                // Current page
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . esc_attr(get_the_title()) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
            }
            else
            {
                // Just display current page if not parents
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
            }
        }
        else if(is_tag())
        {
            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><strong class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_html($get_term_name) . '</strong></li>';
        }
        else if(is_day())
        {
            // Day archive

            // Year link
            /* translators: %s is the year */
            echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link( get_the_time('Y') )) . '" title="' . esc_attr(get_the_time('Y')) . '">' . sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('Y'))) . '</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('Y')) . '"> <span class="re-icon-arrow-up"></span></li>';

            // Month link
            /* translators: %s is the month */
            echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')). '"><a class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" href="' . esc_attr(get_month_link( get_the_time('Y'), get_the_time('m'))) . '" title="' . esc_attr(get_the_time('M')) . '">' . sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('M'))) . '</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('m')) . '"><span class="re-icon-arrow-up"></span></li>';

            // Day display
            /* translators: %s is the day and month */
            echo '<li class="item-current item-' . esc_attr(get_the_time('j')) . '"><strong class="bread-current bread-' . esc_attr(get_the_time('j')) . '"> ' . sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('jS')) . ' ' . esc_html(get_the_time('M'))) . ' </strong></li>';
        }
        else if(is_month())
        {
            // Month Archive

            // Year link
            /* translators: %s is the year */
            echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_attr(get_year_link( get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('Y'))) . '</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('Y')) . '"><span class="re-icon-arrow-up"></span></li>';

            // Month display
            /* translators: %s is the month */
            echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><strong class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" title="' . esc_attr(get_the_time('M')) . '">' . sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('M'))). '</strong></li>';
        }
        else if(is_year())
        {
            // Display year archive
            /* translators: %s is the year */
            echo '<li class="item-current item-current-' . esc_attr(get_the_time('Y')) . '"><strong class="bread-current bread-current-' . esc_attr(get_the_time('Y')) . '" title="' . esc_attr(get_the_time('Y')) . '">'. sprintf(esc_html__('%s Archives', 'sesame'), esc_html(get_the_time('Y'))) . '</strong></li>';
        }
        else if(is_author())
        {
            // Author archive

            // Get the author information
            global $author;
            $userdata = get_userdata($author);

            // Display author name
            /* translators: %s is the author name */
            echo '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><strong class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' .sprintf(esc_html__('Author: %s', 'sesame'), esc_html($userdata->display_name)). '</strong></li>';
        }
        else if(get_query_var('paged'))
        {
            // Paginated archives
            /* translators: %s is the current page */
            echo '<li class="item-current item-current-' . esc_attr(get_query_var('paged')) . '"><strong class="bread-current bread-current-' . esc_attr(get_query_var('paged')) . '" title="' . sprintf(esc_attr__('Page %s', 'sesame'), esc_attr(get_query_var('paged'))) . '">'.sprintf(esc_html__('Page', 'sesame'), esc_html(get_query_var('paged'))) . '</strong></li>';
        }
        else if(is_search())
        {
            // Search results page
            /* translators: %s is the searched term */
            echo '<li class="item-current item-current-' . esc_attr(get_search_query()) . '"><strong class="bread-current bread-current-' . esc_attr(get_search_query()) . '" title="' . sprintf(esc_attr__('Search results for: %s', 'sesame'), get_search_query()) . '">'.sprintf(esc_html__('Search results for: %s', 'sesame'), esc_html(get_search_query())). '</strong></li>';
        }
        elseif(is_404())
        {
            // 404 page
            echo '<li>' . esc_html__('Error 404', 'sesame') . '</li>';
        }

        echo '</ul></div></div>';
    }

    /**
     * Get Length of Post Excerpts From Theme Options
     * @param integer $length
     * @return integer
     */
    public function set_excerpt_length($length)
    {
        if(is_admin()) return $length;

        global $sesame_options;
        return $sesame_options["excerpt-chars-number"];
    }

    /**
     * Return Read More Link for Posts
     * @param string $more
     * @return string
     */
    public function set_excerpt_more($more)
    {
        if(is_admin()) return $more;

        global $sesame_options;

        return sprintf('<div class="re-read-more"><a class="read-more" href="%1$s">%2$s</a></div>',
            get_permalink(get_the_ID()),
            esc_html($sesame_options['excerpt-more-text'])
        );
    }
}