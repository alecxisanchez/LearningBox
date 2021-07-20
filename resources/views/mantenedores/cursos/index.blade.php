@extends('template.template')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">GRUD Componentes</li>
        <li class="breadcrumb-item">Mantenedor</li>
        <li class="breadcrumb-item active">Cursos</li>
    </ol>

    <h1 class="h2">Cursos</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <h4 class="card-title">Agregar Cursos</h4>
                    <p>Al hacer Click en el boton "<strong>Agregar</strong>", Se deplegara una modal en el cual podras adicionar un Curso.</p>
                    <button type="button" class="btn btn-warning" id="btn_agregar_cat">
                        Agregar
                    </button>
                </div>
                <div class="col-lg-9">
                    <div class="form-group row">
                        <label for="vigencia_categoria" class="col-sm-3 col-form-label form-label">Categoria :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="campo_fil_cat" class="custom-control custom-select form-control">
                                <option value="-99" selected>--Seleccione--</option>
                                @foreach($lstCategorias as $item)
                                    <option value="{{ $item->tr_cat_id }}">{{ $item->tr_cat_id }} - {{ $item->tr_cat_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex">
                            <button id="btn_bus_grilla" type="button" class="btn btn-primary ml-2">Buscar</button>
                            <button id="btn_lim_grilla" type="button" class="btn btn-secondary ml-2">Limpiar</button>
                        </div>
                    </div>
                    <!-- Requests Table -->
                    <div class="card shadow p-3 mt-2 table-responsive">
                        <table id="table_bandeja" class="table table-striped table__bg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripciòn</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Acciónes</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div><!-- End Requests Table -->
                </div>
            </div>
        </div>
    </div>
@stop
@push('modals')
    <!-- Modal -->
    <div class="modal fade" id="Modal_Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="banderaAccion" type="hidden" value="">
                    <input id="uuid" type="hidden" value="">
                    <div class="form-group row">
                        <label for="nombre_categoria" class="col-sm-3 col-form-label form-label">* Nombre : </label>
                        <div class="col-sm-6 col-md-6">
                            <input id="nomb_cat" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion_categoria" class="col-sm-3 col-form-label form-label">* Descripción :</label>
                        <div class="col-sm-6 col-md-6">
                            <textarea id="desc_cat" name="desc_cat" rows="3" cols="50" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado_categoria" class="col-sm-3 col-form-label form-label">* Estado :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="edo_cat" class="custom-control custom-select form-control">
                                @foreach($lstEstados as $item)
                                    <option value="{{ $item->tr_est_id }}">{{ $item->tr_est_id }}-{{ $item->tr_est_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vigencia_categoria" class="col-sm-3 col-form-label form-label">* Vigencia :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="vig_cat" class="custom-control custom-select form-control">
                                @foreach($lstVigencias as $item)
                                    <option value="{{ $item->tr_vig_id }}">{{ $item->tr_vig_id }}-{{ $item->tr_vig_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-left: 20px;">
                        <p>Nota:</p>
                        <p><br>* Representa los campos que son obligatorios &nbsp; </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_save_cat" value=""></button>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <!-- List.js -->
    <script src="{{ asset('sitio/assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('sitio/assets/js/list.js') }}"></script>
    <!-- Tables -->
    <script src="{{ asset('sitio/assets/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('sitio/assets/js/check-selected-row.js') }}"></script>
    <!-- Extra -->
    <script src="{{ asset('assets/js/mantenedor/man-cursos.js') }}"></script>

@endpush
