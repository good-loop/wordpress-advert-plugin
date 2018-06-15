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
        //Is going to be an issue where multiple ad widgets need to be name-spaced effectively
        $defaults = array('dataFormatOption' => '', 'dataMobileFormat' => '');
        $instance = wp_parse_args((array) $instance, $defaults);

        $goodLoopGuts = '
            <div class="goodloopad"
                        data-format="%1$s"
                        data-mobile-format="%2$s">
            </div>
            <script src="//as.good-loop.com/unit.js" async></script>';

        echo $before_widget;
        //Force unit to use a particular variant if set by user in settings page
        echo sprintf($goodLoopGuts, $instance['dataFormatOption'], $instance['dataMobileFormat']);

        echo $after_widget;
    }

    //Believe that this is what the user sees in the settings page
    //Have link to (their?) publisher portal. Explain that they can control charities/collect their earnings from there
    //Allow them to set variant here
    public function form($instance) {
        // echo '<div>
        //         <p>See your <a href="/wp-admin/options-general.php?page=good-loop-adwidget.php">Good-loop settings tab</a> to adjust the adunit displayed</p>
        //       </div>';
        $defaults = array('dataFormatOption' => '', 'dataMobileFormat' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        //Does nothing if the options already exists
        // $options = get_option('dataFormatOption');
        
        ?>
            <div>
                <p>Adunit variant</p>
                <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="" <?php checked($instance['dataFormatOption'], ''); ?>
                id="<?php echo $this->get_field_id('dataFormatOption');?>">
                    <label>default</label>
                </input>

                <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="medium-rectangle" <?php checked($instance['dataFormatOption'], 'medium-rectangle'); ?>
                id="<?php echo $this->get_field_id('dataFormatOption');?>">
                    <label>medium-rectangle</label>
                </input>

                <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="leaderboard" <?php checked($instance['dataFormatOption'], 'leaderboard'); ?>
                id="<?php echo $this->get_field_id('dataFormatOption');?>">
                    <label>leaderboard</label>
                </input>

                <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="sticky-footer" <?php checked($instance['dataFormatOption'], 'sticky-footer'); ?>
                id="<?php echo $this->get_field_id('dataFormatOption');?>">
                    <label>sticky-footer</label>
                </input>

                <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="vertical-banner" <?php checked($instance['dataFormatOption'], 'vertical-banner'); ?>
                id="<?php echo $this->get_field_id('dataFormatOption');?>">
                    <label>vertical-banner</label>
                </input>
            </div>
            <div>
                <p>Adunit mobile variant</p>
            </div>
        <?php
    }

    //This should hopefully update the instance values correctly
    //Looking at example code, appears that first registering 
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['dataFormatOption'] = $new_instance['dataFormatOption'];
        $instance['dataMobileFormat'] = $new_instance['dataMobileFormat'];

        return $instance;
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

// function good_loop_admin_init() {
//     register_setting('good_loop', 'dataFormatOption');
//     register_setting('good_loop', 'dataMobileFormat');

//     add_option('dataFormatOption', 'default');
// }

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

add_action('widgets_init', 'good_loop_register_widgets');
add_action('admin_menu', 'good_loop_register_admin');
// add_action('admin_init', 'good_loop_admin_init');
?>