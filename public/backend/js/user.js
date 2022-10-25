$(document).ready(function(){
    let table = $('.customerListTable').DataTable({
        ajax: '/admin/get-all-users',
        columns: [
            {
                data: 'id', name: 'id', class: 'text-center',
                render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'image',       name: 'customer',   class: 'text-center' },
            { data: 'name',        name: 'name',       class: 'text-center' },
            { data: 'email',       name: 'email',      class: 'text-center' },
            { data: 'phone',       name: 'phone',      class: 'text-center' },
            { data: 'address',     name: 'address',    class: 'text-center' },
            { data: 'created_at',  name: 'created_at', class: 'text-center' },
            { data: 'action',      name: 'action',     class: 'text-center' },
        ],

        order: [[5, 'desc']],
    });/* End of Customer DataTable */

    $(document).on('click', '.del-user-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Customer?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            onfirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('.deleteUserForm'+id).submit();
            }
        })
    })/* End of Customer Confirm Delete */
});