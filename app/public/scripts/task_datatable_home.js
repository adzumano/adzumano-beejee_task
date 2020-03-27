$(document).ready(function() {
    $('#table-id').DataTable( {
        "lengthMenu" : [[3,5,10,-1],[3,5,10,'All']],
        "columnDefs" : [
            {
                "targets" : 0,
                "searchable" : false,
                "visible" : false
            },
            {
                "targets" : 3,
                "orderable": false
            }
        ],
        "rowReorder": {
            "selector": 'td:nth-child(2)'
        },
        "responsive": true,
    } );
} );