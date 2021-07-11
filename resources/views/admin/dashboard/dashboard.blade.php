@extends('admin.template')

@section('content')
{{--El contenido que existia aqui esta en dashboard contenido.blade.php OK--}}
@stop

@push('scripts')
    <!-- Global Settings -->
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>

    <!-- Moment.js -->
    <script src="{{ asset('admin/assets/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/moment-range.js') }}"></script>

    <!-- Chart.js -->
    {{--<script src="{{ asset('admin/assets/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chartjs.js') }}"></script>--}}

    <!-- Student Dashboard Page JS -->
    <!-- <script src="assets/js/chartjs-rounded-bar.js"></script> -->
    {{--<script src="{{ asset('admin/assets/js/page.student-dashboard.js') }}"></script>--}}
@endpush
