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
            "url": location.origin + '/website/landing-page-builder/api/getAllLandingPage',
            // "url": location.origin + '/api/getAllLandingPage',
            "type": "GET",
            "dataSrc": (result) => { return result },
            error: (err) => { console.log(err); }
        },
        "columns": [
            { "data": null, "class": "tbl-center" },
            {
                "data": 'name',
                "class": "tbl-center",
            },
            {
                "data": 'date-created',
                "class": "tbl-center",
            },
            {
                "data": 'url',
                "class": "tbl-center",
            }, {
                "data": 'id',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    return '<a class="btn btn-warning waves-effect waves-dark" href="#"><i class="fas fa-edit"></i> Edit</a>';
                }
            }, {
                "data": 'id',
                "class": "tbl-center",
                "render": (data, type, row, meta) => {
                    return '<a class="btn btn-danger waves-effect waves-dark" href="#"><i class="fas fa-trash-alt"></i> Delete</a>';
                }
            }
        ],
        "order": [
            [2, 'desc']
        ],
        "columnDefs": [{
            "targets": [0, 4, 5],
            "orderable": false
        }],
        "ScrollX": true,
        "scrollY": 200
    });
    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            t.cell(cell).invalidate('dom');
        });
    });
});