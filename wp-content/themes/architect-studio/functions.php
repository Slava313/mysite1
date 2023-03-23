<?php
/**
 * Theme functions and definitions
 *
 * @package architect-studio
 */
/**
 * After setup theme hook
 */
function architect_studio_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'architect-studio', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/architect-studio-customizer-options.php';	
}
add_action( 'after_setup_theme', 'architect_studio_theme_setup' );

/**
 * Load assets.
 */

function architect_studio_theme_css() {
	wp_enqueue_style( 'architect-studio-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('architect-studio-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('architect-studio-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
	wp_dequeue_script( 'architect_studio_custom_menu_script' );
	wp_enqueue_style('architect-studio-bootstrap-smartmenus', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" );
	remove_action( 'wp_footer', 'aasta_custom_menu_script' );
}
add_action( 'wp_enqueue_scripts', 'architect_studio_theme_css', 99);



/**
 * Import Options From Parent Theme
 *
 */
function architect_studio_parent_theme_options() {
	$aasta_mods = get_option( 'theme_mods_aasta' );
	if ( ! empty( $aasta_mods ) ) {
		foreach ( $aasta_mods as $aasta_mod_k => $aasta_mod_v ) {
			set_theme_mod( $aasta_mod_k, $aasta_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'architect_studio_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_architect_studio_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'aasta_page_header_background_color', 'rgba(0,0,0,0.5)' );
	set_theme_mod( 'aasta_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-bg.jpg' );
	set_theme_mod( 'aasta_slider_caption_layout', 'aasta_slider_captoin_layout1' );
	set_theme_mod( 'aasta_service_layout', 'aasta_service_layout4' );
	set_theme_mod( 'aasta_project_layout', 'aasta_project_layout1' );
	set_theme_mod( 'aasta_testimonial_layout', 'aasta_testimonial_layout3' );
	set_theme_mod( 'aasta_funfact_layout', 'aasta_funfact_layout1' );
	set_theme_mod( 'aasta_team_layout', 'aasta_team_layout2' );
	set_theme_mod( 'aasta_top_header_layout', 'aasta_top_header_layout2' );
	set_theme_mod( 'aasta_client_layout', 'aasta_client_layout2' );
	set_theme_mod( 'aasta_project_column_layout', '4' );
	set_theme_mod( 'aasta_blog_column_layout', '3' );
	set_theme_mod( 'aasta_blog_front_container_size', 'container-full' );
	set_theme_mod( 'aasta_project_front_container_size', 'container-fluid' );
	set_theme_mod( 'aasta_menu_container_size', 'container-full' );
	set_theme_mod( 'aasta_theme_color', 'theme-yellow' );
	set_theme_mod( 'aasta_typography_disabled', true );
	set_theme_mod( 'aasta_typography_h1_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h2_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h3_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h4_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h5_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h6_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_widget_title_font_family', 'Fira Sans' );
	set_theme_mod( 'aasta_typography_h1_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_h2_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_h3_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_h4_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_h5_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_h6_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_menu_bar_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_dropdown_bar_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_typography_widget_title_text_transform', 'uppercase' );
	set_theme_mod( 'aasta_main_header_style', 'center_logo' );

	update_option( 'fresh_architect_studio_site_activate', true );
}

/**
 * Custom Theme Script
*/
function architect_studio_custom_theme_css() {
	$architect_studio_testomonial_background_image = get_theme_mod('aasta_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($architect_studio_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $architect_studio_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','architect_studio_custom_theme_css');

/**
 * Page header
 *
 */
function architect_studio_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'aasta_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/architect-studio-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'architect_studio_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'architect_studio_custom_header_setup' );

/**
 * Custom background
 *
 */
function architect_studio_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'architect_studio_custom_background_args', array(
		'default-color' => '202020',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'architect_studio_custom_background_setup' );


if ( ! function_exists( 'architect_studio_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see aasta_light_custom_header_setup().
	 */
	function architect_studio_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;