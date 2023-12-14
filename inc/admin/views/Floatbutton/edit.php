<div class="vca-Floatbutton wrap nosubsub">

    <h1 class="wp-heading-inline VCA-Vazir">دکمه شناور</h1>

    <hr class="wp-header-end">
    <?php VCA_Flash_Message::show_message(); ?>
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <h2 class="VCA-Vazir">ویرایش</h2>

                    <form id="vca-add-Floatbutton" method="post">
                        <?php wp_nonce_field('edit_Floatbutton', 'edit_Floatbutton_nonce', false); ?>
                        <input type="hidden" name="Floatbutton_id" id="Floatbutton_id" value="<?php echo esc_attr($Floatbutton->ID)  ?>">
                        <div class="form-field">
                            <label for="Floatbutton-name" class="VCA-Vazir">نام </label>
                            <input type="text" name="Floatbutton-name" id="Floatbutton-name" class="VCA-Vazir" placeholder="نام" required pattern="[آ-ی ]+" value="<?php echo esc_html($Floatbutton->name) ?>">
                        </div>
                        <div class="form-field">
                            <label for="Floatbutton-icon" class="VCA-Vazir">آیکون</label>
                            <input type="text" name="Floatbutton-icon" id="Floatbutton-icon" class="VCA-Vazir" placeholder="ip-ar-message-exclamation" value="<?php echo esc_html($Floatbutton->icon) ?>">
                        </div>
                        <div class="form-field">
                            <label for="Floatbutton-icon-color" class="VCA-Vazir">رنگ آیکون</label>
                            <input type="color" name="Floatbutton-icon-color" id="Floatbutton-icon-color" value="<?php echo esc_attr($Floatbutton->icon_color) ?>">
                        </div>
                        <div class="form-field">
                            <label for="Floatbutton-link" class="VCA-Vazir">لینک</label>
                            <input type="text" name="Floatbutton-link" id="Floatbutton-link" class="VCA-Vazir" placeholder="https://link.com" value="<?php echo esc_url($Floatbutton->link) ?>">
                        </div>
                        <div class="form-field">
                            <label for="Floatbutton-position" class="VCA-Vazir">موقیت قرارگیری</label>
                            <input type="text" name="Floatbutton-position" id="Floatbutton-position" class="VCA-Vazir" placeholder="1" value="<?php echo esc_html($Floatbutton->position) ?>">
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary VCA-Vazir VCA-submit" value="افزودن">
                        </p>
                    </form>
                    <div class="VCA-Vazir">
                        <h4 class="VCA-Vazir">راهنمای استفاده از فونت</h4>
                        <p>برای انتخاب فونت میتوانید از دو سایت مرجع زیر استفاده نمایید</p>
                        <a href="https://iconplanet.app/uicons/pack/awesome-solid--443" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | ویژه ساده</a><span style="font-size: 8px;"> ۳,۱۲۴ فونت آیکن</span><br>
                        <a href="https://iconplanet.app/uicons/pack/awesome-regular--442" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | ویژه متوسط</a><span style="font-size: 8px;"> ۳,۱۲۴ فونت آیکن</span><br>
                        <a href="https://iconplanet.app/uicons/pack/brands--412" target="_blank" rel="noopener noreferrer">پکیج فونت آیکن | برندها</a><span style="font-size: 8px;"> ۴۶۴ فونت آیکن</span><br>
                        <a href="https://fontawesome.com/search" target="_blank" rel="noopener noreferrer">fontawesome</a><span style="font-size: 8px;"> نسخه کامل 6.5.1 پرو افزوده شده به افزونه</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>