<?php
/*
@package    good_loop_ad_widget

@wordpress-plugin
Plugin Name: Good-loop Ad Widget
Plugin URI: https://github.com/good-loop/wordpress-advert-plugin
Description: A more ethical approach to advertising: 50% of ad revenue is donated to charity. Go to https://portal.good-loop.com/#publisher/ to
             select your prefered charities and claim your earnings.
Version: 0.1.1
Author: Good-loop
Author URI: https://www.good-loop.com/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class GoodLoop_AdWidget extends WP_Widget {
    public function __construct() {
        parent::__construct('GoodLoop_AdWidget', 'Good-loop ad unit');
    }

    //Will later want to integrate ability to select unit type from admin options page
    public function widget($args, $instance){
        extract($args);
        
        echo $before_widget;

        echo "<div class='goodloopad'></div>
            <script src='//as.good-loop.com/unit.js' async></script>";

        echo $after_widget;
    }

    //Believe that this is what the user sees in the settings page
    //Have link to (their?) publisher portal. Explain that they can control charities/collect their earnings from there
    //Allow them to set variant here
    public function form($instance) {
        echo '<div>
                <h1>This is just a stub.</h1>
              </div>';
    }
    //Doesn't really serve any purpose while we don't have any settings to change
    public function update($new_instance, $old_instance) {
        return $old_instance;
    }

    static function adminMenu() {
        include dirname(__FILE__) . '/views/admin.php';
    }
}

function good_loop_register_widgets() {
    register_widget('GoodLoop_AdWidget');
}

function good_loop_register_admin() {
    add_options_page('Good-loop', 'Good-loop', 'edit_pages', 'good-loop-adwidget.php', array('GoodLoop_AdWidget', 'adminMenu'));
}

add_action('widgets_init', 'good_loop_register_widgets');
add_action('admin_menu', 'good_loop_register_admin');
?>