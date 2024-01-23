@extends('admin.theme.default')
@section('content')
    <link rel="stylesheet" type="text/css"
        href="{{ url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.bootstrap4.min.css') }}">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">{{ trans('labels.dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ trans('labels.report') }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('labels.report') }}</h4>

                        <form action="{{ URL::to('/admin/report') }}" class="my-3">
                            <div class="input-group col-md-12 pl-0">
                                <div class="input-group-append col-auto px-1">
                                    <input type="date" class="form-control rounded" name="startdate"
                                        @isset($_GET['startdate']) value="{{ $_GET['startdate'] }}" @endisset
                                        aria-label="{{ trans('labels.type_and_enter') }}" aria-describedby="basic-addon2"
                                        required>
                                </div>
                                <div class="input-group-append col-auto px-1">
                                    <input type="date" class="form-control rounded" name="enddate"
                                        @isset($_GET['enddate']) value="{{ $_GET['enddate'] }}" @endisset
                                        aria-label="{{ trans('labels.type_and_enter') }}" aria-describedby="basic-addon2"
                                        required>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded"
                                        type="submit">{{ trans('labels.fetch') }}</button>
                                </div>
                            </div>
                        </form>


                        @include('admin.orders.statistics')

                        <div class="table-responsive reportstable" id="table-display">
                            @include('admin.orders.orderstable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('storage/app/public/admin-assets/assets/excelbutton/3.1.3.jszip.min.js') }}"></script>
    <script src="{{ url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.html5.min.js') }}"></script>

    <script src="{{ url('resources/views/admin/orders/orders.js') }}"></script>
@endsection
