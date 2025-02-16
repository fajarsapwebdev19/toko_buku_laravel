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
    $(formSelector + " input, " + formSelector + " select").on("keyup click", function () {
        $(this).valid();
    });
}
