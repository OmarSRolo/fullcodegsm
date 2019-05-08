$(document).ready(function () {
    // Esconde el mensaje de error cuando se cierra el modal
    $("#login").on('hidden.bs.modal', function () {
        $("#message_login").hide();
    });

    // Esconde el mensaje de error cuando se cierra el modal
    $("#register").on('hidden.bs.modal', function () {
        $("#message_reg").hide();
    });

    // Levanta el modal de lgin
    $('#modal_login').click(function () {
        $("#login").modal("show");
    });


    // Boton de login.
    $('#actionLogin').click(function () {
            // Recoge los datos del usuario
            let username = $("#user").val();
            let password = $("#password").val();
            // Comprueba que no esten vacios los campos
            if (username === "" || password === "") {
                $("#message_login").show();
            } else {
                // Manda el login al servidor
                $.post("/fullcodesgsm/api/v1/auth/login/", {
                    username: username,
                    password: password
                }, (data, status) => {
                    // Si esta bien el login recarga la pagina
                    if (data.complete)
                        location.reload();
                    else {
                        $("#message_text").text(data.message);
                        $("#message_login").show();
                    }
                });
            }
        }
    );

    $('#modal_reg').click(function () {
        $("#register").modal("show");
    });

    $('#actionRegister').click(function () {
        let username = $("#register_user").val();
        let firstName = $("#register_nombre").val();
        let lastName = $("#register_apellido").val();
        let email = $("#register_email").val();
        let password = $("#register_password").val();
        let password2 = $("#register_password2").val();

        if (username === "" || firstName === "" || lastName === "" || email === "") {
            $("#message_reg").show();

        } else {
            if (password !== password2)
                alert("Password no coinciden");
            else {
                $.post("/fullcodesgsm/api/v1/auth/register/", {
                    username: username,
                    password: password,
                    first_name: firstName,
                    last_name: lastName,
                    email: email
                }, (data, status) => {
                    if (data.complete) {
                        location.reload();
                    }
                })
            }
        }
    });

    $('#id_logout').click(function () {
        event.preventDefault();
        $.post("/fullcodesgsm/api/v1/auth/logout/", {}, (data, status) => {
            if (data.complete)
                window.location.href = "/fullcodesgsm/";
        })
    });
});
