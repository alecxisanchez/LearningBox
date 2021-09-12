@extends('template.template')

@section('content')
    <link rel="stylesheet" href="{!! asset('assets/ComponenteArchivos.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">GRUD Componentes</li>
        <li class="breadcrumb-item">Mantenedor</li>
        <li class="breadcrumb-item active">Archivos</li>
    </ol>

    <h1 class="h2">Archivos</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Requests Table -->
                    <div class="card shadow p-3 mt-2 table-responsive">
                        <div  style="text-align: center;">
                            <a id="btn_agregar_arch" class="btn btn-primary btn-primary-ac btn-sm"><i class="material-icons">add</i></a>
                        </div>
                        <table id="table_bandeja" class="table table-striped table__bg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Archivos</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Acciónes</th>
                            </tr>
                            </thead>
                            <tbody id="search">
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
    <div class="modal fade" id="Modal_Archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header bg-primary bg-primary-ac">
                    <h4 class="modal-title text-white">Archivo</h4>
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
                    @include('componente.include.componenteArchivo')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success btn-primary-ac" id="btn_save_arch" value=""></button>
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
    <script src="{{ asset('assets/js/mantenedor/man-archivos.js') }}"></script>
    <script src="{{ asset('assets/js/componenteArchivo.js') }}"></script>
@endpush
