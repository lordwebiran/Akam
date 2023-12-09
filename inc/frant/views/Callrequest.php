<section class="VCA-Callrequest">
  <div class="VCA-texth">
    <h3 class="VCA-Vazir">فرم درخواست تماس</h3>
    <p class="VCA-Vazir">خوشحال میشیم که ما با شما تماس بگیریم</p>
  </div>
  <form method="post" class="Callrequest">
    <input
      type="text"
      name="Name_and_surname"
      id="Name_and_surname"
      placeholder="نام و نام خانوادگی"
      class="VCA-Vazir"
      required
      pattern="[آ-ی ]+"
    />
    <input
      type="tel"
      id="phone"
      name="phone"
      placeholder="09000000000"
      pattern="[0-9]{11}"
      class="VCA-Vazir"
      required
    />
    <button type="submit" class="VCA-Vazir">درخواست تماس</button>
  </form>
  <div class="libel-alert VCA-Vazir"></div>
</section>
