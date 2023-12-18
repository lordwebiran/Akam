# Contact Us Plugin

## Description

Professional "Contact Us" plugin for WordPress.

## Plugin Information

- **Plugin Name:** ارتباط با ما (Contact Us)
- **Plugin URI:** [ViennaCompany Products](https://www.rtl-theme.com/author/viennacompany/products/)
- **Description:** Professional "Contact Us" plugin
- **Author:** شرکت پرتو گستر ویانا (Vienna Company)
- **Version:** 1.1.1
- **Author URI:** [ViennaCompany](https://viennaco.ir/)
- **Elementor tested up to:** 3.16.0
- **Elementor Pro tested up to:** 3.16.0

## Installation

1. Upload the entire plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Minimum PHP Version

This plugin requires a minimum PHP version of 7.4.

## Plugin Structure

- `inc/VCA-Assets.php`: Asset handling.
- `inc/VCA-DB.php`: Database functions.
- `inc/VCA-DBDL.php`: Database table creation on deactivation.
- `vendor/autoload.php`: Autoloading for vendor packages.
- `inc/admin`: Administrative functions.
- `inc/admin/views`: Views for the admin section.
- `inc/elementor`: Elementor-specific functionality.
- `assets`: Plugin assets.
- `assets/img`: Image assets.
- `assets/fontawesome`: FontAwesome assets.

## Activation and Deactivation

- Upon activation, the plugin creates necessary tables using `VCA_DB::create_table()`.
- Upon deactivation, the plugin creates additional tables using `VCA_DBDL::create_table()`.

## License

This plugin is released under [MIT License](LICENSE).

## Useful Links

- [Website](https://viennaco.ir/)
- [ViennaCo Radiant](https://viennaco.ir/)
- [Plugin Download Page](https://github.com/lordwebiran/Akam/releases)
