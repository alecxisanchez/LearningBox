$(document).ready(function() {
    var table_bandeja = $('#table_bandeja').DataTable({
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
            {"data": "id"},
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "estado"},
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
                '</select> Usuarios',
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
//*******************************//
//**** Agregar una Curso ****//
//*******************************//
$('body').on('click', '#btn_agregar_usu', function() {

    //Limpio los campos del modal
    $('#nomb_usu').val('');
    $('#desc_usu').val('');
    $('#banderaAccion').val('Save');
    $('#btn_save_usu').text('Guardar');
    $('#uuid').val('');
    $('#Modal_Usuario').modal('show');
});
