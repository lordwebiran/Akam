<?php
defined("ABSPATH" || exit());

require_once VCA_INC . 'admin/VCA-settings.php';
if (is_admin()) {
    new VCA_Menu();
}
new VCA_admin_ajax();
new VCA_ferant_ajax();
new VCA_Assets();

function Callrequest()
{
    require_once VCA_INC . 'frant/views/Callrequest/Callrequest.php';
}
add_shortcode('Callrequest', 'Callrequest');

function Floatbutton()
{
    require_once VCA_INC . 'frant/views/Floatbutton/Floatbutton.php';
}
add_action('wp_footer', 'Floatbutton');