@extends('template.template')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Cursos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalles_curso', [$unidadDetalles->tr_cur_id]) }}">{{ $unidadDetalles->tr_cur_nombre }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalles_curso', [$unidadDetalles->tr_cur_id]) }}">{{ $unidadDetalles->tr_mod_nombre }}</a></li>
        <li class="breadcrumb-item active">{{ $unidadDetalles->tr_uni_nombre }}</li>
    </ol>
    <h1 class="h2">{{ $unidadDetalles->tr_mod_nombre . ' : ' . $unidadDetalles->tr_cur_nombre }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                </div>
                <div class="card-body">
                    {{ $unidadDetalles->tr_uni_descripcion }}
                </div>
            </div>

            <!-- Lessons -->
            @if (!empty($unidadDetalles->ti_cont_uni_arc_fk))
                <ul class="card list-group list-group-fit">
                @foreach($unidadDetalles->ti_cont_uni_arc_fk as $unidadArc)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">{{ $loop->index + 1 }}.</div>
                            </div>
                            <div class="media-body">
                                <a href="#">{{ $unidadArc->tr_mod_nombre }}</a>
                            </div>
                        </div>
                        @if (!empty($unidadArc->unidades))
                            <ul class="card list-group list-group-fit">
                                @foreach($unidadArc->unidades as $unidad)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">{{ $loop->index + 1 }}.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="#">{{ $unidad->tr_uni_nombre }}</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop
