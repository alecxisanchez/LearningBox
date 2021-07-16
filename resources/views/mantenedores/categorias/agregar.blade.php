@extends('template.template')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">Administracion</li>
        <li class="breadcrumb-item">Mantenedor</li>
        <li class="breadcrumb-item active">Categorias</li>
    </ol>

    <h1 class="h2">Categorias</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <h4 class="card-title">Agregar Categorias</h4>
                    <p>Al hacer Click en el boton "Agregar", Se deplegara una modal en el cual podras adicionar una categoria.</p>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_Categoria">
                    Agregar
                    </button>
                </div>
                <div class="col-lg-9">

                    <div class="table-responsive border-bottom"
                         data-toggle="lists"
                         data-lists-values='["js-lists-values-employee-name"]'>

                        <div class="search-form search-form--light mb-3">
                            <input type="text" class="form-control search" placeholder="Search">
                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                        </div>

                        <table class="table mb-0" id="tbl_cat">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                           {{--     <th>Estado</th>--}}
                                <th>Vigencia</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list" id="search">
                            @foreach($lstCategorias as $item)
                            <tr>
                                <td>{{ $item->tr_cat_id }}</td>
                                <td><span class="js-lists-values-employee-name">{{ $item->tr_cat_nombre }}</span></td>
                                <td>{{ $item->tr_cat_descripcion }}</td>
                               {{-- <td>{{ $lstEstados[$item->tr_cat_estado]->tr_est_nombre }}</td>--}}
                                <td>{{ $lstVigencias[$item->tr_cat_vigencia]->tr_vig_nombre }}</td>
                                <td><a href="#" class="btn btn-primary btn-sm"><i class="material-icons btn__icon--left">edit</i>Editar</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

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
                    <h5 class="modal-title" id="ModalLabel">Agregar Categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    <div class="form-group row" style="padding-left: 20px;">
                        <p><span style="color:blue;font-weight:bold">Nota: </span><br><span style="color:darkolivegreen;font-weight:bold"> * </span> Indica, que estos campos son obligatorios a la opción <span style="color:darkolivegreen;font-weight:bold">guardar</span>.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_save_cat">Guardar</button>
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
    <script src="{{ asset('assets/js/mantenedor/man-categorias.js') }}"></script>
@endpush
