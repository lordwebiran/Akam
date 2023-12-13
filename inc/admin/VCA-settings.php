
<?php

if (class_exists('CSF')) {

  //
  // Set a unique slug-like ID
  $prefix = 'VCA-settings';

  //
  // Create options
  CSF::createOptions($prefix, array(
    'menu_title' => 'تنظیمات',
    'menu_slug'  => 'VCA-settings',
    'framework_title' => 'تنظیمات ارتباط با ما <span>ورژن ' . VCA_VER . ' </span>',
    'footer_text' => '',
    'menu_hidden' => true,
  ));

  //
  // Create a section
  CSF::createSection($prefix, array(
    'title'  => 'درخواست تماس',
    'fields' => array(

      array(
        'id'    => 'VCA-Callrequest-text-h3',
        'type'  => 'text',
        'title' => 'عنوان',
        'default' => 'فرم درخواست تماس'
      ),
      array(
        'id'    => 'VCA-Callrequest-text-p',
        'type'  => 'textarea',
        'title' => 'زیر توضیحات',
        'default' => 'خوشحال میشیم که ما با شما تماس بگیریم'
      ),
      array(
        'id'    => 'VCA-text-button',
        'type'  => 'text',
        'title' => 'متن دکمه',
        'default' => 'درخواست تماس'
      ),
      array(
        'id'    => 'VCA-status-Default',
        'type'        => 'select',
        'title' => 'وضعیت پیشفرض',
        'chosen'      => true,
        'placeholder' => 'انتخاب وضعیت پیشفرض',
        'options' => 'get_status_data',
        'default'     => '1'
      ),
      array(
        'id'          => 'VCA-Callrequest-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه درخواست تماس',
        'output'      => '.VCA-Callrequest',
        'output_mode' => 'background-color',
        'default' => '#d2691e',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-text-color-1',
        'type'        => 'color',
        'title'       => 'رنگ عنوان',
        'output'      => '.VCA-Callrequest .VCA-texth h3',
        'output_mode' => 'color',
        'default' => '#000',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-text-color-2',
        'type'        => 'color',
        'title'       => 'رنگ زیر عنوان',
        'output'      => '.VCA-Callrequest .VCA-texth p',
        'output_mode' => 'color',
        'default' => '#000',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-button-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه دکمه درخواست تماس',
        'output'      => '.VCA-Callrequest form.Callrequest button',
        'output_mode' => 'background-color',
        'default' => '#fff',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-button-color-text',
        'type'        => 'color',
        'title'       => 'رنگ متن دکمه درخواست تماس',
        'output'      => '.VCA-Callrequest form.Callrequest button',
        'output_mode' => 'color',
        'default' => '#000',
        'output_important' => true
      ),
      array(
        'type'    => 'callback',
        'function' => 'my_Callrequest',
      ),

    )
  ));
  CSF::createSection($prefix, array(
    'title'  => 'باکس آیتم درخواست تماس',
    'fields' => array(

      array(
        'id'         => 'VCA-item-status',
        'type'       => 'switcher',
        'title'      => 'فعال سازی ایتم باکس',
        'default'    => false
      ),
      array(
        'id'     => 'VCA-item-status-repeater',
        'type'   => 'repeater',
        'title'  => 'ایجاد ایتم باکس',
        'fields' => array(
          array(
            'id'    => 'VCA-item-status-Callreques',
            'type'        => 'select',
            'title' => 'انتخاب ایتم باکس',
            'chosen'      => true,
            'placeholder' => 'انتخاب کنید',
            'options' => 'get_status_data',
            'default'     => '1'
          ),
          array(
            'id'         => 'VCA-item-status-Callreques-text',
            'type'       => 'text',
            'title'      => 'پسونده شمارنده',
            'default' => 'عدد',
          ),
        ),
        'dependency' => array('VCA-item-status', '==', 'true'),
         'max'=> 6,
        'default'   => array(
          array(
            'VCA-item-status-Callreques' => '1',
            'VCA-item-status-Callreques-text' => 'عدد',
          ),
          array(
            'VCA-item-status-Callreques' => '2',
            'VCA-item-status-Callreques-text' => 'عدد',
          )
        )
      ),
    )
  ));
  function my_Callrequest()
  {
    echo "<h3>توضیحات</h3>";
    echo "<p>توضیحات در باره نحوه استفاده درخواست تماس</p>";
    echo "<h4>شورتکد</h4>";
    echo "<p>شورتکد ها یکی از قدیمی ترین روش ها برای فراخوانی استفاده میشوند. حال ما برای این افزونه و بخش درخواست تماس هم یک شورتکد اماده کرده ایم که دوستانی که با این روش راحت تر هستند استفاده نمایند.</p>";
    echo "<p>شورتکد : [Callrequest]</p>";
    echo "<h4>المنتور</h4>";
    echo "<p>برای دوستانی هم که خیلی دوست دارند از ابزار های بروز تر استفاده کنند مثل المنتور ویجت این بخش رو براتون آماده کردیم که میتونید ازش استفاده کنید</p>";
  }
  function get_status_data()
  {
    global $wpdb;
    $status_data = array();
    $table = $wpdb->prefix . 'VCA_status';
    $status = $wpdb->get_results("SELECT * FROM " . $table);

    if (count($status)) {
      foreach ($status as $status_item) {
        $status_data[$status_item->ID] = $status_item->name;
      }
    }

    return $status_data;
  }
  //
  // Create a section
  CSF::createSection($prefix, array(
    'title'  => 'دکمه شناور',
    'fields' => array(

      array(
        'id'         => 'VCA-Floatbutton-switcher',
        'type'       => 'switcher',
        'title'      => 'فعال سازی دکمه شناور',
        'default'    => false
      ),

      // A text field with dependency conditions
      array(
        'id'         => 'VCA-Floatbutton-text',
        'type'       => 'text',
        'title'      => 'تیتر دکمه شناور',
        'default' => 'چگونه می خواهید با ما در تماس باشید؟',
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'         => 'VCA-Floatbutton-btn-text',
        'type'       => 'text',
        'title'      => 'متن روی دکمه شناور',
        'default' => 'ارتباط با ما',
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'           => 'VCA-Floatbutton-btn-Image',
        'type'         => 'upload',
        'title'        => 'عکس روی دکمه شناور',
        'library'      => 'image',
        'placeholder'  => VCA_IMG_FRONT . 'phone-arrow-down-left-512.png',
        'button_title' => 'افزودن عکس',
        'remove_title' => 'حذف کردن عکس',
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
    )
  ));
  CSF::createSection($prefix, array(
    'title'  => 'بکاپ',
    'fields' => array(

      array(
        'type' => 'backup',
      ),

    )
  ));
}
