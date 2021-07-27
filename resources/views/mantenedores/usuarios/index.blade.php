@extends('template.template')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">GRUD Componentes</li>
        <li class="breadcrumb-item">Mantenedor</li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>

    <h1 class="h2">Usuarios</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Requests Table -->
                    <div class="card shadow p-3 mt-2 table-responsive">
                        <div  style="text-align: center;">
                            <a id="btn_agregar_usu" class="btn btn-primary btn-sm"><i class="material-icons">add</i></a>
                            {{--<button id="btn_agregar_cur" type="button" class="btn btn-warning">Agregar</button>--}}
                        </div>
                        <table id="table_bandeja" class="table table-striped table__bg">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Acciónes</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($lstUsuarios as $item)
                                    <tr id="tr_{{ $item->tr_uuid }}">
                                        <td>{{ $item->tr_usu_id }}</td>
                                        <td>{{ $item->tr_usu_nombre }}</span></td>
                                        <td>{{ $item->tr_usu_mail }}</td>
                                        <td>{{ $lstEstados[($item->tr_usu_est_fk)-1]->tr_est_nombre }}</td>
                                        <td>{{ $lstVigencias[($item->tr_usu_vig_fk)-1]->tr_vig_nombre }}</td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" data-uuid="{{$item->tr_uuid}}" id="btn_changer_usu" href="#"><i class="material-icons btn__icon--left">{{ ( $item->tr_usu_vig_fk == App\Constantes\Constante::VIGENTE) ? 'lock' : 'no_encryption'}}</i>{{ ( $item->tr_usu_vig_fk == App\Constantes\Constante::VIGENTE)? 'Desactivar' : (( $item->tr_usu_vig_fk == App\Constantes\Constante::NO_VIGENTE)? 'Activar': '')}}</a>
                                            <a class="btn btn-primary btn-sm" data-uuid="{{$item->tr_uuid}}" id="btn_edit_usu" href="#"><i class="material-icons btn__icon--left">edit</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- End Requests Table -->
                </div>
            </div>
        </div>
    </div>
@stop
<!-- Modal -->
@push('modals')
    <div class="modal fade" id="Modal_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Usuario</h4>
                    <button type="button"
                            class="close text-white"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="banderaAccion" type="hidden" value="">
                    <input id="uuid" type="hidden" value="">
                    <div class="form-group row">
                        <label for="nombre_usurio" class="col-sm-3 col-form-label form-label">* Nombre : </label>
                        <div class="col-sm-8 col-md-8">
                            <input id="nomb_usu" type="text" class="form-control" value="" size="30">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion_usuario" class="col-sm-3 col-form-label form-label">* Descripción :</label>
                        <div class="col-sm-8 col-md-8">
                            <textarea id="desc_usu" rows="3" cols="50" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado_usuario" class="col-sm-3 col-form-label form-label">* Estado :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="edo_usu" class="custom-control custom-select form-control">
                                <option value="-99" selected>--- Seleccione ---</option>
                                @foreach($lstEstados as $item)
                                    <option value="{{ $item->tr_est_id }}"> {{ $item->tr_est_id }} - {{ $item->tr_est_nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vigencia_usuario" class="col-sm-3 col-form-label form-label">* Vigencia :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="vig_usu" class="custom-control custom-select form-control">
                                <option value="-99" selected>--- Seleccione ---</option>
                                @foreach($lstVigencias as $item)
                                    <option value="{{ $item->tr_vig_id }}"> {{ $item->tr_vig_id }} - {{ $item->tr_vig_nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="btn_save_usu" value=""></button>
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
    <script src="{{ asset('assets/js/mantenedor/man-usuarios.js') }}"></script>

@endpush
