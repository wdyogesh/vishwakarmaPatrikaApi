@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/employee')}}">{{trans('labels.employee')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.update')}}</a></li>
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
                        <form action="{{URL::to('admin/employee/update-'.$employeedata->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="name">{{trans('labels.name')}}</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{$employeedata->name}}" id="name" placeholder="{{trans('labels.name')}}">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="mobile">{{trans('labels.mobile')}}</label>
                                <div class="col-lg-6">
                                    <input type="tel" class="form-control" name="mobile" value="{{$employeedata->mobile}}" id="mobile" placeholder="{{trans('labels.mobile')}}">
                                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="email">{{trans('labels.email')}}</label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" name="email" value="{{$employeedata->email}}" id="email" placeholder="{{trans('labels.email')}}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="role">{{trans('labels.role')}}</label>
                                <div class="col-lg-6">
                                    <select name="role" class="form-control" data-live-search="true" id="type">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getroles as $role)
                                            <option value="{{$role->id}}" {{$employeedata->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/employee')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
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