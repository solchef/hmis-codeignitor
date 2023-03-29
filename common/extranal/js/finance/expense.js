   "use strict";
$(document).ready(function () {
       "use strict";
        var table = $('#editable-sample').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "finance/getExpense",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-md-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0,1,2,3], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0,1,2,3], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0,1,2,3], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0,1,2,3], }},
                {extend: 'print', exportOptions: {columns: [0,1,2,3], }},
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,

            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                 search: "_INPUT_",
                "url": "common/assets/DataTables/languages/"+language+".json"
            }
        });
        table.buttons().container().appendTo('.custom_buttons');     
    });
