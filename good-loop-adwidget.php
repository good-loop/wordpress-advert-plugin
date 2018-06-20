<?php
/*
@package    good_loop_ad_widget

@wordpress-plugin
Plugin Name: Good-loop Ad Widget
Plugin URI: https://github.com/good-loop/wordpress-advert-plugin
Description: A more ethical approach to advertising: 50% of ad revenue is donated to charity.
Version: 0.1
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

    public function widget($args, $instance){
        extract($args);
        $defaults = array('dataFormatOption' => '', 'dataMobileFormat' => '');
        $instance = wp_parse_args((array) $instance, $defaults);

        $goodLoopGuts = '
            <div class="goodloopad"
                        data-format="%1$s"
                        data-mobile-format="%2$s">
            </div>
            <script src="//as.good-loop.com/unit.js" async></script>';

        echo $before_widget;
        //Force unit to use a particular variant if set by user in widget settings
        echo sprintf($goodLoopGuts, $instance['dataFormatOption'], $instance['dataMobileFormat']);

        echo $after_widget;
    }

    //Allow user to set variant here
    public function form($instance) {
        $defaults = array('dataFormatOption' => '', 'dataMobileFormat' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        
        ?>
            <div>
                <h1>Advanced settings</h1>
                <p> 
                    These controls allow you to set the size and shape of the adunit. An explanation of what each of these does can be found in the 
                    <a href='/wp-admin/options-general.php?page=good-loop-adwidget.php'>Good-loop settings page</a>. If you are unsure, or just don't mind,
                    the "Choose for me" option will select the best size for the space provided.
                </p>
            </div>
            <div>
                <h2>Adslot size</h2>
                <ul>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="" <?php checked($instance['dataFormatOption'], ''); ?>
                        id="<?php echo $this->get_field_id('dataFormatOption');?>">
                            <label>Choose for me</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="medium-rectangle" <?php checked($instance['dataFormatOption'], 'medium-rectangle'); ?>
                        id="<?php echo $this->get_field_id('dataFormatOption');?>">
                            <label>medium-rectangle</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="leaderboard" <?php checked($instance['dataFormatOption'], 'leaderboard'); ?>
                        id="<?php echo $this->get_field_id('dataFormatOption');?>">
                            <label>leaderboard</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="sticky-footer" <?php checked($instance['dataFormatOption'], 'sticky-footer'); ?>
                        id="<?php echo $this->get_field_id('dataFormatOption');?>">
                            <label>sticky-footer</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="vertical-banner" <?php checked($instance['dataFormatOption'], 'vertical-banner'); ?>
                        id="<?php echo $this->get_field_id('dataFormatOption');?>">
                            <label>vertical-banner</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataFormatOption');?>" value="billboard" <?php checked($instance['dataFormatOption'], 'billboard'); ?>
                            id="<?php echo $this->get_field_id('dataFormatOption');?>">
                                <label>billboard</label>
                        </input>
                    </li>
                </ul>
            </div>
            <div>
                <h2>Adslot mobile size</h2>
                <ul>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="" <?php checked($instance['dataMobileFormat'], ''); ?>
                        id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                            <label>Choose for me</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="medium-rectangle" <?php checked($instance['dataMobileFormat'], 'medium-rectangle'); ?>
                        id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                            <label>medium-rectangle</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="leaderboard" <?php checked($instance['dataMobileFormat'], 'leaderboard'); ?>
                        id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                            <label>leaderboard</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="sticky-footer" <?php checked($instance['dataMobileFormat'], 'sticky-footer'); ?>
                        id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                            <label>sticky-footer</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="vertical-banner" <?php checked($instance['dataMobileFormat'], 'vertical-banner'); ?>
                        id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                            <label>vertical-banner</label>
                        </input>
                    </li>
                    <li>
                        <input type="radio" name="<?php echo $this->get_field_name('dataMobileFormat');?>" value="billboard" <?php checked($instance['dataMobileFormat'], 'billboard'); ?>
                            id="<?php echo $this->get_field_id('dataMobileFormat');?>">
                                <label>billboard</label>
                        </input>
                    </li>
                </ul>
            </div>
        <?php
    }

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

add_action('widgets_init', 'good_loop_register_widgets');
add_action('admin_menu', 'good_loop_register_admin');
?>