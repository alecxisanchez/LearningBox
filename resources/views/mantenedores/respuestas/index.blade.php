@extends('template.template')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">GRUD Componentes</li>
        <li class="breadcrumb-item">Mantenedor</li>
        <li class="breadcrumb-item active">Respuestas</li>
    </ol>

    <h1 class="h2">Respuestas</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Requests Table -->
                    <div class="card shadow p-3 mt-2 table-responsive">
                        <div  style="text-align: center;">
                            <a id="btn_agregar_resp" class="btn btn-primary btn-sm"><i class="material-icons">add</i></a>
                        </div>
                        <table id="table_bandeja" class="table table-striped table__bg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Respuesta</th>
                                <th scope="col">Descripciòn Respuesta</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Acciónes</th>
                            </tr>
                            </thead>
                            <tbody id="search">
                            @foreach($lstRespuestas as $item)
                                <tr id="tr_{{ $item->tr_uuid }}">
                                    <td>{{ $item->tr_resp_id }}</td>
                                    <td>{{ $item->tr_resp_nombre }}</td>
                                    <td>{{ $item->tr_resp_descripcion }}</td>
                                    <td>{{ $lstVigencias[($item->tr_resp_vig_fk)-1]->tr_vig_nombre }}</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" data-uuid="{{$item->tr_uuid}}" id="btn_changer_resp" href="#"><i class="material-icons btn__icon--left">{{ ( $item->tr_resp_vig_fk == App\Constantes\Constante::VIGENTE) ? 'lock' : 'no_encryption'}}</i>{{ ( $item->tr_resp_vig_fk == App\Constantes\Constante::VIGENTE)? 'Desactivar' : (( $item->tr_resp_vig_fk == App\Constantes\Constante::NO_VIGENTE)? 'Activar': '')}}</a>
                                        <a class="btn btn-primary btn-sm" data-uuid="{{$item->tr_uuid}}" id="btn_edit_resp" href="#"><i class="material-icons btn__icon--left">edit</i>Editar</a>
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
    <div class="modal fade" id="Modal_Respuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Respuesta</h4>
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
                        <label for="nombre_respuesta" class="col-sm-3 col-form-label form-label">* Respuesta : </label>
                        <div class="col-sm-6 col-md-6">
                            <input id="nomb_resp" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion_respuesta" class="col-sm-3 col-form-label form-label">* Descripción :</label>
                        <div class="col-sm-6 col-md-6">
                            <textarea id="desc_resp" rows="3" cols="50" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado_respuesta" class="col-sm-3 col-form-label form-label">* Estado :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="edo_resp" class="custom-control custom-select form-control">
                                <option value="-99" selected>--- Seleccione ---</option>
                                @foreach($lstEstados as $item)
                                    <option value="{{ $item->tr_est_id }}">{{ $item->tr_est_id }} - {{ $item->tr_est_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vigencia_respuesta" class="col-sm-3 col-form-label form-label">* Vigencia :</label>
                        <div class="col-sm-6 col-md-4">
                            <select id="vig_resp" class="custom-control custom-select form-control">
                                <option value="-99" selected>--- Seleccione ---</option>
                                @foreach($lstVigencias as $item)
                                    <option value="{{ $item->tr_vig_id }}">{{ $item->tr_vig_id }} - {{ $item->tr_vig_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="btn_save_resp" value=""></button>
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
    <script src="{{ asset('assets/js/mantenedor/man-respuestas.js') }}"></script>
@endpush
