<section class="VCA-Floatbutton">
  <?php $options = get_option('VCA-settings'); ?>
  <div class="VCA-floating displaynone">
    <div class="VCA-titel">
      <p class="VCA-Vazir"><?php echo esc_html($options['VCA-Floatbutton-text']); ?></p>
    </div>
    <div class="VCA-body">

      <?php if (isset($Floatbutton) && is_array($Floatbutton) && count($Floatbutton) > 0) : ?>
        <?php foreach ($Floatbutton as $item) : ?>
          <a href="<?php echo esc_url($item->link) ?>" target="_blank">
            <div class="VCA-item">
              <i style="color:<?php echo esc_attr($item->icon_color) ?>" class="<?php echo esc_html($item->icon) ?>"></i>
              <p class="VCA-Vazir"><?php echo esc_html($item->name) ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <div class="VCA-footer"></div>
  </div>
  <div class="VCA-Button" id="VCA-Button">
    <img class="btn_item" src="<?php echo esc_url($options['VCA-Floatbutton-btn-Image']); ?>" />
    <p class="VCA-Vazir btn_item"><?php echo esc_html($options['VCA-Floatbutton-btn-text']); ?></p>
    <img class="h_btn_item" style="display: none" src="<?php echo esc_url(VCA_IMG_FRONT) ?>plus large-512.png" />
  </div>
</section>