@extends('admin.theme.default')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/admin/home') }}">{{ trans('labels.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ trans('labels.items') }}</a></li>
            </ol>
            <a href="{{URL::to('/admin/item/add') }}" class="btn btn-primary">{{ trans('labels.add_new') }}</a>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 float-right my-4">
                    <form action="{{URL::to('admin/item')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded" name="search" @isset($_GET['search']) value="{{$_GET['search']}}" @endisset placeholder="{{trans('labels.type_and_enter')}}" aria-label="{{trans('labels.type_and_enter')}}" aria-describedby="basic-addon2">
                            <div class="input-group-append px-1">
                                <select class="form-control rounded" name="option">
                                    <option value="" selected>{{trans('labels.select')}}</option>
                                    <option value="veg" @isset($_GET['option']) @if($_GET['option'] == 'veg') selected @endif @endisset> {{trans('labels.veg')}}</option>
                                    <option value="nonveg" @isset($_GET['option']) @if($_GET['option'] == 'nonveg') selected @endif @endisset> {{trans('labels.nonveg')}}</option>
                                </select>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded" type="submit">{{ trans('labels.fetch') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="item-section">
            @include('admin.item.card-view')
        </section>
    </div>
@endsection
@section('script')

<script src="{{url('resources/views/admin/item/additem.js')}}"></script>

@endsection
