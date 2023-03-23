<?php
/**
 * Theme PHP Functions
 * @author Realtyna Inc.
 */

// Exit if accessed directly.
if(!defined('ABSPATH')) exit;

// Include Base Class
require get_template_directory().'/includes/base.php';

// Don't redeclare the class if it's overrode on child theme
if(!class_exists('sesame')):

/**
 * Please don't develop this class.
 * You should put your codes on sesame_base class which is located on /includes/base.php file.
 */
class sesame extends sesame_base
{
    public function __construct()
    {
        parent::__construct();
    }
}

endif;

// Don't create the object again if it's created on child theme
if(!isset($sesame))
{
    global $sesame;
    
    $sesame = new Sesame();
    $sesame->setup();
}