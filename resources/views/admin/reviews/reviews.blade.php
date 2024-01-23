@extends('admin.theme.default')

@section('content')

<div class="row page-titles mx-0">

    <div class="col p-md-0">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>

            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.reviews')}}</a></li>

        </ol>

    </div>

</div>

<div class="container-fluid">



    <section class="reviews-section">

        @include('admin.reviews.card-view')

    </section>



</div>

@endsection

@section('script')

<script src="{{ url('resources/views/admin/reviews/reviews.js') }}"></script>

@endsection