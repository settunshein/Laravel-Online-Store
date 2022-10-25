$(document).ready(function(){
    let table = $('.productListTable').DataTable({
        ajax: '/admin/get-all-products',
        columns: [
            {
                data: 'id', name: 'id', class: 'text-center',
                render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'image',       name: 'image',      class: 'text-center' },
            { data: 'name',        name: 'name',       class: 'text-center' },
            { data: 'price',       name: 'price',      class: 'text-center'},
            { data: 'stock',       name: 'stock',      class: 'text-center'},
            { data: 'created_at',  name: 'created_at', class: 'text-center' },
            { data: 'action',      name: 'action',     class: 'text-center' },
        ],

        order: [[5, 'desc']],
    });/* End of Product DataTable */

    $(document).on('click', '.del-product-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Product?",
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
                    url   : `/admin/product/${id}`,
                    method: 'DELETE',

                    success: function(){
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Product Deleted Successfully',
                        });
                        table.ajax.reload();
                    }
                })
            }
        })
    })
});