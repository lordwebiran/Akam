
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
    'title'  => 'تماس با ما',
    'fields' => array(

      array(
        'type'    => 'callback',
        'function' => 'contact_us',
      ),

    )
  ));
  function contact_us()
  {
    echo "<h3>در دست ساخت</h3>";
    echo "<p>در بروز رسانی ورژن 1.5.0 در دسترس قرار میگیرد</p>";
  }
  CSF::createSection($prefix, array(
    'title'  => 'بکاپ',
    'fields' => array(

      array(
        'type' => 'backup',
      ),

    )
  ));
}
