<div class="wrap vc-Callrequests-admin">
    <h1 class="wp-heading-inline">ویرایش : کد <?php echo esc_attr($Callrequest->ID)  ?></h1>
    <hr class="wp-header-end" />
    <?php VCA_Flash_Message::show_message(); ?>

    <hr class="wp-header-end">
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <form id="vc-add-Callrequest" method="post">
                        <?php wp_nonce_field('edit_Callrequest', 'edit_Callrequest_nonce'); ?>
                        <input type="hidden" name="Callrequest_id" value="<?php echo esc_attr($Callrequest->ID)  ?>">
                        <div class="form-field term-parent-wrap">
                            <label for="Callrequest_status_id">ویرایش وضعیت تماس</label>
                            <select name="Callrequest_status_id" id="Callrequest_status_id">
                                <?php foreach ($statuses as $item) : ?>
                                    <?php if ($Callrequest->ID_status == $item->ID) : ?>
                                        <option selected value="<?php echo esc_attr($item->ID); ?>"><?php echo esc_html($item->name); ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo esc_attr($item->ID); ?>"><?php echo esc_html($item->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary" value="ویرایش">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>