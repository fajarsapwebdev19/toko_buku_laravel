// additional method
$.validator.addMethod("customEmail", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
}, "Format email tidak valid.");

// Menambahkan metode validasi kustom untuk password yang aman
$.validator.addMethod("strongPassword", function (value, element) {
    // Regex untuk memeriksa kriteria password yang aman
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
}, "Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.");

function errorsResponse(reserr) {
    let err = reserr;
    let error = JSON.parse(err).message;
    let errorMessage = "";

    if (Array.isArray(error)) {
        $.each(error, function (i, val) {
            errorMessage += " - " + val + "<br>";
        });
    } else {
        errorMessage = error;
    }

    notify('fas fa-times', 'Error', errorMessage, 'danger', 3000);
}

function formValidateAuto(formSelector) {
    $(formSelector + " input, " + formSelector + " select," + formSelector + " textarea").on("keyup click", function () {
        $(this).valid();
    });
}
