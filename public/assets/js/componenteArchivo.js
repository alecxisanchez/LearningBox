//----------Manejo de archivos
var idattached = 2;
let $form = $('.box');
let droppedFiles = false;
var dFiles = [];

$(document).ready( function() {

    $('#file').on( 'change', function( e ) {
        loadFiles( e.target.files );
    });

    $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
    })
        .on('dragover dragenter', function() {
            $form.addClass('is-dragover');
        })
        .on('dragleave dragend drop', function() {
            $form.removeClass('is-dragover');
        })
});
//-----------------------
function loadFiles (files) {

    let valid_types = ["image/jpg", "image/jpeg", "image/gif", "image/png", "application/pdf", ".csv", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.ms-excel"];
    let valid = validarTipo();
    if(valid[0] ==  1) {
        //obtener razon seleccionada y opcional texto
        let campo = $('input:radio[name=customRadio]:checked').attr('id');
        let idTipo = $("#"+campo).val();
        let valorDecripcionTipo = $("#"+campo).data('descripcion');
        let superaMax = 0;

        for (let i = 0, l = files.length; i < l; i++) {
            if (valid_types.includes(files[i].type) === true) {
                if( files[i].size < 2097152 ) {
                    files[i]['idTipo'] = idTipo;
                    files[i]['descripcionTipo'] = valorDecripcionTipo;
                    dFiles.push(files[i]);
                }else {
                    superaMax = 1;
                }
            }
        }
        if( superaMax ){
            Swal.fire({
                icon: 'error',
                text: "se supera el maximo permitido , 2 MB !",
            });
        }else {
            loadPreviews();
            desactivarTipos();
        }
    }
    else{
            Swal.fire({
                icon: 'error',
                text: valid[1],
            });
        }
}
//-----------------------
function loadPreviews() {

    let divPreview = $('#imgPreview');
    divPreview.html("<ul name='listaFiles' id='listaFiles' class='list-group list-group-flush'></ul>");
    if (dFiles.length > 0) {
        for (let i = 0, l = dFiles.length; i < l; i++) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#listaFiles").append('<li class="list-group-item px-0"><i class="mdi mdi-paperclip">'+dFiles[i].name+ ' ( '+dFiles[i].descripcionTipo+' ) '+'</i>&nbsp;<a name="elemBorrar'+i+'" id="elemBorrar'+i+'" data-id="'+i+'" onclick="borrarArchivo(this)" href="#"><i className="material-icons btn__icon--left">delete</i></a></li>');
            }
            reader.readAsDataURL(dFiles[i]); // convert to base64 string
        }
    }
}
//-----------------------
function borrarArchivo(obj){

    let idBorrar = obj.dataset.id;
    let banBorrado = $('#elemBorrar'+idBorrar).hasClass('disabled');
    if(!banBorrado) {
        dFiles.splice(idBorrar, 1);
        //preguntar si no hay mas archivos habilita bloqueo de razon
        if (dFiles.length == 0) {
           habilitaTipos();
        }
        loadPreviews();
    }
}
