<div class="wrap vc-orders-admin">
    <h1 class="wp-heading-inline">ویرایش وضعیت</h1>
    <hr class="wp-header-end" />
    <?php VCA_Flash_Message::show_message(); ?>

    <hr class="wp-header-end">
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <form id="vc-add-order" method="post">
                        <?php wp_nonce_field('edit_status', 'edit_status_nonce'); ?>
                        <input type="hidden" name="order_id" value="<?php echo esc_attr($status->ID)  ?>">
                        <div class="form-field">
                            <label for="status-name" class="VCA-font">نام وضعیت</label>
                            <input type="text" name="name" id="status-name" class="VCA-font" placeholder="نام وضعیت" required pattern="[آ-ی ]+" value="<?php echo esc_attr($status->name)  ?>">
                        </div>
                        <div class="form-field">
                            <label for="status-icon" class="VCA-font">آیکون</label>
                            <input type="text" name="icon" id="status-icon" class="VCA-font" placeholder="ip-ar-message-exclamation" value="<?php echo esc_attr($status->icon)  ?>">
                        </div>
                        <div class="form-field">
                            <label for="status-icon-color" class="VCA-font">رنگ آیکون</label>
                            <input type="color" name="status-icon-color" id="status-icon-color" value="<?php echo esc_attr($status->icon_color)  ?>">
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary" value="ویرایش">
                        </p>
                    </form>
                    <div class="VCA-font">
                        <h4 class="VCA-font">راهنمای استفاده از فونت</h4>
                        <p>برای انتخاب فونت میتوانید از دو سایت مرجع زیر استفاده نمایید</p>
                        <a href="https://iconplanet.app/uicons/pack/awesome-solid--443" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | ویژه ساده</a><span style="font-size: 8px;"> ۳,۱۲۴ فونت آیکن</span><br>
                        <a href="https://iconplanet.app/uicons/pack/awesome-regular--442" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | ویژه متوسط</a><span style="font-size: 8px;"> ۳,۱۲۴ فونت آیکن</span><br>
                        <a href="https://iconplanet.app/uicons/pack/brands--412" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | برندها</a><span style="font-size: 8px;"> ۴۶۴ فونت آیکن</span><br>
                        <a href="https://fontawesome.com/search" target="_blank" rel="noopener noreferrer">fontawesome</a><span style="font-size: 8px;"> نسخه کامل 6.5.1 پرو افزوده شده به افزونه</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="col-right">
            <div class="col-wrap">
                <div style="position: absolute; left: 30px;">
                    <div style="background-color: lightgray; /* width: 200px; */ border-radius: 20px; text-align: center; justify-content: center; display: inline-flex;">
                        <?php echo '<p class="VCA-font" style=" margin: auto 0px; padding-right: 6px;">' . esc_attr($status->name) . '</p><span style="position: relative; right: 5px; top: -10px; background-color: ghostwhite; padding: 5px; border-radius: 50%; width: 20px; height: 20px; text-align: center; justify-content: center;"><i style="color:' . esc_attr($status->icon_color) . ';" class="' . esc_attr($status->icon) . '"></i></span>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>