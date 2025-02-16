$.validator.addMethod("customEmail", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
}, "Format email tidak valid.");

// Menambahkan metode validasi kustom untuk password yang aman
$.validator.addMethod("strongPassword", function (value, element) {
    // Regex untuk memeriksa kriteria password yang aman
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
}, "Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.");

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

let register_user = $('.form-register-users').validate({
    rules: {
        school_name:{required: true},
        name: {required: true},
        gender: {required: true},
        email: {required: true, customEmail: true},
        username: {required: true},
        password: {required: true, strongPassword: true},
        confirm_password: {required: true, equalTo: '#pw'}
    },
    messages:{
        school_name: {required: 'Nama Sekolah tidak boleh kosong !'},
        name: {required: 'Nama tidak boleh kosong'},
        gender: {required: 'Pilih salah satu'},
        email: {required: 'Email tidak boleh kosong !', customEmail: 'Format email tidak valid.'},
        username: {required: 'Username tidak boleh kosong !'},
        password: {required: 'Password tidak boleh kosong !', strongPassword: 'Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.'},
        confirm_password: {required: 'Konfirmasi harus di isi', equalTo: 'konfirmasi password harus sama dengan kolom password'}
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

        $.ajax({
            url: "/register_users",
            method: "POST",
            data: data,
            success:function(response)
            {
                notify('fas fa-check', 'Success', response.message, 'success', 5000);
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
