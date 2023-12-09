document.addEventListener("DOMContentLoaded", function () {
    var VCAButton = document.querySelector(".VCA-Button");
    var btnItems = document.querySelectorAll(".btn_item");
    var VCAFloating = document.querySelector(".VCA-floating");
    var hbtnitem = document.querySelector(".h_btn_item");

    VCAButton.addEventListener("click", function () {
        // چک کردن اگر .VCA-floating مخفی باشد
        if (VCAFloating.classList.contains("displaynone")) {
            // نمایش .VCA-floating
            VCAFloating.classList.remove("displaynone");

            // مخفی کردن ایتم‌های با کلاس btn_item
            btnItems.forEach(function (btnItem) {
                btnItem.style.display = "none";
                hbtnitem.style.transform = "rotate(45deg)";
                hbtnitem.style.display = "block";
            });
        } else {
            // در صورت کلیک دوباره، بازگرداندن به وضعیت اولیه
            VCAFloating.classList.add("displaynone");

            // نمایش مجدد ایتم‌های با کلاس btn_item
            btnItems.forEach(function (btnItem) {
                btnItem.style.display = "block"; // یا مقدار دلخواه شما
                hbtnitem.style.display = "none";
            });
        }
    });

    var VCAItems = document.querySelectorAll(".VCA-item");
    VCAItems.forEach(function (VCAItem) {
        VCAItem.addEventListener("click", function () {
            // چک کردن اگر .VCA-floating مخفی باشد
            if (VCAFloating.classList.contains("displaynone")) {
                // نمایش .VCA-floating
                VCAFloating.classList.remove("displaynone");

                // مخفی کردن ایتم‌های با کلاس btn_item
                btnItems.forEach(function (btnItem) {
                    btnItem.style.display = "none";
                    hbtnitem.style.display = "block";
                });
            } else {
                // در صورت کلیک دوباره، بازگرداندن به وضعیت اولیه
                VCAFloating.classList.add("displaynone");

                // نمایش مجدد ایتم‌های با کلاس btn_item
                btnItems.forEach(function (btnItem) {
                    btnItem.style.display = "block"; // یا مقدار دلخواه شما
                    hbtnitem.style.display = "none";
                });
            }
        });
    });
});

jQuery(document).ready(function () {
    jQuery(".Callrequest").submit(function (e) {
        e.preventDefault();

        var formData = {
            Name_and_surname: jQuery("#Name_and_surname").val(),
            phone: jQuery("#phone").val(),
        };

        jQuery.ajax({
            type: "POST",
            url: "آدرس_سرور/فایل_پردازشی.php",
            data: formData,
            dataType: "json",
            encode: true,
        })
            .done(function (response) {
                // با موفقیت انجام شد
                console.log(response);

                // اگر پاسخ مورد نظر شما یک شرط مشخص داشته باشد
                if (response.success) {
                    // نمایش الرت مورد نظر
                    jQuery(".label-alert").text("اطلاعات با موفقیت ثبت شد.").show();
                } else {
                    // اگر پاسخ موفقیت‌آمیز نبوده باشد، می‌توانید یک پیام دیگر نمایش دهید
                    jQuery(".label-alert").text("خطا در ثبت اطلاعات.").show();
                }
            })
            .fail(function (error) {
                // در هنگام خطا
                console.error(error);
                // نمایش پیام خطا
                jQuery(".label-alert").text("خطا در برقراری ارتباط با سرور.").show();
            });
    });
});