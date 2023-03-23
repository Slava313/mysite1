<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Dream Home
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#Tab-NaviagtionBX">
<?php esc_html_e('Skip to content', 'dream-home' ); ?>
</a>
<?php
$dream_home_show_contactdinfo 	   			= esc_attr( get_theme_mod('dream_home_show_contactdinfo', false) ); 
$dream_home_headerslider_show 	  		= esc_attr( get_theme_mod('dream_home_headerslider_show', false) );
$dream_home_3column_settings_show      		= esc_attr( get_theme_mod('dream_home_3column_settings_show', false) );
?>
<div id="SiteWrapper" <?php if( get_theme_mod( 'dream_home_layoutoption' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($dream_home_headerslider_show)) {
	 	$innerpage_cls = '';
	}
	else {
		$innerpage_cls = 'innerpage_header';
	}
}
else {
$innerpage_cls = 'innerpage_header';
}
?>

<div id="masthead" class="site-header <?php echo esc_attr($innerpage_cls); ?> ">      
       
        <?php if( $dream_home_show_contactdinfo != ''){ ?> 
          <div class="topcontact-strip">
           <div class="container">             
            <?php $dream_home_contactno = get_theme_mod('dream_home_contactno');
                if( !empty($dream_home_contactno) ){ ?>              
                <div class="headinfo">
                    <i class="fas fa-phone fa-rotate-90"></i>
                    <?php echo esc_html($dream_home_contactno); ?>
                </div>       
            <?php } ?>
            
             <?php $email = get_theme_mod('dream_home_emailinfo');
                if( !empty($email) ){ ?>                
                <div class="headinfo">
                    <i class="far fa-envelope"></i>
                    <a href="<?php echo esc_url('mailto:'.sanitize_email($email)); ?>"><?php echo sanitize_email($email); ?></a>
                </div>            
            <?php } ?>           
         
             <div class="headinfo">
                <div class="hdr-tp-social">                                                
					   <?php $dream_home_facebooklink = get_theme_mod('dream_home_facebooklink');
                        if( !empty($dream_home_facebooklink) ){ ?>
                        <a class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($dream_home_facebooklink); ?>"></a>
                       <?php } ?>
                    
                       <?php $dream_home_twitterlink = get_theme_mod('dream_home_twitterlink');
                        if( !empty($dream_home_twitterlink) ){ ?>
                        <a class="fab fa-twitter" target="_blank" href="<?php echo esc_url($dream_home_twitterlink); ?>"></a>
                       <?php } ?>
                
                      <?php $dream_home_linkedinlink = get_theme_mod('dream_home_linkedinlink');
                        if( !empty($dream_home_linkedinlink) ){ ?>
                        <a class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($dream_home_linkedinlink); ?>"></a>
                      <?php } ?> 
                      
                      <?php $dream_home_instagramlink = get_theme_mod('dream_home_instagramlink');
                        if( !empty($dream_home_instagramlink) ){ ?>
                        <a class="fab fa-instagram" target="_blank" href="<?php echo esc_url($dream_home_instagramlink); ?>"></a>
                      <?php } ?> 
                  </div><!--end .hdr-tp-social-->
                </div><!--end .headinfo-->   
             
        		 <div class="clear"></div> 
          </div><!-- .container -->  
      </div><!-- .topcontact-strip -->      
   <?php } ?>   

      <div class="LogoNavi-Bar">  
       <div class="container">    
         <div class="logo">
           <?php dream_home_the_custom_logo(); ?>
            <div class="site_branding">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
         </div><!-- logo --> 
         
          <div class="MenuPart_Right"> 
             <div id="navigationpanel"> 
                 <nav id="main-navigation" class="theme-navi" role="navigation" aria-label="Primary Menu">
                    <button type="button" class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    	wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                    ) );
                    ?>
                </nav><!-- #main-navigation -->  
            </div><!-- #navigationpanel -->   
          </div><!-- .MenuPart_Right --> 
         <div class="clear"></div>
       </div><!-- .container -->  
    </div><!-- .LogoNavi-Bar --> 
 <div class="clear"></div> 
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($dream_home_headerslider_show != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('dream_home_slideno'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('dream_home_slideno'.$i,true));
	  }
	}
?> 
<div class="FrontSlider">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
     <h2><?php the_title(); ?></h2>
     <p><?php $excerpt = get_the_excerpt(); echo esc_html( dream_home_string_limit_words( $excerpt, esc_attr(get_theme_mod('dream_home_slide_excerpt_length','10')))); ?></p>
		<?php
        $dream_home_slideno_moretext = get_theme_mod('dream_home_slideno_moretext');
        if( !empty($dream_home_slideno_moretext) ){ ?>
            <a class="slidermorebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($dream_home_slideno_moretext); ?></a>
        <?php } ?>  
                        
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
</div><!-- .FrontSlider -->    
<?php } } ?> 

<?php if ( is_front_page() && ! is_home() ) { ?>   
   <?php if( $dream_home_3column_settings_show != ''){ ?> 
   <section id="Section-1">
     <div class="container"> 
        <?php
        $dream_home_sectiontitle = get_theme_mod('dream_home_sectiontitle');
        if( !empty($dream_home_sectiontitle) ){ ?>
            <h2><?php echo esc_html($dream_home_sectiontitle); ?></h2>
        <?php } ?>
        
        <div class="box-equal-height"> 
          <?php 
                for($n=1; $n<=3; $n++) {    
                if( get_theme_mod('dream_home_3columnbx'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('dream_home_3columnbx'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                     <div class="ThreeColumn <?php if($n % 3 == 0) { echo "last_column"; } ?>">  
                    	 <div class="topboxbg "> 
							  <?php if(has_post_thumbnail() ) { ?>
                                <div class="ThumBX">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>                                
                                </div>        
                               <?php } ?>
                               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                               <p><?php $excerpt = get_the_excerpt(); echo esc_html( dream_home_string_limit_words( $excerpt, esc_attr(get_theme_mod('dream_home_3column_excerpt_length','15')))); ?></p>
                        </div>
                      </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>                                 
               <div class="clear"></div>  
          </div>
      </div><!-- .container -->
    </section><!-- #Section-1-->
  <?php } ?> 
<?php } ?>