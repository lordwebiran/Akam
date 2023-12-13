document.addEventListener("DOMContentLoaded", function () {
    var VCAButton = document.querySelector(".VCA-Button");
    var btnItems = document.querySelectorAll(".btn_item");
    var VCAFloating = document.querySelector(".VCA-floating");
    var hbtnitem = document.querySelector(".h_btn_item");

    VCAButton.addEventListener("click", function () {
        if (VCAFloating.classList.contains("displaynone")) {
            VCAFloating.classList.remove("displaynone");

            btnItems.forEach(function (btnItem) {
                btnItem.style.display = "none";
                hbtnitem.style.transform = "rotate(45deg)";
                hbtnitem.style.display = "block";
            });
        } else {
            VCAFloating.classList.add("displaynone");
            btnItems.forEach(function (btnItem) {
                btnItem.style.display = "block";
                hbtnitem.style.display = "none";
            });
        }
    });

    var VCAItems = document.querySelectorAll(".VCA-item");
    VCAItems.forEach(function (VCAItem) {
        VCAItem.addEventListener("click", function () {
            if (VCAFloating.classList.contains("displaynone")) {
                VCAFloating.classList.remove("displaynone");

                btnItems.forEach(function (btnItem) {
                    btnItem.style.display = "none";
                    hbtnitem.style.display = "block";
                });
            } else {

                VCAFloating.classList.add("displaynone");

                btnItems.forEach(function (btnItem) {
                    btnItem.style.display = "block";
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
                if (response.results == null) {
                    jQuery(".libel-alert").text(response.results);
                } else {
                    jQuery(".Callrequest").addClass("d-none");
                    jQuery(".VCA-texth").addClass("d-none");
                    jQuery(".libel-alert").removeClass("d-none");
                    jQuery(".libel-alert").html( "کد پیگیری شما :" + response.results+"<br><br>"+response.text );
                }
            },
            error: function (error) {
            },
            complete: function () {
                submit.prop('disabled', false);
                submit.html('درخواست تماس');
            },
        });
        setTimeout(function () {
            jQuery(".Callrequest").removeClass("d-none").trigger("reset");
            jQuery(".VCA-texth").removeClass("d-none");
            jQuery(".libel-alert").addClass("d-none");
        }, 10000);
    });
});