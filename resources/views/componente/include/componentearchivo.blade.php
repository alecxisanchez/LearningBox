<div class="row">
    <div class="col-12">

        <h5>Seleccione medio que indentifica los archivos</h5>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" id="tipo1" name="customRadio" class="custom-control-input" value="1" data-descripcion="Imagenes">
                <label class="custom-control-label" for="tipo1" >Imagenes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="tipo2" name="customRadio" class="custom-control-input" value="2" data-descripcion="Videos">
                <label class="custom-control-label" for="tipo2" >Videos</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="tipo3" name="customRadio" class="custom-control-input" value="3" data-descripcion="Pdf">
                <label class="custom-control-label" for="tipo3" >Pdf </label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="tipo4" name="customRadio" class="custom-control-input" value="4" data-descripcion="Documentos">
                <label class="custom-control-label" for="tipo4" >Documentos ( .xls .csv .ppt )</label>
            </div>
        </div>

    </div>
    <br>
    <div class="col-12">
        <h5>Adjunte Archivo(s) </h5>
    </div>
    <div class="col-12 col-md-6 pb-2">
        <div class="form-group container js " id="attachment" name="attachment">
            <div class="box has-advanced-upload">
                <div>
                    <div class="box__input">
                        <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 -30 50 80"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
                        <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="" accept="image/jpg, image/jpeg, image/gif, image/png, application/pdf, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <label id="fileLabel" for="file"><strong>Escoge un archivo, o arrástralo Aqui.</strong></label>
                        <button type="submit" class="box__button">Upload</button>
                    </div>
                    <div class="box__uploading">Uploading…</div>
                    <div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?" class="box__restart" role="button">Upload more?</a></div>
                    <div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?" class="box__restart" role="button">Try again!</a></div>
                    <input type="hidden" name="ajax" value="1">
                </div>
            </div>
            <div id="imgPreview"></div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="alert alert-primary" role="alert"><i class="mdi mdi-information"></i>
            En formato, pdf, word, jpg, png, tamaño máximo 2MB.
        </div>
    </div>
</div>
