var Usuarios;

Usuarios = function () {

    return {

        guardarCambiosPerfil: function () {

            $('#guardar_cambios').on('click', function() {
                let name;
                let email;
                let password;
                let password_confirmation;
                let url;
                console.log($(this).data("route"));

                name = $('#name').val();
                email = $('#email').val();
                password = $('#password').val();
                password_confirmation = $('#password_confirmation').val();

                //validamos solo campos obligatorios
                if(name == '' || email == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<p>El Campo Nombre Esta Vacio.</p><br>'
                    })
                }
            });

        }

    }

}();
