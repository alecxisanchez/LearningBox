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
                '</select> Archivos',
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
//**** Agregar una Categoria ****//
//*******************************//
$('body').on('click', '#btn_agregar_arch', function() {

    //Limpio los campos del modal
    $('#nomb_cat').val('');
    $('#desc_cat').val('');
    //$('#vig_cat').val();
    //$('#est_cat').val();
    $('#banderaAccion').val('Save');
    $('#btn_save_arch').text('Guardar');
    $('#uuid').val('');
    $('#Modal_Archivo').modal('show');
});
//
function desactivarTipos(){
    //deshabilitar razon
    $("input[id^='tipo']").each(function( index,element ) {
        $("#tipo"+(index+1)).attr('disabled',true);
    });
}
//
function habilitaTipos(){
    //habilitar razon
    $("input[id^='tipo']").each(function( index,element ) {
        $("#tipo"+(index+1)).attr('disabled',false);
    });
}
//-----------
function validarTipo() {

    var arrayValidacion = [];
    if( $("input[name='customRadio']:radio").is(':checked'))
        {
            arrayValidacion.push(1,'');
        } else{
            arrayValidacion.push(0,'Debe Seleccionar un tipo de Archivos');
        }
    return arrayValidacion;
}
//***********************************//
//**** boton de agregar / Editar ****//
//***********************************//
$('body').on('click', '#btn_save_arch', function() {

    let campo = $('input:radio[name=customRadio]:checked').attr('id');
    let index = campo.replace('tipo','');
    let idTipo = $("#"+campo).val();
    let loading;
    var formData = new FormData();
    formData.append("_token", "{{ csrf_token() }}");
    formData.append("razon", idTipo);
    let fileInput = $("#file").attr("name");
    if (formData.has(fileInput)) {
        formData.delete(fileInput);
    }
    var tipoDocs = [];
    for (let i = 0, l = dFiles.length; i < l; i++) {
        tipoDocs.push(JSON.stringify({tipo:dFiles[i].idTipo}));
        formData.append('docs[]', dFiles[i]);
        formData.append('detalleDocs[]',tipoDocs[i])
    }
    $.ajax({
        //url: '{{asset("guardar_solicitud")}}',
        url: "http://127.0.0.1:8000/archivo/save",
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
