var Usuarios;

Usuarios = function () {

    return {

        guardarCambiosPerfil: function () {

            $('#guardar_cambios').on('click', function() {
                let name;
                let email;
                let password;
                let password_confirmation;
                let url = $(this).data("route");

                name = $('#name').val();
                email = $('#email').val();
                password = $('#password').val();
                password_confirmation = $('#password_confirmation').val();

                //validamos solo campos obligatorios
                if(name == '' || email == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<p>El campo Nombre o Email esta vacio.</p><br>'
                    });
                } else {
                    if (password != '' && (password != password_confirmation)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '<p>El campo Contraseña no corresponde con la confirmación.</p><br>'
                        });
                    } else {

                        let _token = $('input[name=_token]').val();

                        var formData = new FormData();
                        formData.append("_token", _token);
                        formData.append('_method', 'PATCH');
                        formData.append("name", name);
                        formData.append("email", email);

                        $.ajax({
                            url: url,
                            type: "post",
                            dataType: "HTML",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,

                            beforeSend: function () {
                                loading = Swal.fire({
                                    title: "Espere por favor...",
                                    allowEscapeKey: false,
                                    allowOutsideClick: false,
                                    onOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                            },

                            success: function (response) {
                                let resp = JSON.parse(response);
                                loading.close();
                                if( resp.respuesta ) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: resp.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        text: resp.error,
                                    });
                                }
                            },

                            error: function (error) {
                                console.log(error);
                                let resp = JSON.parse(error.responseText);
                                loading.close();
                                loading = Swal.fire({
                                    icon: 'error',
                                    text: resp.error,
                                });
                            }
                        });
                    }

                }

            });

        }

    }

}();
