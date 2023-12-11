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
                            <label for="status-name" class="VCA-Vazir">نام وضعیت</label>
                            <input type="text" name="name" id="status-name" class="VCA-Vazir" placeholder="نام وضعیت" required pattern="[آ-ی ]+" value="<?php echo esc_attr($status->name)  ?>">
                        </div>
                        <div class="form-field">
                            <label for="status-icon" class="VCA-Vazir">آیکون</label>
                            <input type="text" name="icon" id="status-icon" class="VCA-Vazir" placeholder="ip-ar-message-exclamation" value="<?php echo esc_attr($status->icon)  ?>">
                        </div>
                        <div class="form-field">
                            <label for="status-icon-color" class="VCA-Vazir">رنگ آیکون</label>
                            <input type="color" name="status-icon-color" id="status-icon-color" value="<?php echo esc_attr($status->icon_color)  ?>">
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary" value="ویرایش">
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div id="col-right">
            <div class="col-wrap">
                <div style="position: absolute; left: 30px;">
                    <div style="background-color: lightgray; /* width: 200px; */ border-radius: 20px; text-align: center; justify-content: center; display: inline-flex;">
                        <p class="VCA-Vazir" style=" margin: auto 0px; padding-right: 6px;"><?php echo esc_attr($status->name)  ?></p><span style="position: relative; right: 5px; top: -10px; background-color: ghostwhite; padding: 5px; border-radius: 50%; width: 20px; height: 20px; text-align: center; justify-content: center;"><i style="color:<?php echo esc_attr($status->icon_color)  ?>;" class="<?php echo esc_attr($status->icon)  ?>"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>