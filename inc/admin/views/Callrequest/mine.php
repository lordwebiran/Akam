<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 bhoechie-tab-container">
        <!-- start tab list -->
        <div class="col-lg-2 col-md-2 col-sm-2 col-2 bhoechie-tab-menu">
            <div class="list-group">
                <?php if (count($statuses)) : ?>
                    <?php foreach ($statuses as $current_status) : ?>
                        <?php if ($current_status->ID == 1) : ?>
                            <a href="#" class="list-group-item active text-center">
                                <h4 style="color:<?php echo esc_attr($status->icon_color) ?> !important" class="<?php echo esc_html($current_status->icon) ?>"></h4><br /><?php echo esc_html($current_status->name) ?>
                            </a>
                        <?php else : ?>
                            <a href="#" class="list-group-item text-center">
                                <h4 style="color:<?php echo esc_attr($status->icon_color) ?> !important" class="<?php echo esc_html($current_status->icon) ?>"></h4><br /><?php echo esc_html($current_status->name) ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- end tab list -->
        <!-- start tab content -->
        <div class="col-lg-10 col-md-10 col-sm-10 col-12 bhoechie-tab">
            <?php foreach ($statuses as $current_status) : ?>
                <div class="bhoechie-tab-content <?php echo ($current_status->ID == 1) ? 'active' : ''; ?>">
                    <ul class="accordion">
                        <?php if (count($Callrequest)) : ?>
                            <?php foreach ($Callrequest as $current_Callrequest) : ?>
                                <?php if ($current_Callrequest->ID_status == $current_status->ID) : ?>
                                    <li>
                                        <a><?php echo esc_html($current_Callrequest->NF) ?></a>
                                        <p>
                                            <?php echo esc_html($current_Callrequest->NF) ?>
                                            <br>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $current_Callrequest->ID; ?>">
                                                ویرایش
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $current_Callrequest->ID; ?>">
                                                حذف
                                            </button>

                                            <!-- مودال ویرایش -->
                                        <div class="modal fade" id="editModal<?php echo $current_Callrequest->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <!-- اطلاعات مربوط به ویرایش اینجا قرار می‌گیرد -->
                                        </div>

                                        <!-- مودال حذف -->
                                        <div class="modal fade" id="deleteModal<?php echo $current_Callrequest->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <span class="delete VCA-Vazir"><a href="<?php echo wp_nonce_url(admin_url('admin.php?page=VCA-Callrequest&action=delete&id=' . $current_Callrequest->ID), 'delete_Callrequest', 'delete_Callrequest_nonce') ?>">حذف</a></span>

                                        </div>
                                        </p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end tab content -->
    </div>
</div>