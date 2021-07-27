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
            {"data": "categoria"},
            {"data": "vigencia"},
            {"data": "accion"},
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
                '</select> Cursos',
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
//***********************************//
//**** boton de consultar grilla ****//
//***********************************//
$('body').on('click', '#btn_bus_grilla', function() {
    let campo_filtro = $('#campo_fil_cat').val();
    if( campo_filtro != '-99' ){
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/cursos/filter",
            data: {id:campo_filtro},
            contentType: "application/json; charset=utf-8",
            dataType: "JSON",
            cache: false,
            beforeSend: function (xhr) {
                $("#btn_bus_grilla").attr("disabled", true);
                table_bandeja.clear().draw();
                loading = Swal.fire({
                    title: "Espere por favor...",
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    onOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function (data) {
                loading.close();
                table_bandeja.clear().draw();
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        let lista = data[i];
                        table_bandeja.row.add({
                            "numero": lista.numero,
                            "nombre": lista.nombre,
                            "descripcion": lista.descripcion,
                            "categoria": lista.categoria,
                            "vigencia": lista.vigencia,
                            "accion": '<a id="btn_edit_cur" data-uuid="' + lista.uuid + '"  href="#" class="btn btn-primary btn-sm"><i class="material-icons btn__icon--left">edit</i></a>',
                        });
                    }
                    table_bandeja.draw();
                }
            },
            complete: function () {
                $("#btn_bus_grilla").attr("disabled", false);
            }

        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>Debe seleccionar una Categoria.</p>'
        })
    }
});

//***********************************//
//**** boton de limpiar grilla ****//
//***********************************//
$('body').on('click', '#btn_lim_grilla', function() {
    $('#campo_fil_cat').val('-99');
});

//*******************************//
//**** Agregar una Curso ****//
//*******************************//
$('body').on('click', '#btn_agregar_cur', function() {

    //Limpio los campos del modal
    $('#nomb_cur').val('');
    $('#desc_cur').val('');
    $('#banderaAccion').val('Save');
    $('#btn_save_cur').text('Guardar');
    $('#uuid').val('');
    $('#Modal_Curso').modal('show');
});

//**************************//
//**** Editar Curso ****//
//**************************//
$('body').on('click', '#btn_edit_cur', function() {

    let campoUUID = $(this).attr("data-uuid");
    $('#banderaAccion').val('Edit');
    $('#uuid').val(campoUUID);
    $.ajax({
        url: "http://127.0.0.1:8000/curso/search",
        type: "GET",
        data: { "uuid":campoUUID },
        cache: false,

        success: function (response) {
            if( response.respuesta ) {
                $('#btn_save_cur').text('Editar');
                $('#cat_cur').val(response.categoria);
                $('#nomb_cur').val(response.nombre);
                $('#desc_cur').val(response.descripcion);
                $('#vig_cur').val(response.vigenciaId);
                $('#edo_cur').val(response.estadoId);
                $('#Modal_Curso').modal('show');
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

//***********************************//
//**** boton de agregar / Editar ****//
//***********************************//
$('body').on('click', '#btn_save_cur', function() {

    let camp_nomb; let camp_desc; let camp_est;
    let camp_vig; let camp_bandera; let camp_uuid;
    let camp_cat;
    camp_cat = $('#cat_cur').val();
    camp_nomb = $('#nomb_cur').val();
    camp_desc = $('#desc_cur').val();
    camp_est = $('#edo_cur').val();
    camp_vig = $('#vig_cur').val();
    camp_bandera = $('#banderaAccion').val();
    camp_uuid = $('#uuid').val();
    //validamos solo campos obligatorios
    if( camp_nomb == '-99'){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>El Campo Categoria No esta seleccionado.</p>'
        })
    }
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
        formData.append("categoria", camp_cat );
        formData.append("nombre", camp_nomb );
        formData.append("descripcion", camp_desc );
        formData.append("estado", camp_est );
        formData.append("vigencia", camp_vig );
        formData.append("banderaAccion", camp_bandera );
        formData.append("uuid", camp_uuid );

        $.ajax({
            url: "http://127.0.0.1:8000/curso/save",
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
                    $('#Modal_Curso').modal('hide');
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
//************************************//
//*** Refesh grilla, luego Guardar ***//
//************************************//
function refresh_grilla(id,bandera) {

    $.ajax({
        url: "http://127.0.0.1:8000/curso/refesh",
        type: "GET",
        data: {"id":id},
        cache: false,

        success: function (response) {

            if( response.respuesta ) {
                //let imgView = (response.vigenciaId == 1)? 'lock':'no_encryption';
                //let txtView = (response.vigenciaId == 1)? 'Desactivar': ( (response.vigenciaId == 2)? 'Activar':'' );
                //Guardado
                if( bandera == 'Save' ){
                    $("#search").append('<tr id="tr_' + response.uuid + '">' +
                        '<td>'+ response.id +'</td>' +
                        '<td>'+ response.nombre +'</td>' +
                        '<td>'+ response.descripcion +'</td>' +
                        '<td>'+ response.categoria +'</td>' +
                        '<td>'+ response.vigencia +'</td>' +
                        '<td>' +
                        '<a id="btn_edit_cur" class="btn btn-primary btn-sm" data-uuid="' + response.uuid + '" href="#"><i class="material-icons btn__icon--left">edit</i></a> ' +
                        '</td></tr>');
                }
                //Editar
                else{
                    $("#tr_"+response.uuid).html('<td>'+ response.id +'</td>' +
                        '<td>'+ response.nombre +'</td>' +
                        '<td>'+ response.descripcion +'</td>' +
                        '<td>'+ response.categoria +'</td>' +
                        '<td>'+ response.vigencia +'</td>' +
                        '<td>' +
                        '<a id="btn_edit_cur" class="btn btn-primary btn-sm" data-uuid="' + response.uuid + '"  href="#"><i class="material-icons btn__icon--left">edit</i></a> ' +
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
