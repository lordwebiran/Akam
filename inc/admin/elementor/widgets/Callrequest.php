<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Callrequest Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Callrequest_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'Callrequest-widget';
    }

    public function get_title() {
        return esc_html__('درخواست تماس', 'text-VCA');
    }

    public function get_icon() {
        return 'eVCA-phone';
    }

    public function get_categories() {
        return ['A-VCA-category'];
    }

    protected function _register_controls() {
        // Define your widget controls here
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        require_once VCA_INC . 'frant/views/Callrequest/Callrequest.php';
    }

}