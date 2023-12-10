<section class="VCA-Callrequest">
  <?php $options = get_option('VCA-settings'); ?>
  <div class="VCA-texth">
    <h3 class="VCA-Vazir">
      <?php echo esc_html($options['VCA-Callrequest-text-h3']); ?>
    </h3>
    <p class="VCA-Vazir">
      <?php echo esc_html($options['VCA-Callrequest-text-p']); ?>
    </p>
  </div>
  <form method="post" class="Callrequest" id="Callrequest">
    <input type="text" name="Name_and_surname" id="Name_and_surname" placeholder="نام و نام خانوادگی" class="VCA-Vazir" required pattern="[آ-ی ]+" />
    <input type="tel" id="phone" name="phone" placeholder="09000000000" pattern="[0-9]{11}" class="VCA-Vazir" required />
    <input type="hidden" name="ID_status" id="ID_status" value="1">
    <button type="submit" class="VCA-Vazir VCA-submit">
      <?php echo esc_html($options['VCA-text-button']); ?>
    </button>
  </form>
  <div class="libel-alert VCA-Vazir"></div>
</section>