@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/driver')}}">{{trans('labels.drivers')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.add_new')}}</a></li>
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
                        <form action="{{URL::to('admin/driver/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.name')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="{{trans('labels.name')}}">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.email')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="{{trans('labels.email')}}">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.password')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" placeholder="{{trans('labels.password')}}">
                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.mobile')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}" id="mobile" placeholder="{{trans('labels.mobile')}}">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.identity_type')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="identity_type" value="{{old('identity_type')}}" id="identity_type" placeholder="{{trans('messages.enter_identity_type')}}">
                                    @error('identity_type') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.identity_number')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="tel" class="form-control" name="identity_number" value="{{old('identity_number')}}" id="identity_number" placeholder="{{trans('labels.identity_number')}}">
                                    @error('identity_number') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.identity_image')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image" value="{{old('image')}}" id="image">
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/driver')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
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