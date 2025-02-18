let role_add = $('#form-role').validate({
    rules: {
        role_name: {required: true}
    },
    messages: {
        role_name: 'Role Name wajib di isi'
    },
    submitHandler:function()
    {
        let form = $('#form-role');
        let data = form.serialize();

        $.ajax({
            url: '/admin/master_data/add_role',
            data: data,
            method: 'POST',
            success:function(response)
            {
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
                role_add.resetForm();
                form[0].reset();
                role_data.ajax.reload();
                $('#add_role').modal('hide');
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('#form-role');

$('.role-data').on('click', '.update', function(){
    let id = $(this).data('id');

    $.ajax({
        url: '/admin/master_data/get_role/'+id,
        method: 'GET',
        success:function(response)
        {
            let idr = response.id;

            $('#update_role').modal('show');
            $('#id').val(idr);
            $('input[name=role_name]').val(response.role);
        }
    });
});

let role_update = $('#form-update-role').validate({
    rules: {
        role_name: {required: true}
    },
    messages: {
        role_name: 'Role Name wajib di isi'
    },
    submitHandler:function()
    {
        let id = $('#form-update-role #id').val();
        let form = $('#form-update-role');
        let data = form.serialize();

        $.ajax({
            url: '/admin/master_data/update_role/'+id,
            data: data,
            method: 'PUT',
            success:function(response)
            {
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
                role_update.resetForm();
                form[0].reset();
                role_data.ajax.reload();
                $('#update_role').modal('hide');
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('#form-update-role');

$('.role-data').on('click', '.delete', function(){
    let id = $(this).data('id');

    $('#delete_role').modal('show');
    $('#form-delete-role #id').val(id);
});

$('#form-delete-role').on('click', '#delete', function(){
        let id = $('#form-delete-role #id').val();
        let data = $('#form-delete-role').serialize();

        $.ajax({
            url: "/admin/master_data/delete_role/"+id,
            data: data,
            method: "DELETE",
            success:function(response)
            {
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
                $('#delete_role').modal('hide');
                role_data.ajax.reload();
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
});

// $('#form-delete-role').on('click', '.ok', function(){

//     alert('test')

//     // e.preventDefault();

//     // let id = $('#form-delete-role #id').val();

//     // $.ajax({
//     //     url: "/admin/master_data/delete_role/"+id,
//     //     method: "DELETE",
//     //     success:function(response)
//     //     {
//     //         notify('fas fa-check', 'Success', response.message, 'success', 5000);
//     //         $('#delete_role').modal('show');
//     //     },
//     //     error:function(xhr)
//     //     {
//     //         let err = xhr.responseText;
//     //         errorsResponse(err);
//     //     }
//     // });
// });

