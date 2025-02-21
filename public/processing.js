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

// sekolah

let validate_add_school = $('#form-school').validate({
    rules:{
        npsn: {required: true, number: true, minlength: 8, maxlength: 8},
        school_name: {required: true},
        address: {required: true},
        no_telp: {required: true, number: true, maxlength: 13, minlength: 12},
        email: {required: true, customEmail: true},
        nama_kepsek: {required: true}
    },
    messages: {
        npsn:
        {
            required: 'NPSN wajib di isi !',
            number: 'NPSN hanya berformat angka !',
            minlength: 'Minimal NPSN 8 angka !',
            maxlength: 'Maximal NPSN 8 angka !'
        },
        school_name: 'Nama Sekolah wajib di isi !',
        address: 'Alamat wajib di isi !',
        no_telp:
        {
            required: 'No Telp wajib di isi !',
            number: 'No Telp Berformat angka !',
            minlength: 'Minimal No Telp 12 Angka !',
            maxlength: 'Maksimal No Telp 13 angka !'
        },
        email:
        {
            required: 'Email wajib di isi !',
            customEmail: 'Format email tidak valid'
        },
        nama_kepsek: 'Nama Kepala Sekolah wajib di isi'
    },
    submitHandler:function()
    {
        let form = $('#form-school');
        let data = form.serialize();

        $.ajax({
            url: "/admin/master_data/add_school",
            data: data,
            method: 'POST',
            success:function(response)
            {
                $('#add_school').modal('hide');
                school_data.ajax.reload();
                form[0].reset();
                validate_add_school.resetForm();
                notify('fas fa-check', 'Success', response.message, 'success', 3000);
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('#form-school');

$('.school_data').on('click', '.update', function(){
    let npsn = $(this).data('id');

    $.ajax({
        url: '/admin/master_data/get_school/' + npsn,
        method: 'GET',
        success:function(response)
        {
            $('#update_school').modal('show');

            $('#form-update-school input[name=npsn]').val(response.npsn);
            $('#form-update-school input[name=school_name]').val(response.nama_sekolah);
            $('#form-update-school textarea[name=address]').val(response.alamat);
            $('#form-update-school input[name=no_telp]').val(response.no_telp);
            $('#form-update-school input[name=email]').val(response.email);
            $('#form-update-school input[name=nama_kepsek]').val(response.nama_kepsek);
        }
    });
});

let update_validate = $('#form-update-school').validate({
    rules:{
        npsn: {required: true, number: true, minlength: 8, maxlength: 8},
        school_name: {required: true},
        address: {required: true},
        no_telp: {required: true, number: true, maxlength: 13, minlength: 12},
        email: {required: true, customEmail: true},
        nama_kepsek: {required: true}
    },
    messages: {
        npsn:
        {
            required: 'NPSN wajib di isi !',
            number: 'NPSN hanya berformat angka !',
            minlength: 'Minimal NPSN 8 angka !',
            maxlength: 'Maximal NPSN 8 angka !'
        },
        school_name: 'Nama Sekolah wajib di isi !',
        address: 'Alamat wajib di isi !',
        no_telp:
        {
            required: 'No Telp wajib di isi !',
            number: 'No Telp Berformat angka !',
            minlength: 'Minimal No Telp 12 Angka !',
            maxlength: 'Maksimal No Telp 13 angka !'
        },
        email:
        {
            required: 'Email wajib di isi !',
            customEmail: 'Format email tidak valid'
        },
        nama_kepsek: 'Nama Kepala Sekolah wajib di isi'
    },
    submitHandler:function()
    {
        let form = $('#form-update-school');
        let data = form.serialize();

        // $.ajax({
        //     url: "/admin/master_data/add_school",
        //     data: data,
        //     method: 'POST',
        //     success:function(response)
        //     {
        //         $('#add_school').modal('hide');
        //         school_data.ajax.reload();
        //         form[0].reset();
        //         validate_add_school.resetForm();
        //         notify('fas fa-check', 'Success', response.message, 'success', 3000);
        //     },
        //     error:function(xhr)
        //     {
        //         let err = xhr.responseText;
        //         errorsResponse(err);
        //     }
        // });
    }
});
