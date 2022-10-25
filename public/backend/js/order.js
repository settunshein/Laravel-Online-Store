$(document).ready(function(){
    let table = $('.orderListTable').DataTable({
        ajax   : '/admin/get-all-orders',
        columns: [
            {
                data: 'id', name: 'id', class: 'text-center',
                render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'customer',     name: 'customer',     class: 'text-center' },
            { data: 'email',        name: 'email',        class: 'text-center' },
            { data: 'phone',        name: 'phone',        class: 'text-center' },
            { data: 'total_amt',    name: 'total_amt',    class: 'text-center' },
            { data: 'address',      name: 'address',      class: 'text-center' },
            { data: 'order_status', name: 'order_status', class: 'text-center' },
            { data: 'created_at',   name: 'created_at',   class: 'text-center' },
            { data: 'action',       name: 'action',       class: 'text-center' },
        ], 

        order: [[7, 'desc']],
    });/* End of Order DataTable */

    $(document).on('click', '.del-order-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            onfirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url   : `/admin/order/${id}`,
                    method: 'DELETE',

                    success: function(res){
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Order Deleted Successfully',
                        });
                        table.ajax.reload();
                    }
                })
            }
        })
    });

    //$('.status-toggle').change(function () {
    $(document).on('change', '.status-toggle', function(){
        let id = $(this).data('id');

        if ($(this).prop('checked') == true) {
            $.ajax({
                url   : `/admin/update-order-status`,
                type  : 'POST',
                data  : { status: 1, id: id },

                success: function (res) {
                    console.log(res);
                    if (res.message == 'success') {
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Order Status Updated to Completed Successfully',
                        });
                    }
                }
                
            });
        } else {
            $.ajax({
                url   : `/admin/update-order-status`,
                type  : "POST",
                data  : { status: 0, id: id },
                
                success: function (res) {
                    console.log(res);
                    if (res.message == 'success') {
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Order Status Updated to In Progress Successfully',
                        });
                    }
                }
            });
        }
    });
});