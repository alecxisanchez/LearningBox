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
                '</select> Modulos',
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

    let campo_filtro1 = $('#campo_fil_cat').val();
    let campo_filtro2 = $('#campo_fil_cur').val();
    console.log('valor1: '+campo_filtro1);
    console.log('valor2:'+campo_filtro2);

    if( campo_filtro1 != '-99' || campo_filtro2 != '-99'){

        if(campo_filtro1 != '-99') {

            if( campo_filtro2 != '-99'){

                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/modulos/filter",
                    data: { id_cat:campo_filtro1,id_cur:campo_filtro2 },
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
                                    "vigencia": lista.vigencia,
                                    "accion": '<a id="btn_edit_mod" data-uuid="' + lista.uuid + '" href="#" class="btn btn-primary btn-sm"><i class="material-icons btn__icon--left">edit</i></a>',
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
                    html: '<p>Debe seleccionar un Curso !!.</p>'
                })
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<p>Debe seleccionar una categoria !!.</p>'
            })
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>Debe seleccionar una categoria y un curso !!.</p>'
        })
    }

});
//***********************************//
//**** boton de limpiar grilla ****//
//***********************************//
$('body').on('click', '#btn_lim_grilla', function() {

    $('#campo_fil_cat').val('-99');
    $('#campo_fil_cur').val('-99');

});
//*******************************//
//**** Agregar una Curso ****//
//*******************************//
$('body').on('click', '#btn_agregar_mod', function() {

    //Limpio los campos del modal
    $('#nomb_mod').val('');
    $('#desc_mod').val('');
    $('#banderaAccion').val('Save');
    $('#btn_save_mod').text('Guardar');
    $('#uuid').val('');
    $('#Modal_Modulo').modal('show');
});
//**************************//
//**** Editar Curso ****//
//**************************//
$('body').on('click', '#btn_edit_mod', function() {

    let campoUUID = $(this).attr("data-uuid");
    $('#banderaAccion').val('Edit');
    $('#uuid').val(campoUUID);
    $.ajax({
        url: "http://127.0.0.1:8000/modulo/search",
        type: "GET",
        data: { "uuid":campoUUID },
        cache: false,

        success: function (response) {
            if( response.respuesta ) {
                $('#btn_save_mod').text('Editar');
                $('#cat_mod').val(response.categoria);
                search_curso(response.categoria);
                $('#nomb_mod').val(response.nombre);
                $('#desc_mod').val(response.descripcion);
                $('#vig_mod').val(response.vigenciaId);
                $('#edo_mod').val(response.estadoId);
                $('#Modal_Modulo').modal('show');
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
//*******************************//
//**** Agregar una Curso ****//
//*******************************//
$('body').on('change', '#campo_fil_cat', function() {
    let campo_filtro = $('#campo_fil_cat').val();
    $('#campo_fil_cur').empty();
    $('#campo_fil_cur').append('<option value="-99"> --- Seleccione --- </option>');
    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/modulos/search_categoria',
        data: {id: campo_filtro},
        success: function(response){
            if(response.respuesta){
                response.data.forEach((item, index) => {
                    $('#campo_fil_cur').append('<option value="'+item.tr_cur_id+'">'+ item.tr_cur_id +' - '+ item.tr_cur_nombre +' </option>');
                });
            }
        }
    });
});
function search_curso($cat){
    let campo_filtro = $cat;
    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/modulos/search_categoria',
        data: {id: campo_filtro},
        success: function(response){
            if(response.respuesta){
                response.data.forEach((item, index) => {
                    $('#cur_mod').append('<option selected value="'+item.tr_cur_id+'">'+ item.tr_cur_id +' - '+ item.tr_cur_nombre +' </option>');
                });
            }
        }
    });
}
//***********************************//
//**** boton de agregar / Editar ****//
//***********************************//
$('body').on('click', '#btn_save_mod', function() {

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




