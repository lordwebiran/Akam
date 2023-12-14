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

$options = get_option('VCA-settings');

if ($options['VCA-Floatbutton-switcher'] == true) {
    add_action('wp_footer', 'Floatbutton');
}
function Floatbutton()
{
    $floatbuttonManager = new VCA_Floatbutton_maneger_ferant();
    $floatbuttonManager->page();
}
