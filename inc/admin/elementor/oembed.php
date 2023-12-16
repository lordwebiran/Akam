<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register VCA Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
class elementor_VCA_widget
{
    public function __construct()
    {
        add_action( 'elementor/elements/categories_registered',array( __CLASS__, 'add_elementor_widget_categories' ));
        add_action( 'elementor/widgets/register', array( __CLASS__, 'register_VCA_widget' ) );
    }

    public static function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'A-VCA-category',
            [
                'title' => esc_html__( 'ارتباط باما آکام', 'text-VCA' ),
                'icon' => 'eVCA-folder',
                'position'=> 1,
            ]
        );
    
    }
    

    public static function register_VCA_widget( $widgets_manager ) {
        $widgets_manager->register( new \Elementor_Callrequest_Widget() );
    }
}


