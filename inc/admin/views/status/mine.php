<div class="vca-status wrap nosubsub">

    <h1 class="wp-heading-inline VCA-Vazir">وضعیت های درخواست تماس</h1>

    <hr class="wp-header-end">
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <h2 class="VCA-Vazir">وضعیت جدید</h2>

                    <form id="vca-add-status" method="post">
                        <?php wp_nonce_field('add_status', 'add_status_nonce', false); ?>
                        <div class="form-field">
                            <label for="status-name" class="VCA-Vazir">نام وضعیت</label>
                            <input type="text" name="name" id="status-name" class="VCA-Vazir" placeholder="نام وضعیت"  required pattern="[آ-ی ]+">
                        </div>
                        <div class="form-field">
                            <label for="status-icon" class="VCA-Vazir">آیکون</label>
                            <input type="text" name="icon" id="status-icon" class="VCA-Vazir" placeholder="ip-ar-message-exclamation" >
                        </div>
                        <div class="form-field">
                            <label for="status-icon-color" class="VCA-Vazir">رنگ آیکون</label>
                            <input type="color" name="status-icon-color" id="status-icon-color">
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary VCA-Vazir VCA-submit" value="افزودن">
                        </p>
                    </form>
                    <div class="VCA-Vazir">
                        <h4 class="VCA-Vazir">راهنمای استفاده از فونت</h4>
                        <p>برای انتخاب فونت میتوانید از دو سایت مرجع زیر استفاده نمایید</p>
                        <a href="https://iconplanet.app/uicons/pack/awesome-regular--442" target="_blank" rel="noopener noreferrer">سیاره ایکون</a><br>
                        <a href="https://fontawesome.com/search" target="_blank" rel="noopener noreferrer">fontawesome</a><span style="font-size: 8px;"> نسخه کامل 6.5.1 پرو افزوده شده به افزونه</span> 
                    </div>
                    
                </div>
            </div>
        </div>
        <div id="col-right">
            <div class="col-wrap">
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th scope="col" class="manage-column VCA-Vazir">ایدی</th>
                            <th scope="col" class="manage-column VCA-Vazir">عنوان</th>
                            <th scope="col" class="manage-column VCA-Vazir">آیکون</th>
                        </tr>
                    </thead>
                    <tbody id="the-list">

                        <?php if (count($status)) : ?>
                            <?php foreach ($status as $status) : ?>
                                <tr style="font-size: 18px;">
                                    <td>
                                        <strong class="VCA-Vazir"><?php echo esc_html($status->ID) ?></strong>
                                        <br>
                                        <div class="row-actions">
                                            <span class="edit VCA-Vazir"><a href="<?php echo esc_url(admin_url('admin.php?page=vca-status&action=edit&id=' .$status->ID))?>">ویرایش</a> | </span>
                                            <span class="delete VCA-Vazir"><form id="vca-Delete-status" method="post" style="display: inline;"><input type="hidden" name="status-ID" class="status-ID" value="<?php echo esc_html($status->ID) ?>"><button type="submit" name="submit" class="vca-Delete-status-btn">حذف</button></form></span>
                                        </div>
                                    </td>
                                    <td class="VCA-Vazir"><?php echo esc_html($status->name) ?></td>
                                    <td><i style="font-size: 24px; color:<?php echo esc_attr($status->icon_color) ?>" class="<?php echo esc_html($status->icon) ?>"></i></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" class="manage-column VCA-Vazir">ایدی</th>
                            <th scope="col" class="manage-column VCA-Vazir">عنوان</th>
                            <th scope="col" class="manage-column VCA-Vazir">آیکون</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>