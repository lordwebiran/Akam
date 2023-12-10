jQuery(document).ready(function () {
    jQuery("#vca-add-status").submit(function (e) {
        e.preventDefault();

        let $this = jQuery(this);
        let submit = $this.find('.VCA-submit');
        submit.prop('disabled', true);
        submit.html('منتظر باشید');


        formdata = new FormData();
        formdata.append('action', 'Callrequest');
        formdata.append('nonce', VC_DATA.nonce);
        formdata.append('name', jQuery("#status-name").val());
        formdata.append('icon', jQuery("#status-icon").val());
        formdata.append('icon-color', jQuery("#status-icon-color").val());

        jQuery.ajax({
            type: "POST",
            url: VC_DATA.ajax_url,
            data: formdata,
            contentType: false,
            processData: false,

            success: function (response) {

            },
            error: function (response) {

            },
            complete: function () {
                submit.prop('disabled', false);
                submit.html('افزودن');
            },
        });
    });
    jQuery("#vca-Delete-status").on("click", ".vca-Delete-status-btn", function() {
        // گرفتن سطر مربوط به دکمه کلیک شده
        var row = jQuery(this).closest("tr");

        // جمع آوری اطلاعات مورد نیاز از سطر
        var statusID = row.find(".status-ID").val();
        var nonce = VC_DATA.nonce;

        // ایجاد شیء FormData و افزودن اطلاعات به آن
        var formdata = new FormData();
        formdata.append('action', 'Callrequest');
        formdata.append('nonce', nonce);
        formdata.append('ID', statusID);

        // ارسال درخواست با استفاده از jQuery.ajax
        jQuery.ajax({
            type: "POST",
            url: VC_DATA.ajax_url,
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                // پردازش پاسخ در صورت نیاز

                // حذف سطر از جدول بعد از اتمام درخواست موفق
                row.remove();
            },
            error: function (response) {
                // پردازش خطا در صورت نیاز
            }
        });
    });
});