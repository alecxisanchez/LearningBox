@extends('template.template')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Cursos</a></li>
        <li class="breadcrumb-item active">{{ $cursoDetalle->tr_cur_nombre }}</li>
    </ol>
    <h1 class="h2">{{ $cursoDetalle->tr_cur_nombre }}</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                </div>
                <div class="card-body">
                    {{ $cursoDetalle->tr_cur_descripcion }}
                </div>
            </div>

            <!-- Lessons -->
            @if (!empty($modulosUnidades))
                <ul class="card list-group list-group-fit">
                @foreach($modulosUnidades as $moduloUnidad)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">{{ $loop->index + 1 }}.</div>
                            </div>
                            <div class="media-body">
                                <a href="#">{{ $moduloUnidad->tr_mod_nombre }}</a>
                            </div>
                        </div>
                        @if (!empty($moduloUnidad->unidades))
                            <ul class="card list-group list-group-fit">
                                @foreach($moduloUnidad->unidades as $unidad)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">{{ $loop->index + 1 }}.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="{{ route('detalles_unidad', [$unidad->tr_uni_id]) }}">{{ $unidad->tr_uni_nombre }}</a>
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <p>
                        <a href="#" class="btn btn-success btn-block flex-column">
                            Get All Courses
                            <strong>&dollar;9 / month</strong>
                        </a>
                    </p>
                    <div class="page-separator">
                        <div class="page-separator__text">or</div>
                    </div>
                    <a href="#" class="btn btn-white btn-block flex-column">
                        Purchase Course
                        <strong>&dollar;25 USD</strong>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <img src="{{ asset('sitio/assets/images/people/110/guy-6.jpg') }}" alt="About Adrian" width="50" class="rounded-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="card-title"><a href="#">Adrian Demian</a></h4>
                            <p class="card-subtitle">Instructor</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p>
                    <a href="" class="btn btn-light"><i class="fab fa-facebook"></i></a>
                    <a href="" class="btn btn-light"><i class="fab fa-twitter"></i></a>
                    <a href="" class="btn btn-light"><i class="fab fa-github"></i></a>
                </div>
            </div>
            <div class="card">
                <ul class="list-group list-group-fit">
                    <li class="list-group-item">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">assessment</i>
                            </div>
                            <div class="media-body">
                                Beginner
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">schedule</i>
                            </div>
                            <div class="media-body">
                                2 <small class="text-muted">hrs</small> &nbsp; 26 <small class="text-muted">min</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ratings</h4>
                </div>
                <div class="card-body">
                    <div class="rating">
                        @csrf
                        <a href="#" data-route="{{ route('rating_curso', [$cursoDetalle->tr_cur_id, 1]) }}" class="guardar_rating"><i class="material-icons">{{ $cursoRating >= 1  ? 'star' : 'star_border' }}</i></a>
                        <a href="#" data-route="{{ route('rating_curso', [$cursoDetalle->tr_cur_id, 2]) }}" class="guardar_rating"><i class="material-icons">{{ $cursoRating >= 2  ? 'star' : 'star_border' }}</i></a>
                        <a href="#" data-route="{{ route('rating_curso', [$cursoDetalle->tr_cur_id, 3]) }}" class="guardar_rating"><i class="material-icons">{{ $cursoRating >= 3  ? 'star' : 'star_border' }}</i></a>
                        <a href="#" data-route="{{ route('rating_curso', [$cursoDetalle->tr_cur_id, 4]) }}" class="guardar_rating"><i class="material-icons">{{ $cursoRating >= 4  ? 'star' : 'star_border' }}</i></a>
                        <a href="#" data-route="{{ route('rating_curso', [$cursoDetalle->tr_cur_id, 5]) }}" class="guardar_rating"><i class="material-icons">{{ $cursoRating >= 5  ? 'star' : 'star_border' }}</i></a>
                    </div>
                    <small class="text-muted">{{ $cursoRatingCant }} ratings</small>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/sitio/rating.js') }}"></script>
    <script>
        $(function () {
            Rating.guardarRating();
        });
    </script>
@endpush
