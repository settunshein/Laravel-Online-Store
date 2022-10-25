$(document).ready(function(){
    let table = $('.employeeListTable').DataTable({
        ajax: '/admin/get-all-employees',
        columns: [
            {
                data: 'id', name: 'id', class: 'text-center',
                render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'image',       name: 'image',      class: 'text-center' },
            { data: 'name',        name: 'name',       class: 'text-center' },
            { data: 'email',       name: 'email',      class: 'text-center' },
            { data: 'role_name',   name: 'role_name',  class: 'text-center' },
            { data: 'phone',       name: 'phone',      class: 'text-center' },
            { data: 'address',     name: 'address',    class: 'text-center' },
            { data: 'created_at',  name: 'created_at', class: 'text-center' },
            { data: 'action',      name: 'action',     class: 'text-center' },
        ],

        order: [[7, 'desc']],
    });/* End of Employee DataTable */

    $(document).on('click', '.del-employee-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Employee?",
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
                    url   : `/admin/employee/${id}`,
                    method: 'DELETE',

                    success: function(){
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Employee Deleted Successfully',
                        });
                        table.ajax.reload();
                    }
                })
            }
        })
    })
});