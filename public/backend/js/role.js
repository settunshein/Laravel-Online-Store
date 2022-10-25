$(document).ready(function(){
    let table = $('.roleListTable').DataTable({
        ajax   : '/admin/get-all-roles',
        columns: [
            {
                data: 'id', name: 'id', class: 'text-center',
                render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'name',        name: 'name',        class: 'text-center' },
            { data: 'permissions', name: 'permissions', class: 'text-center' },
            { data: 'created_at',  name: 'created_at',  class: 'text-center' },
            { data: 'action',      name: 'action',      class: 'text-center' },
        ], 

        order: [[2, 'desc']],
    });/* End of Role DataTable */

    $(document).on('click', '.del-role-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Role?",
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
                    method: 'DELETE',
                    url   : `/admin/role/${id}`,

                    success: function(){
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Role Deleted Successfully',
                        });
                        table.ajax.reload();
                    }
                })
            }
        })
    })
});