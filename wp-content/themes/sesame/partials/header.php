<?php
/**
 * Theme Header HTML
 * @author Realtyna Inc.
 */

global $sesame_options;
$sesame_header_type = ((isset($sesame_options['header_type']) and trim($sesame_options['header_type'])) ? $sesame_options['header_type'] : 1);

$email = (isset($sesame_options['email']) and trim($sesame_options['email'])) ? $sesame_options['email'] : '';
$email_visibility = (isset($sesame_options['email_visibility']) ? $sesame_options['email_visibility'] : 0);

$tel = (isset($sesame_options['tel']) and trim($sesame_options['tel'])) ? $sesame_options['tel'] : '';
$tel_visibility = (isset($sesame_options['tel_visibility']) ? $sesame_options['tel_visibility'] : 0);
?>
<header id="header" class="re-header re-header-type-<?php echo esc_attr($sesame_header_type); ?> <?php if($sesame_options['sticky_header']) echo "re-sticky-header"; if(!$sesame_options['sticky_header_mobile']) echo " re-no-sticky-mobile" ?>" role="banner">
    <?php if($sesame_header_type == "1"): ?>
        <div class="re-header-inner">
            <section id="branding" class="re-branding">
                <div class="re-container">
                    <div class="re-site-title">
                        <?php if($sesame_options['logo_type'] == "1"): ?>
                            <?php the_custom_logo(); ?>
                        <?php endif; ?>
                        <?php if($sesame_options['logo_type'] == "2"):
                            if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '<h1>'; ?>
                            <a class="re-site-title-site-name" href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name')); ?>"
                               rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                            <?php if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '</h1>'; ?>
                            <div class="re-site-description"><?php echo esc_html(get_bloginfo('description')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="re-header-right">
                        <?php if($tel_visibility): ?>
                            <div class="re-header-right-item re-header-contact-info re-header-separator">
                                <i class="re-icon-call"></i>
                                <div class="re-header-contact-info-text">
                                    <label><?php esc_html_e('Call Us' , 'sesame'); ?></label>
                                    <?php if(trim($tel)): ?>
                                        <a href="tel:<?php echo esc_attr(str_replace(array('-', ' '), '', $tel)); ?>"><?php echo $tel; ?></a>
                                    <?php elseif(current_user_can('edit_theme_options')): ?>
                                        <span><?php echo sprintf(__('Set in %s panel.', 'sesame'), '<a href="'.admin_url('/customize.php?autofocus[section]=section_header_options').'">'.__('Customize', 'sesame').'</a>'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($email_visibility): ?>
                            <div class="re-header-right-item re-header-contact-info re-header-separator">
                                <i class="re-icon-email"></i>
                                <div class="re-header-contact-info-text">
                                    <label><?php esc_html_e('Email Us' , 'sesame'); ?></label>
                                    <?php if(trim($email) and is_email($email)): ?>
                                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo $email; ?></a>
                                    <?php elseif(current_user_can('edit_theme_options')): ?>
                                        <span><?php echo sprintf(__('Set in %s panel.', 'sesame'), '<a href="'.admin_url('/customize.php?autofocus[section]=section_header_options').'">'.__('Customize', 'sesame').'</a>'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($sesame_options['social_media_visibility']): ?>
                            <div class="re-header-right-item re-header-socials re-header-separator">
                                <ul>
                                    <?php if($sesame_options['facebook_link']): ?>
                                        <li><a href="<?php echo esc_url($sesame_options['facebook_link']); ?>" class="re-icon-fb" target="_blank"></a></li>
                                    <?php endif; ?>
                                    <?php if($sesame_options['linkedin_link']): ?>
                                        <li><a href="<?php echo esc_url($sesame_options['linkedin_link']); ?>" class="re-icon-linkedin" target="_blank"></a></li>
                                    <?php endif; ?>
                                    <?php if($sesame_options['twitter_link']): ?>
                                        <li><a href="<?php echo esc_url($sesame_options['twitter_link']); ?>" class="re-icon-twitter" target="_blank"></a></li>
                                    <?php endif; ?>
                                    <?php if($sesame_options['instagram_link']): ?>
                                        <li><a href="<?php echo esc_url($sesame_options['instagram_link']); ?>" class="re-icon-instagram" target="_blank"></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="re-header-right-item re-widgets">
                            <?php dynamic_sidebar('Header'); ?>
                        </div>
                        <?php if($sesame_options['search_visibility']): ?>
                            <div class="re-header-right-item re-header-search">
                                <a href="#" class="re-icon-search" aria-label="<?php esc_attr_e('Search' , 'sesame'); ?>"></a>
                                <?php get_search_form(); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <a class="re-mobile-menu-handler" href="#" aria-label="<?php esc_attr_e('Menu' , 'sesame'); ?>">
                        <i class="re-icon-mobile-menu"></i>
                    </a>
                </div>
            </section>
            <nav id="nav" class="re-nav re-nav-type-1" role="navigation">
                <div class="re-container">
                    <a class="re-mobile-menu-close" href="#"><?php esc_html_e('Close' , 'sesame'); ?></a>
                    <?php wp_nav_menu(array('theme_location'=>'main-menu')); ?>
                    <div class="re-dashboard-menu">
                        <?php dynamic_sidebar('header-membership'); ?>

                        <?php if(isset($sesame_options['user_links_visibility']) and $sesame_options['user_links_visibility']): ?>
                            <div class="re-user-links">
                                <?php if(!is_user_logged_in()): ?>
                                    <a href="<?php echo esc_url(wp_login_url()); ?>" id="login_link">
                                        <?php esc_html_e('Sign In' , 'sesame'); ?>
                                    </a>
                                    <?php if(get_option('users_can_register')): ?>
                                        <a href="<?php echo esc_url(wp_registration_url()); ?>" id="register_link">
                                            <?php esc_html_e('Register' , 'sesame'); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo esc_url(wp_logout_url()); ?>" id="logout_link">
                                        <?php esc_html_e('Log Out' , 'sesame'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="re-sticky-height"></div>
    <?php endif; ?>
    <?php if($sesame_header_type == "2"): ?>
        <div class="re-header-inner">
            <a class="re-mobile-menu-handler" href="#" aria-label="<?php esc_attr_e('Menu' , 'sesame'); ?>">
                <i class="re-icon-mobile-menu"></i>
            </a>
            <nav id="nav" class="re-nav re-nav-type-1" role="navigation">
            <div class="re-container">
                <a class="re-mobile-menu-close" href="#"><?php esc_html_e('Close' , 'sesame'); ?></a>
                <?php wp_nav_menu(array('theme_location'=>'main-menu')); ?>
                <div class="re-dashboard-menu">
                    <?php dynamic_sidebar('header-membership'); ?>
                </div>
            </div>
            </nav>
            <section id="branding" class="re-branding">
            <div class="re-container">
                <div class="re-site-title">
                    <?php if($sesame_options['logo_type'] == "1"): ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>
                    <?php if($sesame_options['logo_type'] == "2"):
                        if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '<h1>'; ?>
                        <a class="re-site-title-site-name" href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name')); ?>"
                           rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                        <?php if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '</h1>'; ?>
                        <div class="re-site-description"><?php echo esc_html(get_bloginfo('description')); ?></div>
                    <?php endif; ?>
                </div>
                <div class="re-header-right">
                    <?php if($tel_visibility): ?>
                        <div class="re-header-right-item re-header-contact-info re-header-separator">
                            <i class="re-icon-call"></i>
                            <div class="re-header-contact-info-text">
                                <label><?php esc_html_e('Call Us' , 'sesame'); ?></label>
                                <?php if(trim($tel)): ?>
                                    <a href="tel:<?php echo esc_attr(str_replace(array('-', ' '), '', $tel)); ?>"><?php echo $tel; ?></a>
                                <?php elseif(current_user_can('edit_theme_options')): ?>
                                    <span><?php echo sprintf(__('Set in %s panel.', 'sesame'), '<a href="'.admin_url('/customize.php?autofocus[section]=section_header_options').'">'.__('Customize', 'sesame').'</a>'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($email_visibility): ?>
                        <div class="re-header-right-item re-header-contact-info re-header-separator">
                            <i class="re-icon-email"></i>
                            <div class="re-header-contact-info-text">
                                <label><?php esc_html_e('Email Us' , 'sesame'); ?></label>
                                <?php if(trim($email) and is_email($email)): ?>
                                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo $email; ?></a>
                                <?php elseif(current_user_can('edit_theme_options')): ?>
                                    <span><?php echo sprintf(__('Set in %s panel.', 'sesame'), '<a href="'.admin_url('/customize.php?autofocus[section]=section_header_options').'">'.__('Customize', 'sesame').'</a>'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($sesame_options['social_media_visibility']): ?>
                        <div class="re-header-right-item re-header-socials re-header-separator">
                            <ul>
                                <?php if($sesame_options['facebook_link']): ?>
                                    <li><a href="<?php echo esc_url($sesame_options['facebook_link']); ?>" class="re-icon-fb" target="_blank"></a></li>
                                <?php endif; ?>
                                <?php if($sesame_options['linkedin_link']): ?>
                                    <li><a href="<?php echo esc_url($sesame_options['linkedin_link']); ?>" class="re-icon-linkedin" target="_blank"></a></li>
                                <?php endif; ?>
                                <?php if($sesame_options['twitter_link']): ?>
                                    <li><a href="<?php echo esc_url($sesame_options['twitter_link']); ?>" class="re-icon-twitter" target="_blank"></a></li>
                                <?php endif; ?>
                                <?php if($sesame_options['instagram_link']): ?>
                                    <li><a href="<?php echo esc_url($sesame_options['instagram_link']); ?>" class="re-icon-instagram" target="_blank"></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($sesame_options['user_links_visibility']) and $sesame_options['user_links_visibility']): ?>
                        <div class="re-user-links">
                            <?php if(!is_user_logged_in()): ?>
                                <a href="<?php echo esc_url(wp_login_url()); ?>" id="login_link">
                                    <?php esc_html_e('Sign In' , 'sesame'); ?>
                                </a>
                                <?php if(get_option('users_can_register')): ?>
                                    <a href="<?php echo esc_url(wp_registration_url()); ?>" id="register_link">
                                        <?php esc_html_e('Register' , 'sesame'); ?>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url(wp_logout_url()); ?>" id="logout_link">
                                    <?php esc_html_e('Log Out' , 'sesame'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="re-header-right-item re-widgets">
                        <?php dynamic_sidebar('Header'); ?>
                    </div>
                    <?php if($sesame_options['search_visibility']): ?>
                        <div class="re-header-right-item re-header-search">
                            <a href="#" class="re-icon-search" aria-label="<?php esc_attr_e('Search' , 'sesame'); ?>"></a>
                            <?php get_search_form(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        </div>
        <div class="re-sticky-height"></div>
    <?php endif; ?>
    <?php if($sesame_header_type == "3"): ?>
        <div class="re-header-inner">
            <section id="branding" class="re-branding">
        <div class="re-container">
            <div class="re-site-title">
                <?php if($sesame_options['logo_type'] == "1"): ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
                <?php if($sesame_options['logo_type'] == "2"):
                    if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '<h1>'; ?>
                    <a class="re-site-title-site-name" href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name')); ?>"
                       rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                    <?php if(is_front_page() || is_home() || (is_front_page() && is_home())) echo '</h1>'; ?>
                    <div class="re-site-description"><?php echo esc_html(get_bloginfo('description')); ?></div>
                <?php endif; ?>
            </div>
            <a class="re-mobile-menu-handler" href="#" aria-label="<?php esc_attr_e('Menu' , 'sesame'); ?>">
                <i class="re-icon-mobile-menu"></i>
            </a>
            <div class="re-header-right">
                <nav id="nav" class="re-nav re-nav-type-1" role="navigation">
                    <a class="re-mobile-menu-close" href="#"><?php esc_html_e('Close' , 'sesame'); ?></a>
                    <?php wp_nav_menu(array('theme_location'=>'main-menu')); ?>
                </nav>
                <div class="re-header-right-item re-widgets">
                    <?php dynamic_sidebar('Header'); ?>
                </div>
                <div class="re-header-right_right">
                <div class="re-dashboard-menu">
                    <?php dynamic_sidebar('header-membership'); ?>

                    <?php if(isset($sesame_options['user_links_visibility']) and $sesame_options['user_links_visibility']): ?>
                        <div class="re-user-links">
                            <?php if(!is_user_logged_in()): ?>
                                <a href="<?php echo esc_url(wp_login_url()); ?>" id="login_link">
                                    <i class="re-icon-Sign-in"></i>
                                    <?php esc_html_e('Sign In' , 'sesame'); ?>
                                </a>
                                <?php if(get_option('users_can_register')): ?>
                                    <a href="<?php echo esc_url(wp_registration_url()); ?>" id="register_link">
                                        <i class="re-icon-Register"></i>
                                        <?php esc_html_e('Register' , 'sesame'); ?>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url(wp_logout_url()); ?>" id="logout_link">
                                    <i class="re-icon-logout"></i>
                                    <?php esc_html_e('Log Out' , 'sesame'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if($sesame_options['search_visibility']): ?>
                    <div class="re-header-right-item re-header-search">
                        <a href="#" class="re-icon-search" aria-label="<?php esc_attr_e('Search' , 'sesame'); ?>"></a>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
        </div>
        <div class="re-sticky-height"></div>
    <?php endif; ?>
</header>