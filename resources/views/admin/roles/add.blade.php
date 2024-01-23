@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/roles')}}">{{trans('labels.role_management')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.add_new')}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-validation roles-form">
                        <form action="{{URL::to('admin/roles/store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.role_name')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" placeholder="{{trans('labels.role_name')}}" >
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.system_modules')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <div class="row mb-0">
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox2"><input type="checkbox" class="mr-2" id="checkbox2" name="modules[]" value="2">{{trans('labels.sliders')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox3"><input type="checkbox" class="mr-2" id="checkbox3" name="modules[]" value="3">{{trans('labels.categories')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox4"><input type="checkbox" class="mr-2" id="checkbox4" name="modules[]" value="4">{{trans('labels.addons')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox5"><input type="checkbox" class="mr-2" id="checkbox5" name="modules[]" value="5">{{trans('labels.items')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox6"><input type="checkbox" class="mr-2" id="checkbox6" name="modules[]" value="6">{{trans('labels.banners')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox7"><input type="checkbox" class="mr-2" id="checkbox7" name="modules[]" value="7">{{trans('labels.zone')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox9"><input type="checkbox" class="mr-2" id="checkbox9" name="modules[]" value="9">{{trans('labels.promocodes')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox10"><input type="checkbox" class="mr-2" id="checkbox10" name="modules[]" value="10">{{trans('labels.working_hours')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox11"><input type="checkbox" class="mr-2" id="checkbox11" name="modules[]" value="11">{{trans('labels.payment_methods')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox12"><input type="checkbox" class="mr-2" id="checkbox12" name="modules[]" value="12">{{trans('labels.orders')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox14"><input type="checkbox" class="mr-2" id="checkbox14" name="modules[]" value="14">{{trans('labels.reviews')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox15"><input type="checkbox" class="mr-2" id="checkbox15" name="modules[]" value="15">{{trans('labels.report')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox16"><input type="checkbox" class="mr-2" id="checkbox16" name="modules[]" value="16">{{trans('labels.notification')}} {{trans('labels.only_mobile')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox17"><input type="checkbox" class="mr-2" id="checkbox17" name="modules[]" value="17">{{trans('labels.inquiries')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox18"><input type="checkbox" class="mr-2" id="checkbox18" name="modules[]" value="18">{{trans('labels.role_management')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox24"><input type="checkbox" class="mr-2" id="checkbox24" name="modules[]" value="24">{{trans('labels.employee')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox8"><input type="checkbox" class="mr-2" id="checkbox8" name="modules[]" value="8">{{trans('labels.drivers')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox13"><input type="checkbox" class="mr-2" id="checkbox13" name="modules[]" value="13">{{trans('labels.users')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox19"><input type="checkbox" class="mr-2" id="checkbox19" name="modules[]" value="19">{{trans('labels.cms_pages')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox25"><input type="checkbox" class="mr-2" id="checkbox25" name="modules[]" value="25">{{trans('labels.other_pages')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox20"><input type="checkbox" class="mr-2" id="checkbox20" name="modules[]" value="20">{{trans('labels.addons_manager')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox21"><input type="checkbox" class="mr-2" id="checkbox21" name="modules[]" value="21">{{trans('labels.clear_cache')}}</label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox22"><input type="checkbox" class="mr-2" id="checkbox22" name="modules[]" value="22">OTP Configuration <span class="badge badge-danger" style="color: #fff;">Addon</span></label>
                                        </div>
                                        <div class="col-md-4 col-6 py-2">
                                            <label class="cursor-pointer" for="checkbox23"><input type="checkbox" class="mr-2" id="checkbox23" name="modules[]" value="23">POS <span class="badge badge-danger" style="color: #fff; float: right;">Addon</span></label>
                                        </div>
                                    </div>
                                    @error('modules') <br><span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/roles')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
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