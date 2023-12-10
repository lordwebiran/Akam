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
    jQuery("#Callrequest").submit(function (e) {
        e.preventDefault();

        let $this = jQuery(this);
        let submit = $this.find('.VCA-submit');
        submit.prop('disabled', true);
        submit.html('درحال ارسال');

        formdata = new FormData();
        formdata.append('action', 'Callrequest');
        formdata.append('nonce', VC_DATA.nonce);
        formdata.append('Name_and_surname', jQuery("#Name_and_surname").val());
        formdata.append('phone', jQuery("#phone").val());
        formdata.append('status', jQuery("#ID_status").val());


        jQuery.ajax({
            type: "POST",
            url: VC_DATA.ajax_url,
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {

            },
            error: function (error) {
            },
            complete:function () {
                submit.prop('disabled', false);
                submit.html('درخواست تماس');
            },
        });
    });
});