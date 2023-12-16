<div class="vca-status wrap nosubsub">

    <h1 class="wp-heading-inline VCA-font">وضعیت های درخواست تماس</h1>

    <hr class="wp-header-end">
    <?php VCA_Flash_Message::show_message(); ?>
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <h2 class="VCA-font">وضعیت جدید</h2>

                    <form id="vca-add-status" method="post">
                        <?php wp_nonce_field('add_status', 'add_status_nonce', false); ?>
                        <div class="form-field">
                            <label for="status-name" class="VCA-font">نام وضعیت</label>
                            <input type="text" name="name" id="status-name" class="VCA-font" placeholder="نام وضعیت" required pattern="[آ-ی ]+" value="">
                        </div>
                        <div class="form-field">
                            <label for="status-icon" class="VCA-font">آیکون</label>
                            <input type="text" name="icon" id="status-icon" class="VCA-font" placeholder="ip-ar-message-exclamation" value="">
                        </div>
                        <div class="form-field">
                            <label for="status-icon-color" class="VCA-font">رنگ آیکون</label>
                            <input type="color" name="status-icon-color" id="status-icon-color" value="">
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary VCA-font VCA-submit" value="افزودن">
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
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th scope="col" class="manage-column VCA-font">ایدی</th>
                            <th scope="col" class="manage-column VCA-font">عنوان</th>
                            <th scope="col" class="manage-column VCA-font">آیکون</th>
                        </tr>
                    </thead>
                    <tbody id="the-list">

                        <?php if (count($status)) : ?>
                            <?php foreach ($status as $status) : ?>
                                <tr style="font-size: 18px;">
                                    <td>
                                        <strong class="VCA-font"><?php echo esc_html($status->ID) ?></strong>
                                        <br>
                                        <div class="row-actions">
                                            <span class="edit VCA-font"><a href="<?php echo esc_url(admin_url('admin.php?page=VCA-status&action=edit&id=' . $status->ID)) ?>">ویرایش</a> | </span>
                                            <span class="delete VCA-font"><a href="<?php echo wp_nonce_url(admin_url('admin.php?page=VCA-status&action=delete&id=' . $status->ID), 'delete_status', 'delete_status_nonce') ?>">حذف</a></span>
                                        </div>
                                    </td>
                                    <td class="VCA-font"><?php echo esc_html($status->name) ?></td>
                                    <td><i style="font-size: 24px; color:<?php echo esc_attr($status->icon_color) ?>" class="<?php echo esc_html($status->icon) ?>"></i></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" class="manage-column VCA-font">ایدی</th>
                            <th scope="col" class="manage-column VCA-font">عنوان</th>
                            <th scope="col" class="manage-column VCA-font">آیکون</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>