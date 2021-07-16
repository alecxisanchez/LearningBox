@extends('template.template')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item">Componentes</li>
        <li class="breadcrumb-item active">Tablas</li>
    </ol>

    <h1 class="h2">Tables</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Toggle Checkboxes</h4>
                    <p>A tiny plugin which adds the ability to toggle all checkboxes within a table.</p>
                </div>
                <div class="col-lg-8">

                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th style="width: 18px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                                        <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                    </div>
                                </th>

                                <th>Employee</th>

                                <th style="width: 100px;">Active</th>
                                <th style="width: 51px;">Earnings</th>
                                <th style="width: 24px;"></th>
                            </tr>
                            </thead>
                            <tbody class="list" id="staff">

                            <tr class="selected">

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" checked="" id="customCheck1_1">
                                        <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <span class="js-lists-values-employee-name">Kalum Atherton</span>
                                        </div>
                                    </div>
                                </td>
                                <td><small class="text-muted">3 days ago</small></td>
                                <td>&dollar;12,402</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_2">
                                        <label class="custom-control-label" for="customCheck1_2"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_sharina-mae-agellon-377466-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <span class="js-lists-values-employee-name">Helen Mcdaniel</span>
                                        </div>
                                    </div>
                                </td>

                                <td><small class="text-muted">2 days ago</small></td>
                                <td>&dollar;48,108</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_3">
                                        <label class="custom-control-label" for="customCheck1_3"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_karl-s-973833-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <span class="js-lists-values-employee-name">Karim Hicks</span>
                                        </div>
                                    </div>

                                </td>

                                <td><small class="text-muted">1 hour ago</small></td>
                                <td>&dollar;11,802</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_4">
                                        <label class="custom-control-label" for="customCheck1_4"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_90-jiang-640827-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <span class="js-lists-values-employee-name">Clifford Burgess</span>
                                        </div>
                                    </div>

                                </td>

                                <td><small class="text-muted">2 hours ago</small></td>
                                <td>&dollar;84,401</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Search</h4>
                    <p>Add search functionality to your tables with List.js. Please read the <a href="http://listjs.com/" target="_blank">official plugin documentation</a> for a full list of options.</p>
                </div>
                <div class="col-lg-8">

                    <div class="table-responsive border-bottom"
                         data-toggle="lists"
                         data-lists-values='["js-lists-values-employee-name"]'>

                        <div class="search-form search-form--light mb-3">
                            <input type="text" class="form-control search" placeholder="Search">
                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                        </div>

                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Employee</th>
                                <th style="width: 100px;">Active</th>
                                <th style="width: 51px;">Earnings</th>
                                <th style="width: 24px;"></th>
                            </tr>
                            </thead>
                            <tbody class="list" id="search">
                            <tr>
                                <td>
                                    <span class="js-lists-values-employee-name">Kalum Atherton</span>
                                </td>
                                <td><small class="text-muted">3 days ago</small></td>
                                <td>&dollar;12,402</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="js-lists-values-employee-name">Helen Mcdaniel</span>
                                </td>
                                <td><small class="text-muted">2 days ago</small></td>
                                <td>&dollar;48,108</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="js-lists-values-employee-name">Karim Hicks</span>
                                </td>
                                <td><small class="text-muted">1 hour ago</small></td>
                                <td>&dollar;11,802</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="js-lists-values-employee-name">Clifford Burgess</span>
                                </td>
                                <td><small class="text-muted">2 hours ago</small></td>
                                <td>&dollar;84,401</td>
                                <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Sort Columns</h4>
                    <p>Add sorting functionality to your tables with by List.js. Please read the <a href="http://listjs.com/"
                                                                                                    target="_blank">official plugin documentation</a> for a full list of options.</p>
                </div>
                <div class="col-lg-8">

                    <div data-toggle="lists" data-lists-values='["js-lists-values-employee-name", "js-lists-values-employee-title"]' class="table-responsive border-bottom">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th colspan="2">
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-name">Employee name</a>
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-title">Employee title</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Jenell D. Matney</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Founder and CEO</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_sharina-mae-agellon-377466-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Sherri J. Cardenas</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Software Engineer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_90-jiang-640827-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Joseph S. Ferland</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Web Designer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="{{ asset('sitio/assets/images/256_rsz_karl-s-973833-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Bryan K. Davis</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <!-- List.js -->
    <script src="{{ asset('sitio/assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('sitio/assets/js/list.js') }}"></script>

    <!-- Tables -->
    <script src="{{ asset('sitio/assets/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('sitio/assets/js/check-selected-row.js') }}"></script>
@endpush
