@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.users')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <section class="users-section">
        @include('admin.users.card-view')
    </section>
</div>
<!-- #/ container -->
@endsection
@section('script')
<script src="{{url('resources/views/admin/users/users.js')}}"></script>
@endsection
