$( "#btn_save_cat" ).click(function() {

    let camp_nomb;
    let camp_desc;
    camp_nomb = $('#nomb_cat').val();
    camp_desc = $('#desc_cat').val();

    //validamos solo campos obligatorios
    if( camp_nomb == '' && camp_desc == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>El Campo Nombre Esta Vacio.</p><br><p>El Campo Descripción esta Vacio.</p>'
        })
    }
    //validamos solo campos obligatorios
    if( camp_nomb == '' ){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>El Campo Nombre Esta Vacio.</p>'
        })
    }
    //validamos solo campos obligatorios
    if( camp_desc == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>El Campo Descripción esta Vacio.</p>'
        })
    }
    //validamos y enviamos a guardar
    if( camp_nomb != '' && camp_desc != '' ) {

        event.preventDefault();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        var formData = new FormData();
        formData.append("_token", _token );
        formData.append("nombre", camp_nomb );
        formData.append("descripcion", camp_desc );

        $.ajax({
            url: "http://127.0.0.1:8000/categoria/save",
            type: "post",
            dataType: "html",
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
                console.log('Valores que llegan repuesta : '+ resp.respuesta );
                console.log('Valores que llegan msg: '+ resp.msg );
                console.log('Valores que llegan : '+ resp.id );
                loading.close();
                if( resp.respuesta ) {
                    Swal.fire({
                        icon: 'success',
                        title: resp.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    actualizar_cat(resp.id);
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: resp.error,
                    })
                }
            },

            error: function (error) {
                let resp = JSON.parse(error.responseText);
                loading.close();
                loading = Swal.fire({
                    icon: 'error',
                    text: resp.error,
                });
            }
        });

    }
});

function actualizar_cat(id) {

    $.ajax({
        url: "http://127.0.0.1:8000/categoria/mostrar",
        type: "get",
        data: {'id' : id},
        cache: false,

        success: function (response) {
            let resp = JSON.parse(response);
         //   loading.close();
            if( resp.respuesta ) {

                Swal.fire({
                    icon: 'success',
                    title: resp.msg,
                    showConfirmButton: false,
                    timer: 1500
                })

                $("#tbl_cat").append('<tr>' +
                    '<td>'+ resp.id +'</td>' +
                    '<td>'+ resp.nombre +'</td>' +
                    '<td>'+ resp.descripcion +'</td>' +
                    '<td>'+ resp.estado +'</td>' +
                    '<td>'+ resp.vigencia +'</td>' +
                    '<td><a href="#" class="btn btn-primary btn-sm"><i class="material-icons btn__icon--left">edit</i>Editar</a></td>' +
                    '</tr>');

                $("#Modal_Categoria .close").click();

            }else{

                Swal.fire({
                    icon: 'error',
                    text: resp.error,
                })

            }
        },

        error: function (error) {
            let resp = JSON.parse(error.responseText);
            loading.close();
            loading = Swal.fire({
                icon: 'error',
                text: resp.error,
            });
        }
    });
}
