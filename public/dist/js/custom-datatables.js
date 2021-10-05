// let url_prefix = location.origin + '/website/landing-page-builder';
// let url_prefix = location.origin;
let main_url = localStorage.getItem('base_url');
let user_id = localStorage.getItem('user_id');
let role_id = localStorage.getItem('role_id');
console.log(user_id)

$(document).ready(() => {
    var t = $('#landingpage-list').DataTable({
        dom: "<'row'<'col-md-3'l><'col-md-5 text-left'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "ajax": {
            "url": main_url + 'api/getAllLandingPage',
            "type": "GET",
            "dataSrc": (result) => { return result },
            error: (err) => { console.log(err); }
        },
        "columns": [
            { "data": null, "class": "tbl-center" },
            {
                "data": "is-published",
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    if (data == 0) {
                        return `<a id="publishLP-${row['id']}" onclick="publishThis(${row['id']},${data})" class="btn btn-danger text-white" style="border-radius:20px;"><i class="fas fa-exclamation-circle"></i> Unpublished</a>`;
                    } else {
                        return `<a id="publishLP-${row['id']}" onclick="publishThis(${row['id']},${data})" class="btn btn-success text-white" style="border-radius:20px;"><i class="fas fa-check-circle"></i> Published</a>`;
                    }
                }
            },
            {
                "data": 'name',
                "class": "tbl-center",
            },
            {
                "data": 'date-created',
                "class": "tbl-center",
            },
            {
                "data": 'users.name',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    return '<a href="' + main_url + 'profile/u/' + row.users.id + '">' + data + '</a>';
                }
            },
            {
                "data": 'url',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    if (row['is-published'] == 0) {
                        return '';
                    } else {
                        return '<a href="' + data + '" target="_blank">' + data + '</a>';
                    }
                }
            },
            {
                "data": 'draft-token',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    if (row['is-published'] == 0) {
                        let url = main_url + 'id/d/' + data;
                        return '<a class="btn btn-primary waves-effect waves-dark" href="' + url + '" target="_blank"><i class="mdi mdi-file-hidden"></i> Lihat Draft</a>';
                    } else {
                        return '';
                    }
                }
            },
            {
                "data": 'id',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    console.log(row['users']['id']);
                    let res = '<a class="btn btn-warning waves-effect waves-dark" href="' + main_url + 'landingpage/edit/' + data + '/product-url"><i class="fas fa-edit"></i> Edit</a>';
                    if (role_id != 1) {
                        if (user_id == row['users']['id']) {
                            return res;
                        } else {
                            return '';
                        }
                    } else {
                        return res;
                    }
                }
            },
            {
                "data": 'id',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    console.log(row['users']['id']);
                    let res = '<a id="deleteLP-' + data + '" class="btn btn-danger waves-effect waves-dark" onclick="deleteThis(' + data + ')"><i class="fas fa-trash-alt"></i> Delete</a>';
                    if (role_id != 1) {
                        if (user_id == row['users']['id']) {
                            return res;
                        } else {
                            return '';
                        }
                    } else {
                        return res;
                    }
                }
            }
        ],
        "order": [
            [3, 'desc']
        ],
        "columnDefs": [{
            "targets": [0, 6, 7],
            "orderable": false
        }],
    });
    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            t.cell(cell).invalidate('dom');
        });
    });
    var t2 = $('#account-management').DataTable({
        dom: "<'row'<'col-md-3'l><'col-md-5 text-left'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "ajax": {
            "url": main_url + 'api/getAllUser',
            "type": "GET",
            "dataSrc": (result) => { return result },
            error: (err) => { console.log(err); }
        },
        "columns": [
            { "data": null, "class": "tbl-center" },
            {
                "data": "is_active",
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    if (row['role_id'] == 2) {
                        if (data == 0) {
                            return `<a id="activateU-${row['id']}" onclick="activateThis(${row['id']},${data})" class="btn btn-danger text-white" style="border-radius:20px;"><i class="fas fa-exclamation-circle"></i> Unactive</a>`;
                        } else {
                            return `<a id="activateU-${row['id']}" onclick="activateThis(${row['id']},${data})" class="btn btn-success text-white" style="border-radius:20px;"><i class="fas fa-check-circle"></i> Active</a>`;
                        }
                    } else {
                        return '';
                    }
                }
            },
            {
                "data": 'name',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    return '<a href="' + main_url + 'profile/u/' + row.id + '">' + data + '</a>';
                }
            },
            {
                "data": 'username',
                "class": "tbl-center",
            },
            {
                "data": 'date_created',
                "class": "tbl-center",
            },
            {
                "data": 'id',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    if (row['role_id'] == 2) {
                        return '<a id="deleteU-' + data + '" class="btn btn-danger waves-effect waves-dark" onclick="deleteThisUser(' + data + ')"><i class="fas fa-trash-alt"></i> Delete</a>';
                    } else {
                        return '';
                    }
                }
            }
        ],
        "order": [
            [4, 'desc']
        ],
        "columnDefs": [{
            "targets": [0, 5],
            "orderable": false
        }],
    });
    t2.on('order.dt search.dt', function() {
        t2.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            t2.cell(cell).invalidate('dom');
        });
    });
});

let publishThis = (i, status) => {
    $('#publishLP-' + i).html('<i class="fas fa-spinner fa-spin"></i>');
    if (confirm('Apakah anda yakin mengubah ini?')) {
        $.ajax({
            url: main_url + 'api/publishLandingPage/' + i,
            type: 'GET',
            beforeSend: () => {
                console.log('loading..');
            },
            success: (result) => {
                $('#publishLP-' + i).html('<i class="fas fa-check-circle"></i>');
                console.log(result);
                let redirect = 'landingpage_lists';
                let type = 'success';
                let message = 'Data_landing_page_berhasil_diubah!';
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_url + 'id/r/' + redirect_url;
            },
            error: (error) => {
                alert('Terjadi error!');
                if (status == 0) {
                    $('#publishLP-' + i).html('<i class="fas fa-exclamation-circle"></i> Unpublished');
                } else {
                    $('#publishLP-' + i).html('<i class="fas fa-check-circle"></i> Published')
                }
            }
        });
    } else {
        if (status == 0) {
            $('#publishLP-' + i).html('<i class="fas fa-exclamation-circle"></i> Unpublished');
        } else {
            $('#publishLP-' + i).html('<i class="fas fa-check-circle"></i> Published')
        }
    }
}

let activateThis = (i, status) => {
    $('#activateU-' + i).html('<i class="fas fa-spinner fa-spin"></i>');
    if (confirm('Apakah anda yakin mengubah ini?')) {
        $.ajax({
            url: main_url + 'api/activateUser/' + i,
            type: 'GET',
            beforeSend: () => {
                console.log('loading..');
            },
            success: (result) => {
                $('#activateU-' + i).html('<i class="fas fa-check-circle"></i>');
                console.log(result);
                let redirect = 'profile_manage';
                let type = 'success';
                let message = 'Data_user_berhasil_diubah!';
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_url + 'id/r/' + redirect_url;
            },
            error: (error) => {
                alert('Terjadi error!');
                if (status == 0) {
                    $('#activateU-' + i).html('<i class="fas fa-exclamation-circle"></i> Unactive');
                } else {
                    $('#activateU-' + i).html('<i class="fas fa-check-circle"></i> Active')
                }
            }
        });
    } else {
        if (status == 0) {
            $('#activateU-' + i).html('<i class="fas fa-exclamation-circle"></i> Unactive');
        } else {
            $('#activateU-' + i).html('<i class="fas fa-check-circle"></i> Active')
        }
    }
}

let deleteThis = (i) => {
    $('#deleteLP-' + i).html('<i class="fas fa-spinner fa-spin"></i>');
    if (confirm('Apakah anda yakin menghapus data Landing Page ini?')) {
        $.ajax({
            url: main_url + 'api/deleteLandingPage/' + i,
            type: 'GET',
            beforeSend: () => {
                console.log('loading..');
            },
            success: (result) => {
                $('#deleteLP-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
                console.log(result);
                let redirect = 'landingpage_lists';
                let type = 'success';
                let message = 'Data_landing_page_berhasil_dihapus!';
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_url + 'id/r/' + redirect_url;
            },
            error: (error) => {
                alert('Terjadi error!');
                $('#deleteLP-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
            }
        });
    } else {
        $('#deleteLP-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
    }
}
let deleteThisUser = (i) => {
    $('#deleteU-' + i).html('<i class="fas fa-spinner fa-spin"></i>');
    if (confirm('Apakah anda yakin menghapus akun user ini?')) {
        $.ajax({
            url: main_url + 'api/deleteUser/' + i,
            type: 'GET',
            beforeSend: () => {
                console.log('loading..');
            },
            success: (result) => {
                $('#deleteU-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
                console.log(result);
                let redirect = 'profile_manage';
                let type = 'success';
                let message = 'Data_user_berhasil_dihapus!';
                let redirect_url = redirect + '?type=' + type + '&message=' + message;
                location.href = main_url + 'id/r/' + redirect_url;
            },
            error: (error) => {
                alert('Terjadi error!');
                $('#deleteU-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
            }
        });
    } else {
        $('#deleteU-' + i).html('<i class="fas fa-trash-alt"></i> Delete');
    }
}