<section class="VCA-Floatbutton">
  <?php $options = get_option('VCA-settings'); ?>
  <div class="VCA-floating displaynone">
    <div class="VCA-titel">
      <p class="VCA-Vazir"><?php echo esc_html($options['VCA-Floatbutton-text']); ?></p>
    </div>
    <div class="VCA-body">
      <a href="#3">
        <div class="VCA-item">
          <img src="../../../assets/img/instagram-512.png" />
          <p class="VCA-Vazir">اینستاگرام</p>
        </div>
      </a>
      <a href="#2">
        <div class="VCA-item">
          <img src="../../../assets/img/skype-512.png" />
          <p class="VCA-Vazir">اسکایپ</p>
        </div>
      </a>
      <a href="#1">
        <div class="VCA-item">
          <img src="../../../assets/img/skype-512.png" />
          <p class="VCA-Vazir">درخواست تماس</p>
        </div>
      </a>
    </div>
    <div class="VCA-footer"></div>
  </div>
  <div class="VCA-Button" id="VCA-Button">
    <img class="btn_item" src="../../../assets/img/skype-512.png" />
    <p class="VCA-Vazir btn_item"><?php echo esc_html($options['VCA-Floatbutton-btn-text']); ?></p>
    <img class="h_btn_item" style="display: none" src="<?php echo esc_url(VCA_IMG_FRONT) ?>plus large-512.png" />
  </div>
</section>