<?php
/**
 * Customizer section options.
 *
 * @package architect-studio
 *
 */

function architect_studio_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'aasta_footer_copright_text',
			array(
				'sanitize_callback' =>  'architect_studio_sanitize_text',
				'default' => __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Architect Studio theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'architect-studio'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('aasta_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','architect-studio'),
				'section' => 'aasta_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'architect_studio_customizer_theme_settings' );

function architect_studio_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Menu 
*/
function architect_studio_custom_menu_script()
{
	$custom_logo = get_theme_mod( 'custom_logo' );
	if(display_header_text()== true && $custom_logo != null && get_bloginfo( 'title' )  !== '' ){
		$toggle_value = 1; 
	}else{
		$toggle_value = 0; 
	}
?>
<script>
	// This JS added for the Toggle button to work with the focus element.
		if (window.innerWidth < 992) {
			document.addEventListener('keydown', function(e) {
			let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
				if (!isTabPressed) {
					return;
				}
				
			const  focusableElements =
				'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
			const modal = document.querySelector('.navbar.navbar-expand-lg'); // select the modal by it's id

			const firstFocusableElement = modal.querySelectorAll(focusableElements)[0]; // get first element to be focused inside modal
			const focusableContent = modal.querySelectorAll(focusableElements);
			const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal

			  if (e.shiftKey) { // if shift key pressed for shift + tab combination
				if (document.activeElement === firstFocusableElement) {
				  lastFocusableElement.focus(); // add focus for the last focusable element
				  e.preventDefault();
				}
			  } else { // if tab key is pressed
				if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
				  firstFocusableElement.focus(); // add focus for the first focusable element
				  e.preventDefault();			  
				}
			  }

			});
		}
</script>
<?php	
}
add_action('wp_footer','architect_studio_custom_menu_script');