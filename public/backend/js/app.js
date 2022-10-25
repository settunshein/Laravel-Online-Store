$(document).ready( function () {
    feather.replace()

    $('.dropify').dropify({
        messages: {
            'default': 'Choose Your Upload Image',
            'replace': 'Click or Drag and Drop to Replace',
            'remove' : 'Remove',
        }
    });

    $('.statusToggle').bootstrapToggle();

    $('.select2').select2();

    /* AJAX Setup */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    $.extend(true, $.fn.dataTable.defaults, {
        processing: true,
        serverSide: true,
        pageLength: 5,
        columnDefs: [
            {
                "targets"  : 'no-sort',
                "orderable": false,
            },
            {
                "targets"   : 'no-search',
                "searchable": false,
            },
            {
                "targets": 'hidden',
                "visible": false,
            }
        ],

        language: {
            "processing" : "<i class='fas fa-spinner fa-spin loading-dark' style='font-size: 30px;'></i><p class='my-2 font-weight-bold'>Loading . . .</p>",
            "lengthMenu": "Show _MENU_ Entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ Entries",
            "infoEmpty": "No Record to Show",
            "emptyTable": "404, No Data Available In Table"
        },

        lengthMenu: [5, 10, 20, 50, 100, 200, 500],

        fnDrawCallback: function (oSettings) {
            $('.orderListTable .status-toggle').bootstrapToggle();
        }
    });
});