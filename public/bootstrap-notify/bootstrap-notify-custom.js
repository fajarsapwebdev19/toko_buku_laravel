
function notify(icons, title, message, type, time){
    $.notify({
            icon: icons,
            title: title,
            message: message,
        },
        {
            type: type,
            placement: {
                from: "top",
                align: "right"
            },
            z_index: 9999999,
            delay: time,
            showProgressbar: true,
        });
}
