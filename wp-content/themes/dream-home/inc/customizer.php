<?php    
/**
 *dream-home Theme Customizer
 *
 * @package Dream Home
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dream_home_customize_register( $wp_customize ) {	
	
	function dream_home_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function dream_home_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function dream_home_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
	
	
	function dream_home_sanitize_excerptrange( $number, $setting ) {	
		// Ensure input is an absolute integer.
		$number = absint( $number );	
		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;	
		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );	
		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );	
		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );	
		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	function dream_home_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}
	
	// Ensure is an absolute integer
	function dream_home_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'dream_home_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
		'render_callback' => 'dream_home_customize_partial_blogdescription',
	) );
		
	 	
	//Panel for section & control
	$wp_customize->add_panel( 'dream_home_theme_options_panel', array(
		'priority' => 4,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Dream Home Theme Settings', 'dream-home' ),		
	) );

	$wp_customize->add_section('dream_home_layoutstyle',array(
		'title' => __('Layout Style','dream-home'),			
		'priority' => 1,
		'panel' => 	'dream_home_theme_options_panel',          
	));		
	
	$wp_customize->add_setting('dream_home_layoutoption',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_layoutoption', array(
    	'section'   => 'dream_home_layoutstyle',    	 
		'label' => __('Check to Show Box Layout','dream-home'),
		'description' => __('check for box layout','dream-home'),
    	'type'      => 'checkbox'
     )); //Layout Settings 
	
	$wp_customize->add_setting('dream_home_colorscheme',array(
		'default' => '#bdcd39',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'dream_home_colorscheme',array(
			'label' => __('Color Scheme','dream-home'),			
			'section' => 'colors',
			'settings' => 'dream_home_colorscheme'
		))
	);
	
	$wp_customize->add_setting('dream_home_secondcolor',array(
		'default' => '#0066cb',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'dream_home_secondcolor',array(
			'label' => __('Second Color','dream-home'),			
			'section' => 'colors',
			'settings' => 'dream_home_secondcolor'
		))
	);
	
	$wp_customize->add_setting('dream_home_menufontcolor',array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'dream_home_menufontcolor',array(
			'label' => __('Navigation font Color','dream-home'),			
			'section' => 'colors',
			'settings' => 'dream_home_menufontcolor'
		))
	);
	
	
	$wp_customize->add_setting('dream_home_menufontactivecolor',array(
		'default' => '#bdcd39',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'dream_home_menufontactivecolor',array(
			'label' => __('Navigation Hover/Active Color','dream-home'),			
			'section' => 'colors',
			'settings' => 'dream_home_menufontactivecolor'
		))
	);
	
	
	 //Header Contact Info
	$wp_customize->add_section('dream_home_headcontinfo',array(
		'title' => __('Header Contact Info','dream-home'),				
		'priority' => null,
		'panel' => 	'dream_home_theme_options_panel',
	));	
	
	$wp_customize->add_setting('dream_home_contactno',array(
		'default' => null,
		'sanitize_callback' => 'dream_home_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('dream_home_contactno',array(	
		'type' => 'text',
		'label' => __('Enter phone number here','dream-home'),
		'section' => 'dream_home_headcontinfo',
		'setting' => 'dream_home_contactno'
	));
	
	$wp_customize->add_setting('dream_home_emailinfo',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('dream_home_emailinfo',array(
		'type' => 'email',
		'label' => __('enter email id here.','dream-home'),
		'section' => 'dream_home_headcontinfo'
	));	
	
	
	$wp_customize->add_setting('dream_home_facebooklink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('dream_home_facebooklink',array(
		'label' => __('Add facebook link here','dream-home'),
		'section' => 'dream_home_headcontinfo',
		'setting' => 'dream_home_facebooklink'
	));	
	
	$wp_customize->add_setting('dream_home_twitterlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dream_home_twitterlink',array(
		'label' => __('Add twitter link here','dream-home'),
		'section' => 'dream_home_headcontinfo',
		'setting' => 'dream_home_twitterlink'
	));

	
	$wp_customize->add_setting('dream_home_linkedinlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dream_home_linkedinlink',array(
		'label' => __('Add linkedin link here','dream-home'),
		'section' => 'dream_home_headcontinfo',
		'setting' => 'dream_home_linkedinlink'
	));
	
	$wp_customize->add_setting('dream_home_instagramlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dream_home_instagramlink',array(
		'label' => __('Add instagram link here','dream-home'),
		'section' => 'dream_home_headcontinfo',
		'setting' => 'dream_home_instagramlink'
	));		
	
	$wp_customize->add_setting('dream_home_show_contactdinfo',array(
		'default' => false,
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'dream_home_show_contactdinfo', array(
	   'settings' => 'dream_home_show_contactdinfo',
	   'section'   => 'dream_home_headcontinfo',
	   'label'     => __('Check To show Header contact Section','dream-home'),
	   'type'      => 'checkbox'
	 ));//Show Contact Info
	 
	 	
	//HomePage Slide Section		
	$wp_customize->add_section( 'dream_home_headerslider', array(
		'title' => __('Header Slider Settings', 'dream-home'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 624 pixel.','dream-home'), 
		'panel' => 	'dream_home_theme_options_panel',           			
    ));
	
	$wp_customize->add_setting('dream_home_slideno1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dream_home_slideno1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 1:','dream-home'),
		'section' => 'dream_home_headerslider'
	));	
	
	$wp_customize->add_setting('dream_home_slideno2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dream_home_slideno2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 2:','dream-home'),
		'section' => 'dream_home_headerslider'
	));	
	
	$wp_customize->add_setting('dream_home_slideno3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dream_home_slideno3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 3:','dream-home'),
		'section' => 'dream_home_headerslider'
	));	//frontpage Slider Section	
	
	//Slider Excerpt Length
	$wp_customize->add_setting( 'dream_home_slide_excerpt_length', array(
		'default'              => 10,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'dream_home_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'dream_home_slide_excerpt_length', array(
		'label'       => __( 'Slider Excerpt length','dream-home' ),
		'section'     => 'dream_home_headerslider',
		'type'        => 'range',
		'settings'    => 'dream_home_slide_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	$wp_customize->add_setting('dream_home_slideno_moretext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('dream_home_slideno_moretext',array(	
		'type' => 'text',
		'label' => __('enter button name here','dream-home'),
		'section' => 'dream_home_headerslider',
		'setting' => 'dream_home_slideno_moretext'
	)); // slider read more button text
	
		
	$wp_customize->add_setting('dream_home_headerslider_show',array(
		'default' => false,
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'dream_home_headerslider_show', array(
	    'settings' => 'dream_home_headerslider_show',
	    'section'   => 'dream_home_headerslider',
	    'label'     => __('Check To Show This Section','dream-home'),
	   'type'      => 'checkbox'
	 ));//Show Home Page Slider Sections	
	 
	 
	 //Three Column Sections
	$wp_customize->add_section('dream_home_3column_settings', array(
		'title' => __('Three Column Services','dream-home'),
		'description' => __('Select pages from the dropdown for three column services','dream-home'),
		'priority' => null,
		'panel' => 	'dream_home_theme_options_panel',          
	));
	
	$wp_customize->add_setting('dream_home_sectiontitle',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('dream_home_sectiontitle',array(	
		'type' => 'text',
		'label' => __('Enter section title here','dream-home'),
		'section' => 'dream_home_3column_settings',
		'setting' => 'dream_home_sectiontitle'
	)); // Section Title text	
	
		
	$wp_customize->add_setting('dream_home_3columnbx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dream_home_3columnbx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'dream_home_3column_settings',
	));		
	
	$wp_customize->add_setting('dream_home_3columnbx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dream_home_3columnbx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'dream_home_3column_settings',
	));
	
	$wp_customize->add_setting('dream_home_3columnbx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dream_home_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dream_home_3columnbx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'dream_home_3column_settings',
	));
	
	$wp_customize->add_setting( 'dream_home_3column_excerpt_length', array(
		'default'              => 15,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'dream_home_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'dream_home_3column_excerpt_length', array(
		'label'       => __( 'Circle box excerpt length','dream-home' ),
		'section'     => 'dream_home_3column_settings',
		'type'        => 'range',
		'settings'    => 'dream_home_3column_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	
	$wp_customize->add_setting('dream_home_3column_settings_show',array(
		'default' => false,
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'dream_home_3column_settings_show', array(
	   'settings' => 'dream_home_3column_settings_show',
	   'section'   => 'dream_home_3column_settings',
	   'label'     => __('Check To Show This Section','dream-home'),
	   'type'      => 'checkbox'
	 ));//Show Four Circle Column sections
	
	 
	 //Blog Posts Settings
	$wp_customize->add_panel( 'dream_home_blogsettings_panel', array(
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Blog Posts Settings', 'dream-home' ),		
	) );
	
	$wp_customize->add_section('dream_home_blogmeta_options',array(
		'title' => __('Blog Meta Options','dream-home'),			
		'priority' => null,
		'panel' => 	'dream_home_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('dream_home_hide_blogdate',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_hide_blogdate', array(
    	'label' => __('Check to hide post date','dream-home'),	
		'section'   => 'dream_home_blogmeta_options', 
		'setting' => 'dream_home_hide_blogdate',		
    	'type'      => 'checkbox'
     )); //Blog Post Date
	 
	 
	 $wp_customize->add_setting('dream_home_hide_postcats',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_hide_postcats', array(
		'label' => __('Check to hide post category','dream-home'),	
    	'section'   => 'dream_home_blogmeta_options',		
		'setting' => 'dream_home_hide_postcats',		
    	'type'      => 'checkbox'
     )); //blog Posts category	 
	 
	 
	 $wp_customize->add_section('dream_home_postfeatured_image',array(
		'title' => __('Posts Featured image','dream-home'),			
		'priority' => null,
		'panel' => 	'dream_home_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('dream_home_hide_postfeatured_image',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_hide_postfeatured_image', array(
		'label' => __('Check to hide post featured image','dream-home'),
    	'section'   => 'dream_home_postfeatured_image',		
		'setting' => 'dream_home_hide_postfeatured_image',	
    	'type'      => 'checkbox'
     )); //Posts featured image
	
	$wp_customize->add_section('dream_home_blogpost_content_settings',array(
		'title' => __('Posts Excerpt Options','dream-home'),			
		'priority' => null,
		'panel' => 	'dream_home_blogsettings_panel', 	         
	 ));	 
	 
	$wp_customize->add_setting( 'dream_home_blogexcerptrange', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'dream_home_sanitize_excerptrange',		
	) );
	
	$wp_customize->add_control( 'dream_home_blogexcerptrange', array(
		'label'       => __( 'Excerpt length','dream-home' ),
		'section'     => 'dream_home_blogpost_content_settings',
		'type'        => 'range',
		'settings'    => 'dream_home_blogexcerptrange','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('dream_home_blogfullcontent',array(
        'default' => 'Excerpt',     
        'sanitize_callback' => 'dream_home_sanitize_choices'
	));
	
	$wp_customize->add_control('dream_home_blogfullcontent',array(
        'type' => 'select',
        'label' => __('Posts Content','dream-home'),
        'section' => 'dream_home_blogpost_content_settings',
        'choices' => array(
        	'Content' => __('Content','dream-home'),
            'Excerpt' => __('Excerpt','dream-home'),
            'No Content' => __('No Excerpt','dream-home')
        ),
	) ); 
	
	
	$wp_customize->add_section('dream_home_postsinglemeta',array(
		'title' => __('Posts Single Settings','dream-home'),			
		'priority' => null,
		'panel' => 	'dream_home_blogsettings_panel', 	         
	));	
	
	$wp_customize->add_setting('dream_home_hide_postdate_fromsingle',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_hide_postdate_fromsingle', array(
    	'label' => __('Check to hide post date from single','dream-home'),	
		'section'   => 'dream_home_postsinglemeta', 
		'setting' => 'dream_home_hide_postdate_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide Posts date from single
	 
	 
	 $wp_customize->add_setting('dream_home_hide_postcats_fromsingle',array(
		'sanitize_callback' => 'dream_home_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'dream_home_hide_postcats_fromsingle', array(
		'label' => __('Check to hide post category from single','dream-home'),	
    	'section'   => 'dream_home_postsinglemeta',		
		'setting' => 'dream_home_hide_postcats_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide blogposts category single
		 
}
add_action( 'customize_register', 'dream_home_customize_register' );

function dream_home_custom_css(){ 
?>
	<style type="text/css"> 					
        a,
        #sidebar ul li a:hover,
		#sidebar ol li a:hover,							
        .DefaultPostList h3 a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,				
        .postmeta a:hover,
        .button:hover,
		h2.services_title span,			
		.blog-postmeta a:hover,
		.blog-postmeta a:focus,
		blockquote::before	
            { color:<?php echo esc_html( get_theme_mod('dream_home_colorscheme','#bdcd39')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,
		.logo,
		a.ReadMoreBtn,
		.copyrigh-wrapper:before,										
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.morebutton,
		.nivo-directionNav a:hover,	
		.nivo-caption .slidermorebtn:hover		
            { background-color:<?php echo esc_html( get_theme_mod('dream_home_colorscheme','#bdcd39')); ?>;}
			

		
		.tagcloud a:hover,
		.logo::after,
		blockquote
            { border-color:<?php echo esc_html( get_theme_mod('dream_home_colorscheme','#bdcd39')); ?>;}
			
		#SiteWrapper a:focus,
		input[type="date"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="button"]:focus,
		input[type="month"]:focus,
		button:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="range"]:focus,		
		input[type="password"]:focus,
		input[type="datetime"]:focus,
		input[type="week"]:focus,
		input[type="submit"]:focus,
		input[type="datetime-local"]:focus,		
		input[type="url"]:focus,
		input[type="time"]:focus,
		input[type="reset"]:focus,
		input[type="color"]:focus,
		textarea:focus
            { outline:1px solid <?php echo esc_html( get_theme_mod('dream_home_colorscheme','#bdcd39')); ?>;}	
			
		.hdr-topstrip,
		.nivo-caption .slidermorebtn:hover 			
            { background-color:<?php echo esc_html( get_theme_mod('dream_home_secondcolor','#0066cb')); ?>;}
			
		.site-footer h2::before,
		.site-footer h3::before,
		.site-footer h4::before,
		.site-footer h5::before
            { border-color:<?php echo esc_html( get_theme_mod('dream_home_secondcolor','#0066cb')); ?>;}			
			
		
		.theme-navi a,
		.theme-navi ul li.current_page_parent ul.sub-menu li a,
		.theme-navi ul li.current_page_parent ul.sub-menu li.current_page_item ul.sub-menu li a,
		.theme-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a  			
            { color:<?php echo esc_html( get_theme_mod('dream_home_menufontcolor','#333333')); ?>;}	
			
		
		.theme-navi ul.nav-menu .current_page_item > a,
		.theme-navi ul.nav-menu .current-menu-item > a,
		.theme-navi ul.nav-menu .current_page_ancestor > a,
		.theme-navi ul.nav-menu .current-menu-ancestor > a, 
		.theme-navi .nav-menu a:hover,
		.theme-navi .nav-menu a:focus,
		.theme-navi .nav-menu ul a:hover,
		.theme-navi .nav-menu ul a:focus,
		.theme-navi ul li a:hover, 
		.theme-navi ul li.current-menu-item a,			
		.theme-navi ul li.current_page_parent ul.sub-menu li.current-menu-item a,
		.theme-navi ul li.current_page_parent ul.sub-menu li a:hover,
		.theme-navi ul li.current-menu-item ul.sub-menu li a:hover,
		.theme-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a:hover 		 			
            { color:<?php echo esc_html( get_theme_mod('dream_home_menufontactivecolor','#bdcd39')); ?>;}
			
		.hdrtopcart .cart-count
            { background-color:<?php echo esc_html( get_theme_mod('dream_home_menufontactivecolor','#bdcd39')); ?>;}		
			
		#SiteWrapper .theme-navi a:focus		 			
            { outline:1px solid <?php echo esc_html( get_theme_mod('dream_home_menufontactivecolor','#bdcd39')); ?>;}	
	
    </style> 
<?php          
}
         
add_action('wp_head','dream_home_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dream_home_customize_preview_js() {
	wp_enqueue_script( 'dream_home_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'dream_home_customize_preview_js' );