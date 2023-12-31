<?php

/*
Plugin Name: ارتباط‌‌ با ما
Plugin URI: https://www.rtl-theme.com/author/viennacompany/products/
Description: افزونه حرفه‌ای ارتباط‌‌‌ با ما
Author: شرکت پرتو گستر ویانا
Version: 1.1.1
Author URI: https://www.rtl-theme.com/author/viennacompany/
Elementor tested up to: 3.16.0
Elementor Pro tested up to: 3.16.0
*/

defined("ABSPATH" || exit());

require 'inc/VCA-Assets.php';
require 'inc/VCA-DB.php';
require 'inc/VCA-DBDL.php';

class VC_akam_Core
{
    private static $__instance = null;
    const MINIMUM_PHP_VERSION = "7.4";
    const Plugin_Name = "ارتباط با ما";

    public static function instance()
    {
        if (is_null(self::$__instance)) {
            self::$__instance = new self();
        }
        return self::$__instance;
    }

    public function __construct()
    {
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice']);
            return;
        }
        $this->constants();
        $this->init();
    }

    public function constants()
    {
        if (!function_exists('get_plugin_data')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        define("VCA_BASE_FILE", __FILE__);
        define("VCA_PATH", trailingslashit(plugin_dir_path(VCA_BASE_FILE)));
        define("VCA_URL", trailingslashit(plugin_dir_url(VCA_BASE_FILE)));
        define("VCA_ASSETS", trailingslashit(VCA_URL . 'assets'));
        define("VCA_INC", trailingslashit(VCA_PATH . 'inc'));
        define("VCA_admin", trailingslashit(VCA_INC . 'admin'));
        define("VCA_admin_views", trailingslashit(VCA_admin . 'views'));
        define("VCA_elementor", trailingslashit(VCA_admin . 'elementor'));
        define("VCA_IMG_FRONT", trailingslashit(VCA_ASSETS . 'img'));
        define("VCA_fontawesome", trailingslashit(VCA_ASSETS . 'fontawesome'));

        $VCA_plugin_data = get_plugin_data(VCA_BASE_FILE);
        define('VCA_VER', $VCA_plugin_data['Version']);
    }

    public function init()
    {
        require_once VCA_PATH . 'vendor/autoload.php';
        register_activation_hook(VCA_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(VCA_BASE_FILE, [$this, 'deative']);
        require_once VCA_INC . 'admin/codestar/codestar-framework.php';
        require_once VCA_INC . 'functions.php';
    }

    public function active()
    {
        VCA_DB::create_table();
    }

    public function deative()
    {
        VCA_DBDL::create_table();
    }

    public function admin_notice()
    { ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php echo esc_html('افزونه <b>' . self::Plugin_Name . '</b> برای اجرای صحیح نیاز به نسخه <b>' . self::MINIMUM_PHP_VERSION . ' PHP</b> به بالا دارد، لطفا نسخه PHP خود را ارتقا دهید'); ?></p>
        </div>
<?php }
}
VC_akam_Core::instance();
