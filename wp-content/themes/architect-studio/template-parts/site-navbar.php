<?php 
$architect_studio_menu_style = get_theme_mod('aasta_menu_style', 'sticky');   
$architect_studio_menu_container_size = get_theme_mod('aasta_menu_container_size', 'container');
?>

    <!-- Header Center Logo -->
	<section class="theme-header-logo-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">	
					<?php echo aasta_header_logo(); ?>									
				</div>
			</div>	
		</div>
	</section>
	<!-- /End of Header Center Logo -->
	<!-- Theme Menubar -->
	<nav class="navbar navbar-expand-lg not-sticky navbar-light navbar-header-center  <?php if($architect_studio_menu_style == 'sticky'){echo 'header-sticky'; }?>">
		<div class="<?php echo esc_attr($architect_studio_menu_container_size); ?>">
			<div class="row align-self-center">
				
					<div class="align-self-center">	
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation','architect-studio'); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					
					<?php 
						wp_nav_menu( array(
							 'theme_location'  => 'primary',
							 'container'       => 'div',
							 'container_class' => 'collapse navbar-collapse',
							 'container_id' => 'navbarNavDropdown',
							 'menu_class'      => 'nav navbar-nav m-right-left-auto',
							 'fallback_cb'     => 'aasta_bootstrap_navwalker::fallback',
							 'walker'          => new aasta_bootstrap_navwalker()
						) );
					?>
				
			</div>
		</div>
	</nav>
	<!-- /Theme Menubar -->