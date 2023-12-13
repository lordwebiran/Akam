<?php
if (!defined('ABSPATH')) {
    exit;
}
$options = get_option('VCA-settings'); ?>
<div class="VCA-Callrequest-heder">
    <h2>لیست درخواست تماس</h2>
</div>

<div class="VCA-Callrequest-heder-item-status">
    <?php if ($options['VCA-item-status']) {
        if (!$options['VCA-item-status-repeater'] == null) {
            foreach ($options['VCA-item-status-repeater'] as $item_status) {
                $statusitem = $this->status($item_status['VCA-item-status-Callreques']);
                $statusi = $this->Callreques_status($item_status['VCA-item-status-Callreques']); ?>
                <div class="VCA-item-status">
                    <i style=" color:<?php echo esc_attr($statusitem->icon_color); ?>;" class="<?php echo esc_attr($statusitem->icon); ?>"></i>
                    <p><?php echo esc_html($statusi); ?><span><?php echo esc_html($item_status['VCA-item-status-Callreques-text']); ?></span></p>
                    <h4><?php echo esc_html($statusitem->name); ?></h4>
                </div>
    <?php }
        }
    } ?>
</div>

<div class="VCA-Callrequest-table">
    <table>
        <thead>
            <tr>
                <th title="کد درخواست">کد</th>
                <th>نام و نام خانوادگی</th>
                <th>شماره تماس</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($Callrequest)) : $Callrequest_r = array_reverse($Callrequest); ?>
                <?php foreach ($Callrequest_r as $Callrequest_item) : ?>
                    <tr>
                        <td title="کد درخواست"><?php echo esc_html($Callrequest_item->ID) ?></td>
                        <td><?php echo esc_html($Callrequest_item->NF) ?></td>
                        <td><?php echo esc_html($Callrequest_item->phone) ?></td>
                        <?php $status = $this->status($Callrequest_item->ID_status); ?>
                        <td style=" color:<?php echo esc_attr($status->icon_color); ?>;"><?php echo esc_html($status->name); ?></td>
                        <td><a href="" title="ویرایش وضعیت"><i class="ip-ar-circle-s"></i></a> | <a href="" title="حذف"><i class="ip-ar-circle-trash"></i></a></td>
                    </tr> 
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td title="کد درخواست">کد</td>
                <td>نام و نام خانوادگی</td>
                <td>شماره تماس</td>
                <td>وضعیت</td>
                <td>عملیات</td>
            </tr>
        </tfoot>
    </table>
</div>