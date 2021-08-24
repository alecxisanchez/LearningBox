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
            {"data": "curso"},
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

    let campo_filtro1 = $('#campo_fil_cat').val();
    let campo_filtro2 = $('#campo_fil_cur').val();

    if( campo_filtro1 != '-99' || campo_filtro2 != '-99'){

        if(campo_filtro1 != '-99') {

            if( campo_filtro2 != '-99'){

                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/modulos/filter",
                    data: { id_cat:campo_filtro1,id_cur:campo_filtro1 },
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
                                    "curso": lista.curso,
                                    "vigencia": lista.vigencia,
                                    "accion": "",
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
                    console.log(item);
                    $('#campo_fil_cur').append('<option>'+ item.tr_cur_id +' - '+ item.tr_cur_nombre +' </option>');
                });
            }
        }
    });
});




