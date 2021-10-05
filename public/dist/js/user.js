let main_urlv6 = localStorage.getItem('base_url');

let updateUser = (user_id) => {
    let submitData = new FormData($('#form-update-user')[0]);
    let redirect = 'profile_edit';
    $.ajax({
        url: main_urlv6 + 'api/editUser/' + user_id,
        type: 'POST',
        data: submitData,
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: () => {
            console.log('loading..');
            $('#updateUser').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: (result) => {
            console.log('success');
            $('#updateUser').html('<i class="fas fa-check-circle"></i>');
            let type = 'success';
            let message = 'Profil_berhasil_diperbarui!';
            let redirect_url = redirect + '?type=' + type + '&message=' + message;
            location.href = main_urlv6 + 'id/r/' + redirect_url;
        },
        error: (error) => {
            console.log('Terjadi error! Periksa kembali data yang sedang diisi.');
            $('#updateUser').html('<i class="fas fa-check-circle"></i>');
            let type = 'success';
            let message = 'Profil_berhasil_diperbarui!';
            let redirect_url = redirect + '?type=' + type + '&message=' + message;
            location.href = main_urlv6 + 'id/r/' + redirect_url;
        }
    });
}