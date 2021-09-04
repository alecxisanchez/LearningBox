@extends('template.template')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Editar perfil</li>
    </ol>
    <h1 class="h2">Editar Perfil</h1>

    <div class="card">
        <ul class="nav nav-tabs nav-tabs-card">
            <li class="nav-item">
                <a class="nav-link active" href="#first" data-toggle="tab">Perfil</a>
            </li>
        </ul>
        <div class="tab-content card-body">
            <div class="tab-pane active" id="first">
                <form action="#" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label form-label">Nombre</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nombre completo" value="{{ $nombre }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="material-icons md-18 text-muted">mail</i>
                                    </div>
                                </div>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Correo eléctronico" value="{{ $email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label form-label">Cambiar contraseña</label>
                        <div class="col-sm-6 col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="material-icons md-18 text-muted">lock</i>
                                    </div>
                                </div>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa nueva contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6 col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="material-icons md-18 text-muted">lock</i>
                                    </div>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirma nueva contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-3">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <button type="button" name="guardar_cambios" id="guardar_cambios" class="btn btn-success" data-route="{{ route('usuarios.update', ['usuario' => \Auth::user()->tr_usu_id]) }}">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/sitio/usuarios.js') }}"></script>
    <script>
        $(function () {
            Usuarios.guardarCambiosPerfil();
        });
    </script>
@endpush
