$(document).ready(function() {
    table_bandeja = $('#table_bandeja').DataTable({
        "processing": false,
        "responsive": true,
        "bDeferRender": true,
        "deferLoading": 57,
        "bAutoWidth": false,
        "pageLength": 5,
        "iDisplayLength": 10,
        "bLengthChange": true,
        "ordering": true,
        "order": [],
        "bPaginate": true,
        "fixedHeader": false,
        "columns": [
            {"data": "numero"},
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "vigencia"},
            {"data": "opciones"}
        ],
        "bFilter": false,
        "sPaginationType": "bootstrap",
        "pagingType": "simple_numbers",
        "language": {
            "sProcessing": "Procesando...",
            "lengthMenu": 'Mostrar <select class="rsh_form-control-2">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">Todos</option>' +
                '</select> Categorias',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": [
                {
                    "extend": 'csv',
                }
            ]
        },
        fnPreDrawCallback: function () {
        },
        fnInitComplete: function (oSettings, json) {
            $("#tableLoading").remove();
            $('#dataTableSelectAllWrapper').removeClass('dataTableParentHidden');
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        }
    });
} );
//**************************//
//**** boton de agregar ****//
//**************************//
$('body').on('click', '#btn_save_cat', function() {

    let camp_nomb;
    let camp_desc;
    let camp_est;
    let camp_vig;
    let camp_bandera;
    let camp_uuid;
    camp_nomb = $('#nomb_cat').val();
    camp_desc = $('#desc_cat').val();
    camp_est = $('#edo_cat').val();
    camp_vig = $('#vig_cat').val();
    camp_bandera = $('#banderaAccion').val();
    camp_uuid = $('#uuid').val();
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
        formData.append("estado", camp_est );
        formData.append("vigencia", camp_vig );
        formData.append("banderaAccion", camp_bandera );
        formData.append("uuid", camp_uuid );

        $.ajax({
            url: "http://127.0.0.1:8000/categoria/save",
            type: "POST",
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
                    })
                    $('#Modal_Categoria').modal('hide');
                    //** llama a refresh de la grilla **//
                        refresh_grilla(resp.id,camp_bandera);
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
//*******************************//
//**** Agregar una Categoria ****//
//*******************************//
$('body').on('click', '#btn_agregar_cat', function() {

    //Limpio los campos del modal
        $('#nomb_cat').val('');
        $('#desc_cat').val('');
        //$('#vig_cat').val();
        //$('#est_cat').val();
        $('#banderaAccion').val('Save');
        $('#btn_save_cat').text('Guardar');
        $('#uuid').val('');
        $('#Modal_Categoria').modal('show');
});
//****************************************//
//**** Cambiar Vigencias de Categoria ****//
//****************************************//
$('body').on('click', '#btn_changer_cat', function() {

    let campoUUID = $(this).attr("data-uuid");
    let _token   = $('meta[name="csrf-token"]').attr('content');

    var formData = new FormData();
    formData.append("_token", _token );
    formData.append("uuid", campoUUID );

    $.ajax({
        url: "http://127.0.0.1:8000/categoria/changer",
        type: "POST",
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
            loading.close();
            if( resp.respuesta ) {
                Swal.fire({
                    icon: 'success',
                    title: resp.msg,
                    showConfirmButton: false,
                    timer: 1500
                })
                let campo = resp.uuid;
                let imgView = (resp.vigenciaId == 1)? 'lock':'no_encryption';
                let txtView = (resp.vigenciaId == 1)? 'Desactivar': ( (resp.vigenciaId == 2)? 'Activar':'' );
                $("#tr_"+campo).html('<td>'+ resp.id +'</td>' +
                    '<td>'+ resp.nombre +'</td>' +
                    '<td>'+ resp.descripcion +'</td>' +
                    '<td>'+ resp.vigencia +'</td>' +
                    '<td>' +
                    '<a id="btn_changer_cat" class="btn btn-secondary btn-sm" data-uuid="' + resp.uuid + '" href="#"><i class="material-icons btn__icon--left">'+ imgView +'</i>' + txtView + '</a> ' +
                    '<a id="btn_edit_cat" class="btn btn-primary btn-sm" data-uuid="' + resp.uuid + '"  href="#"><i class="material-icons btn__icon--left">edit</i>Editar</a> ' +
                    '</td>');
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
});
//**************************//
//**** Editar Categoria ****//
//**************************//
$('body').on('click', '#btn_edit_cat', function() {

    let campoUUID = $(this).attr("data-uuid");
    $('#banderaAccion').val('Edit');
    $('#uuid').val(campoUUID);
    $.ajax({
        url: "http://127.0.0.1:8000/categoria/search",
        type: "GET",
        data: { "uuid":campoUUID },
        cache: false,

        success: function (response) {
            if( response.respuesta ) {
                $('#btn_save_cat').text('Editar');
                $('#nomb_cat').val(response.nombre);
                $('#desc_cat').val(response.descripcion);
                $('#vig_cat').val(response.vigenciaId);
                $('#est_cat').val(response.estadoId);
                $('#Modal_Categoria').modal('show');
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

});
//************************************//
//*** Refesh grilla, luego Guardar ***//
//************************************//
function refresh_grilla(id,bandera) {

    $.ajax({
        url: "http://127.0.0.1:8000/categoria/refesh",
        type: "GET",
        data: {"id":id},
        cache: false,

        success: function (response) {

            if( response.respuesta ) {
                let imgView = (response.vigenciaId == 1)? 'lock':'no_encryption';
                let txtView = (response.vigenciaId == 1)? 'Desactivar': ( (response.vigenciaId == 2)? 'Activar':'' );
                //Guardado
                if( bandera == 'Save' ){
                    $("#search").append('<tr id="tr_' + response.uuid + '">' +
                        '<td>'+ response.id +'</td>' +
                        '<td>'+ response.nombre +'</td>' +
                        '<td>'+ response.descripcion +'</td>' +
                        '<td>'+ response.vigencia +'</td>' +
                        '<td>' +
                        '<a id="btn_changer_cat" class="btn btn-secondary btn-sm" data-uuid="' + response.uuid + '" href="#"><i class="material-icons btn__icon--left">'+ imgView +'</i>' + txtView + '</a> ' +
                        '<a id="btn_edit_cat" class="btn btn-primary btn-sm" data-uuid="' + response.uuid + '" href="#"><i class="material-icons btn__icon--left">edit</i>Editar</a> ' +
                        '</td></tr>');
                }
                //Editar
                else{
                    $("#tr_"+response.uuid).html('<td>'+ response.id +'</td>' +
                        '<td>'+ response.nombre +'</td>' +
                        '<td>'+ response.descripcion +'</td>' +
                        '<td>'+ response.vigencia +'</td>' +
                        '<td>' +
                        '<a id="btn_changer_cat" class="btn btn-secondary btn-sm" data-uuid="' + response.uuid + '" href="#"><i class="material-icons btn__icon--left">'+ imgView +'</i>' + txtView + '</a> ' +
                        '<a id="btn_edit_cat" class="btn btn-primary btn-sm" data-uuid="' + response.uuid + '"  href="#"><i class="material-icons btn__icon--left">edit</i>Editar</a> ' +
                        '</td>');
                }
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
