<?php
/**
 * Dream Home About Theme
 *
 * @package Dream Home
 */

//about theme info
add_action( 'admin_menu', 'dream_home_abouttheme' );
function dream_home_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'dream-home'), __('About Theme Info', 'dream-home'), 'edit_theme_options', 'dream_home_guide', 'dream_home_mostrar_guide');   
} 

//Info of the theme
function dream_home_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'dream-home'); ?></h1>
<hr />  

<p><?php esc_html_e('The Dream Home is a free real estate WordPress theme perfect for real estate agency, buyers, sellers, investors, real estate agent, house for sale, villa sale, apartment sale, buy house, property buying, other business websites. This luxury real estate WordPress theme can be used for apartment, construction company, corporate, estate, flat, location, map, mortage, real, realtor, rent, real estate projects, villas, and luxury homes. This WordPress theme is 100% responsive and also retina-ready. It is a fast-loading theme and works fine even on mobile phones as it is proven to be mobile-friendly. A big plus point of using this free WordPress theme for your website is its SEO optimization feature. This WordPress theme is highly customizable. Every element of this theme is customizable. Be it google fonts, background images, color coding, logo, or widgets, every element of this theme is highly customizable. Most of the popular builder plugins, such as WooCommerce, NextGen Gallery, WPForms Contact Form 7, etc., are perfectly compatible with this free WordPress theme for real estate and other business websites. The most significant plus point of this WordPress theme is its compatibility with WooCommerce, as being WooCommerce compatible makes all the financial transactions easier and secure.', 'dream-home'); ?></p>

<h2><?php esc_html_e('Theme Features', 'dream-home'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'dream-home'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'dream-home'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'dream-home'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'dream-home'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'dream-home'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'dream-home'); ?></p>


<h3><?php esc_html_e('E-commerce', 'dream-home'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'dream-home'); ?></p>

<hr />  	
<p><a href="http://www.gracethemesdemo.com/documentation/dream-home/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'dream-home'); ?></a></p>

<?php } ?>