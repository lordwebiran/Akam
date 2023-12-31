<?php

if (class_exists('CSF')) {

  $prefix = 'VCA-settings';

  CSF::createOptions($prefix, array(
    'menu_title' => 'تنظیمات',
    'menu_slug'  => 'VCA-settings',
    'framework_title' => 'تنظیمات ارتباط با ما <span>ورژن ' . VCA_VER . ' </span>',
    'footer_text' => '',
    'menu_hidden' => true,
  ));
  CSF::createSection($prefix, array(
    'title'  => 'تنظیمات عمومی',
    'fields' => array(
      array(
        'id'        => 'VCA-font',
        'type'      => 'image_select',
        'title'     => 'انتخاب فونت',
        'options'   => array(
          'Vazir' => VCA_ASSETS.'img/VCA-font/Vazir.png',
          'Estedad' => VCA_ASSETS.'img/VCA-font/Estedad.png',
          'Mikhak' => VCA_ASSETS.'img/VCA-font/Mikhak.png',
        ),
        'default'   => 'Vazir'
      ),
      array(
        'id'        => 'VCA-font-Vazir',
        'type'      => 'image_select',
        'title'     => 'فونت وزیر',
        'options'   => array(
          'Vazir-en' => VCA_ASSETS.'img/VCA-font/Vazir_en.png',
          'Vazir-fa' => VCA_ASSETS.'img/VCA-font/Vazir_fa.png',
        ),
        'default'   => 'Vazir-fa',
        'dependency' => array('VCA-font', '==', 'Vazir')
      ),
      array(
        'id'        => 'VCA-font-Mikhak',
        'type'      => 'image_select',
        'title'     => 'فونت میخک',
        'options'   => array(
          'Mikhak-en' => VCA_ASSETS.'img/VCA-font/Mikhak-en.png',
          'Mikhak-fa' => VCA_ASSETS.'img/VCA-font/Mikhak-fa.png',
        ),
        'default'   => 'Mikhak-fa',
        'dependency' => array('VCA-font', '==', 'Mikhak')
      ),
      array(
        'id'    => 'fontawesome',
        'type'  => 'switcher',
        'title' => 'فونت fontawesome',
        'default'    => false
      ),
      array(
        'id'    => 'VCA_ip',
        'type'  => 'switcher',
        'title' => 'سیاره ایکون',
        'default'    => true
      ),
    )
  ));
  CSF::createSection($prefix, array(
    'title'  => 'درخواست تماس',
    'fields' => array(

      array(
        'id'    => 'VCA-Callrequest-text-h3',
        'type'  => 'text',
        'title' => 'عنوان',
        'default' => 'از بخش تنظیمات افزونه قابل تغییر می باشد'
      ),
      array(
        'id'    => 'VCA-Callrequest-text-p',
        'type'  => 'textarea',
        'title' => 'زیر توضیحات',
        'default' => 'در بخش تنظیمات امکان تغییر رنگ و تنظیم متن  و تغییر گردی گوشه ها را دارید تا با قالب خود همگام سازی نمایید.'
      ),
      array(
        'id'    => 'VCA-text-button',
        'type'  => 'text',
        'title' => 'متن دکمه',
        'default' => 'ثبت تماس'
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
        'id'      => 'opt-slider-3',
        'type'    => 'slider',
        'title'   => 'گردی گوشه های درخواست تماس',
        'min'     => 0,
        'max'     => 45,
        'step'    => 1,
        'unit'    => 'px',
        'output' => '.VCA-Callrequest',
        'output_mode' => 'border-radius',
        'default' => 7,
        'output_important' => true,

      ),
      array(
        'id'          => 'VCA-Callrequest-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه درخواست تماس',
        'output'      => '.VCA-Callrequest',
        'output_mode' => 'background-color',
        'default' => '#18bab7',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-text-color-1',
        'type'        => 'color',
        'title'       => 'رنگ عنوان',
        'output'      => '.VCA-Callrequest .VCA-texth h3',
        'output_mode' => 'color',
        'default' => '#ffffff',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-text-color-2',
        'type'        => 'color',
        'title'       => 'رنگ زیر عنوان',
        'output'      => '.VCA-Callrequest .VCA-texth p',
        'output_mode' => 'color',
        'default' => '#ffffff',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-button-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه دکمه درخواست تماس',
        'output'      => '.VCA-Callrequest form.Callrequest button',
        'output_mode' => 'background-color',
        'default' => '#ffffff',
        'output_important' => true
      ),
      array(
        'id'          => 'VCA-Callrequest-button-color-text',
        'type'        => 'color',
        'title'       => 'رنگ متن دکمه درخواست تماس',
        'output'      => '.VCA-Callrequest form.Callrequest button',
        'output_mode' => 'color',
        'default' => '#18bab7',
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
        'default'    => true
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
        'max' => 6,
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
  CSF::createSection($prefix, array(
    'title'  => 'متن ارور و تایید',
    'fields' => array(
      array(
        'id'         => 'VCA-errors-Name-and-surname-text',
        'type'       => 'text',
        'title'      => 'متن درصورت خالی بودن فیلد نام و نام خانوادگی',
        'default' => 'لطفا نام و نام خانوادگی خود را وارد نمایید',
      ),
      array(
        'id'         => 'VCA-errors-phone-text',
        'type'       => 'text',
        'title'      => 'متن درصورت خالی بودن فیلد شماره تماس',
        'default' => 'لطفا شماره تماس خود را برای تماس وارد نمایید',
      ),
      array(
        'id'         => 'VCA-alert-text',
        'type'       => 'text',
        'title'      => 'متن ارسال درست درخواست',
        'default' => 'با تشکر از شما ما به شما به زودی تماس میگیریم',
      ),
      array(
        'id'          => 'VCA-alert-tex-color',
        'type'        => 'color',
        'title'       => 'رنگ متن ارسال درست',
        'output'      => '.VCA-Callrequest .libel-alert',
        'output_mode' => 'color',
        'default' => '#006400',
        'output_important' => true
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
        'id'         => 'VCA-Floatbutton-btn-set',
        'type'       => 'button_set',
        'title'      => 'موقیت دکمه شناور',
        'options'    => array(
          'right'  => 'راست',
          'left' => 'چپ',
        ),
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'    => 'opt-spacing-right',
        'type'  => 'spacing',
        'title' => 'right',
        'left'  => false,
        'top' => false,
        'output' => '.VCA-Floatbutton-right',
        'units' => array('px'),
        'default'     => array(
          'right'     => '20',
          'bottom'    => '20',
        ),
        'dependency' => array('VCA-Floatbutton-btn-set', '==', 'right')
      ),
      array(
        'id'    => 'opt-spacing-left',
        'type'  => 'spacing',
        'title' => 'left',
        'right' => false,
        'top' => false,
        'output' => '.VCA-Floatbutton-left',
        'units' => array('px'),
        'default'     => array(
          'bottom'    => '20',
          'left'      => '20',
        ),
        'dependency' => array('VCA-Floatbutton-btn-set', '==', 'left')
      ),
      array(
        'id'           => 'VCA-Floatbutton-btn-Image',
        'type'         => 'upload',
        'title'        => 'عکس روی دکمه شناور',
        'library'      => 'image',
        'placeholder'  => VCA_IMG_FRONT . 'phone-arrow-down-left-512.png',
        'default' => VCA_IMG_FRONT . 'phone-arrow-down-left-512.png',
        'button_title' => 'افزودن عکس',
        'remove_title' => 'حذف کردن عکس',
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-text-color-2',
        'type'        => 'color',
        'title'       => 'رنگ متن دکمه شناور',
        'output'      => '.VCA-Button',
        'output_mode' => 'color',
        'default' => '#000',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-button-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه دکمه شناور',
        'output'      => '.VCA-Button',
        'output_mode' => 'background-color',
        'default' => '#faebd7',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-titel-text-color',
        'type'        => 'color',
        'title'       => 'رنگ متن هدر ',
        'output'      => '.VCA-titel',
        'output_mode' => 'color',
        'default' => '#fff',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-titel-background-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه هدر',
        'output'      => '.VCA-titel',
        'output_mode' => 'background-color',
        'default' => '#a52a2a',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-border-right-color',
        'type'        => 'color',
        'title'       => 'رنگ خط سمت راست',
        'output'      => '.VCA-body',
        'output_mode' => 'border-right-color',
        'default' => '#a52a2a',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-border-left-color',
        'type'        => 'color',
        'title'       => 'رنگ خط سمت چپ',
        'output'      => '.VCA-body',
        'output_mode' => 'border-left-color',
        'default' => '#a52a2a',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-body-background-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه ایتم ها',
        'output'      => '.VCA-body',
        'output_mode' => 'background-color',
        'default' => '#fff',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-border-item-color',
        'type'        => 'color',
        'title'       => 'رنگ خط دور ایتم',
        'output'      => '.VCA-item',
        'output_mode' => 'border-bottom-color',
        'default' => '#a52a2a',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-a-item-color',
        'type'        => 'color',
        'title'       => 'رنگ متن آیتم',
        'output'      => '.VCA-body a',
        'output_mode' => 'color',
        'default' => '#000',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-img-background-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه آیکون ها',
        'output'      => '.VCA-item img',
        'output_mode' => 'background-color',
        'default' => '#faebd7',
        'output_important' => true,
        'dependency' => array('VCA-Floatbutton-switcher', '==', 'true')
      ),
      array(
        'id'          => 'VCA-Floatbutton-footer-background-color',
        'type'        => 'color',
        'title'       => 'رنگ پس زمینه فوتر',
        'output'      => '.VCA-footer',
        'output_mode' => 'background-color',
        'default' => '#a52a2a',
        'output_important' => true,
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
