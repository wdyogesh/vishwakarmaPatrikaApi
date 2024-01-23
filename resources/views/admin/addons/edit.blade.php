@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/addons')}}">{{trans('labels.addons')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.edit_addons')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form action="{{URL::to('admin/addons/update-'.$addonsdata->id)}}" method="post" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.addons_name')}}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" id="addons_name" placeholder="{{trans('labels.addons_name')}}" value="{{$addonsdata->name}}">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.type')}}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <label class="radio-inline mr-3"><input type="radio" name="type" value="1" onclick="get_price(this)"  {{$addonsdata->price<=0 ? 'checked' : ''}}> {{trans('labels.free')}}</label>
                                    <label class="radio-inline mr-3"><input type="radio" name="type" value="2" onclick="get_price(this)"  {{$addonsdata->price>0 ? 'checked' : ''}}> {{trans('labels.paid')}}</label>
                                    @error('type') <br><span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row @if($addonsdata->price<=0) dn @endif" id="price_row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.price')}}<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="{{trans('labels.price')}}" value="{{$addonsdata->price}}">
                                    @error('price') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/addons')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('resources/views/admin/addons/addons.js')}}"></script>
@endsection
