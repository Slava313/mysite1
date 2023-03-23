<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Dream Home
 */

get_header(); ?>

<div class="container">
     <div id="Tab-NaviagtionBX">
        <div class="LS-Content-70">           
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>                  
                    <div class="clear"></div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>                  
          </div><!-- .LS-Content-70-->       
           <?php get_sidebar();?>
        <div class="clear"></div>
    </div><!-- #Tab-NaviagtionBX -->
</div><!-- container -->	
<?php get_footer(); ?>