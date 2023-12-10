<?php 
if ( ! defined( 'ABSPATH' ) ) {exit;}


class VCA_Menu extends Base_Menu{

    public function __construct(){
        $this->page_title = 'ارتباط با ما';
        $this->menu_title = 'ارتباط با ما';
        $this->menu_slug = 'VC-akam';
        $this->icon = VCA_IMG_FRONT.'VC-akam.png';
        $this->position = 25;
        $this->has_sub_menu = true;
        $this->sub_items =[
            'Callrequest'=>[
                'page_title'=>'درخواست تماس',
                'menu_title'=>'درخواست تماس',
                'menu_slug' =>'VCA-Callrequest',
                'callback'  =>'VCA_Callrequest',
                'position'  => 1,
            ],
            'status'=>[
                'page_title'=>'لیست وضعیت',
                'menu_title'=>'لیست وضعیت',
                'menu_slug' =>'VCA-status',
                'callback'  =>'VCA_status',
                'position'  => 2,
            ],
            'Floatbutton'=>[
                'page_title'=>'دکمه شناور',
                'menu_title'=>'دکمه شناور',
                'menu_slug' =>'VCA-Floatbutton',
                'callback'  =>'VCA_Floatbutton',
                'position'  => 3,
            ],
            'contact_us'=>[
                'page_title'=>'تماس با ما',
                'menu_title'=>'تماس با ما',
                'menu_slug' =>'VCA-contact-us',
                'callback'  =>'VCA_contact_us',
                'position'  => 4,
            ],
            'settings'=>[
                'page_title'=>'تنظیمات',
                'menu_title'=>'تنظیمات',
                'menu_slug' =>'VCA-settings',
                'callback'  =>'',
                'position'  => 10,
            ]
        ];

        parent::__construct();
    }
    public function page(){
        echo '<h2>به زودی</h2><p>در ورژن دو ایجاد می شود در صورت درخواست کارفرما</p>';
    }
    public function VCA_Callrequest(){
        echo '<h2>به زودی</h2><p>در ورژن دو ایجاد می شود در صورت درخواست کارفرما</p>';
    }
    public function VCA_status(){
        $status= new VCA_admin_status_maneger();
        $status->page();
    }
    public function VCA_Floatbutton(){
        echo '<h2>به زودی</h2><p>در ورژن دو ایجاد می شود در صورت درخواست کارفرما</p>';
    }
    public function VCA_contact_us(){
        echo '<h2 class="VCA-Vazir">در دست ساخت</h2><p class="VCA-Vazir">در بروز رسانی ورژن 1.5.0 در دسترس قرار میگیرد</p>';
    }

} 