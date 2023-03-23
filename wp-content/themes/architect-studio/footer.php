<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package architect-studio
 */
$architect_studio_footer_widgets_enabled = get_theme_mod('aasta_footer_widgets_enabled', true);  
$architect_studio_footer_container_size = get_theme_mod('aasta_footer_container_size', 'container');
$architect_studio_footer_copright_enabled = get_theme_mod('aasta_footer_copright_enabled', true);
$architect_studio_footer_copright_text = get_theme_mod('aasta_footer_copright_text', __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Architect Studio theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'architect-studio'));
$architect_studio_scroll_to_top_enabled = get_theme_mod('aasta_scroll_to_top_enabled', true); 
?>
	<!--Footer-->
	<footer class="site-footer">

	<?php if($architect_studio_footer_widgets_enabled == true): ?>
		<div class="<?php echo esc_attr($architect_studio_footer_container_size); ?>">
			<!--Footer Widgets-->			
			<div class="row footer-sidebar">
			   <?php get_template_part('sidebar','footer');?>
			</div>
		</div>
		<!--/Footer Widgets-->
	<?php endif; ?>		
		

    <?php if($architect_studio_footer_copright_enabled == true): ?>
		<!--Site Info copyright-->
		<div class="site-info text-center">
			<?php echo wp_kses_post($architect_studio_footer_copright_text); ?>				
		</div>
		<!--/Site Info copyright-->			
	<?php endif; ?>	
			
	</footer>
	<!--/Footer-->		
	<?php if($architect_studio_scroll_to_top_enabled == true): ?>
		<!--Page Scroll to Top-->
		<div class="page-scroll-up"><a href="#totop"><i class="fa fa-angle-up"></i></a></div>
		<!--/Page Scroll to Top-->
    <?php endif; ?>	
	
<?php wp_footer(); ?>

</body>
</html>