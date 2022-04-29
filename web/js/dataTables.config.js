$(document).ready(function () {
    $('.datatable').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json"
                },
                "columnDefs": [{
                        "targets": -1,
                        "orderable": false
                    }]
            });

    $('.datatable-measurements').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json"
                }
            });
});