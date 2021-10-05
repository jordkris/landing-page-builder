$(document).ready(() => {
    $('#img_caption_input').keyup(function() {
        $('#img_caption').html($(this).val());
    });
    let triggerSubmitButton = () => {
        let db_status = $('#db_status').html();
        let url_status = $('#url_status').html();
        let success_status = '<i class="fas fa-check-circle text-success"></i>';
        if (db_status == success_status && url_status == success_status) {
            $('#submitButton').attr('disabled', '').removeAttr('disabled');
        } else {
            $('#submitButton').removeAttr('disabled').attr('disabled', '');
        }
    };
    let database_check = () => {
        $.ajax({
            url: location.href + "database_check",
            // type: "POST",
            method: "GET",
            data: {
                db_host: $('#db_host').val(),
                db_username: $('#db_username').val(),
                db_password: $('#db_password').val(),
                db_name: $('#db_name').val(),
            },
            beforeSend: () => {
                $('#db_status').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: (response) => {
                if (response.status != 200) {
                    $('#db_status').html('<i class="fas fa-times-circle text-danger"></i>');
                } else {
                    $('#db_status').html('<i class="fas fa-check-circle text-success"></i>');
                }
                triggerSubmitButton();
            },
            error: (err) => {
                $('#db_status').html('<i class="fas fa-times-circle text-danger"></i>');
                console.log(err);
            }
        });
    }

    let isValidHttpUrl = (string) => {
        let url;
        try {
            url = new URL(string);
        } catch (_) {
            return false;
        }

        return url.protocol === "http:" || url.protocol === "https:";
    }
    let url_check = () => {
        $('#url_status').html('<i class="fas fa-spinner fa-spin"></i>');
        let url = $('#url').val();
        if (url.substr(-1) == '/') {
            if (isValidHttpUrl(url)) {
                $('#url_status').html('<i class="fas fa-check-circle text-success"></i>');
            } else {
                $('#url_status').html('<i class="fas fa-times-circle text-danger"></i>');
            }
        } else {
            $('#url_status').html('<i class="fas fa-times-circle text-danger"></i>');
        }
        triggerSubmitButton();
    }
    $('#db_host').change(() => {
        database_check();
    });
    $('#db_username').change(() => {
        database_check();
    });
    $('#db_password').change(() => {
        database_check();
    });
    $('#db_name').change(() => {
        database_check();
    });
    $('#url').change(() => {
        url_check();
    });

});