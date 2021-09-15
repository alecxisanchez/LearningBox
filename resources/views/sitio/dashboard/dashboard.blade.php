@extends('template.template')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    </ol>

    <div class="media mb-headings align-items-center">
        <div class="media-body">
            <h1 class="h2">Mis Cursos</h1>
        </div>
        <div class="media-right">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
                <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
            </div>
        </div>
    </div>
    <div class="card-columns">
        @if ($userCourses->count())
            @foreach ($userCourses as $userCourse)
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ route('detalles_curso', [$userCourse->tr_cur_id]) }}">
                                    <img src="{{ asset('sitio/assets/images/vuejs.png') }}" alt="Card image cap" width="100" class="rounded">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title m-0"><a href="{{ route('detalles_curso', [$userCourse->tr_cur_id]) }}">{{ $userCourse->tr_cur_nombre }}</a></h4>
                                <small class="text-muted">{{ $userCourse->tr_cur_descripcion }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="progress rounded-0">
                        <div class="progress-bar progress-bar-striped bg-primary bg-primary-ac" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="#" class="btn btn-primary btn-sm">Continuar <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                    </div>
                </div>
            @endforeach
        @else
            <h3>De momento no has adquirido ningun curso.</h3>
        @endif
    </div>
    <br><br><br>
    <div class="media mb-headings align-items-center">
        <div class="media-body">
            <h1 class="h2">Cursos que te pueden interesar</h1>
        </div>
        <div class="media-right">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
                <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
            </div>
        </div>
    </div>
    <div class="card-columns">
        @if ($allCourses->count())
            @foreach ($allCourses as $allCourse)
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ route('detalles_curso', [$allCourse->tr_cur_id]) }}">
                                    <img src="{{ asset('sitio/assets/images/vuejs.png') }}" alt="Card image cap" width="100" class="rounded">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title m-0"><a href="{{ route('detalles_curso', [$allCourse->tr_cur_id]) }}">{{ $allCourse->tr_cur_nombre }}</a></h4>
                                <small class="text-muted">{{ $allCourse->tr_cur_descripcion }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="progress rounded-0">
                        <div class="progress-bar progress-bar-striped bg-primary bg-primary-ac" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="#" class="btn btn-primary btn-sm">Continuar <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                    </div>
                </div>
            @endforeach
        @else
            <h3>No tenemos cursos disponibles de momento.</h3>
        @endif
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
