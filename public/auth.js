let login = $('.form-login').validate({
    rules:{
        school_name: {required: true},
        username: {required: true},
        password: {required: true}
    },
    messages:{
        username: 'Username tidak boleh kosong !',
        password: 'Password tidak boleh kosong !',
        school_name: 'Nama Sekolah tidak boleh kosong !'
    },
    submitHandler:function()
    {
        let data = $('.form-login').serialize();

        $.ajax({
            url: 'process_auth',
            data: data,
            method: 'POST',
            success:function(response)
            {
                let to = response.to;
                notify('fas fa-check-circle', 'Success', 'Berhasil Login', 'success', 3000);

                if(to == 3)
                {
                    setTimeout(() => {
                        window.location.href='../';
                    }, 3000);
                }
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('.form-login');

// validate register users

let register_user = $('.form-register-users').validate({
    rules: {
        school_name:{required: true},
        name: {required: true},
        gender: {required: true},
        email: {required: true, customEmail: true},
        username: {required: true},
        password: {required: true, strongPassword: true},
        password_confirmation: {required: true, equalTo: '#pw'}
    },
    messages:{
        school_name: {required: 'Nama Sekolah tidak boleh kosong !'},
        name: {required: 'Nama tidak boleh kosong'},
        gender: {required: 'Pilih salah satu'},
        email: {required: 'Email tidak boleh kosong !', customEmail: 'Format email tidak valid.'},
        username: {required: 'Username tidak boleh kosong !'},
        password: {required: 'Password tidak boleh kosong !', strongPassword: 'Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.'},
        password_confirmation: {required: 'Konfirmasi harus di isi', equalTo: 'konfirmasi password harus sama dengan kolom password'}
    },
    errorPlacement: function (error, element) {
        // Penempatan pesan kesalahan untuk radio button
        if (element.is(":radio")) {
            error.insertAfter(element.closest('.form-group')); // Tambahkan pesan setelah grup radio button
        } else {
            error.insertAfter(element); // Default placement untuk elemen lain
        }
    },
    highlight: function (element, errorClass, validClass) {
        // Highlight elemen yang tidak valid
        $(element).closest('.form-control').addClass('error'); // Tambahkan kelas Bootstrap 'has-error'
        $(element).closest('.form-control').removeClass('valid'); // Tambahkan kelas Bootstrap 'has-error'
    },
    unhighlight: function (element, errorClass, validClass) {
        // Hapus highlight ketika valid
        $(element).closest('.form-control').removeClass('error');
        $(element).closest('.form-control').addClass('valid');
    },
    submitHandler:function()
    {
        let data = $('.form-register-users').serialize();
        let btn = $('.btn-block');
        $('.spin').show();
        btn.prop('disabled', true).html('<span class="spin">'+ $('.spin').html() +'</span> Mohon Tunggu');


        $.ajax({
            url: "/register_users",
            method: "POST",
            data: data,
            success:function(response)
            {
                $('.btn-block').prop('disabled', false).text('Daftar');
                $('.spin').hide();
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
                $('.form-register-users')[0].reset();
                register_user.resetForm();
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('.form-register-users');

// validate login admin

let login_admin = $('.form-sys').validate({
    rules: {
        username: {required: true},
        password: {required: true}
    },
    messages:{
        username: 'Username wajib di isi !',
        password: 'Password wajib di isi !'
    },
    submitHandler:function()
    {
        let form = $('.form-sys');
        let data = form.serialize();

        $.ajax({
            url: '/process_auth_sad',
            method: 'POST',
            data: data,
            success:function(response)
            {
                let to = response.to;
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
                form[0].reset();
                login_admin.resetForm();

                if(to == 1 || to == 2)
                {
                    setTimeout(() => {
                        window.location.href='admin/';
                    }, 5000);
                }
            },
            error:function(xhr)
            {
                let err = xhr.responseText;
                errorsResponse(err);
            }
        });
    }
});

formValidateAuto('.form-sys');


