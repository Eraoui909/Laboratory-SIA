

$(document).on('click',".ha-contact-btn",function (e) {
    e.preventDefault();
    let prenom  = $(".ha-prenom").val().trim().toString();
    let nom     = $(".ha-nom").val().trim().toString();
    let email   = $(".ha-email").val().trim().toString();
    let subject = $(".ha-subject").val().trim().toString();
    let msg     = $("textarea#ha-message").val().trim().toString();

    if( prenom === '' || nom === ''){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'First and Last name are required',
            showConfirmButton: false,
            timer: 1500
        })
    }else if( email === '') {

        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Email is required',
            showConfirmButton: false,
            timer: 1500
        })

    }else if( subject === '') {

        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Subject is required',
            showConfirmButton: false,
            timer: 1500
        })
    }else if( msg === ''){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Message is required',
            showConfirmButton: false,
            timer: 1500
        })
    }else {

        let data = $(".ha-contact-form").serialize();
        console.log(data);
        $.ajax({
            method: "post",
            url: '/contact/send',
            data: data,
            datatype: "json",
            success: function (data) {
                console.log(data);
                if(data === '"success"'){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Message has been sent',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $(".ha-prenom").val("");
                    $(".ha-nom").val("");
                    $(".ha-email").val("");
                    $(".ha-subject").val("");
                    $("textarea#ha-message").val("");
                }else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'try again pleas',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }










});