@extends('admin.theme.default')

@section('content')

<div class="row page-titles mx-0">

    <div class="col p-md-0">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>

            <li class="breadcrumb-item"><a href="{{URL::to('admin/promocode')}}">{{trans('labels.promocode')}}</a></li>

            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.edit_promocode')}}</a></li>

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

                        <form action="{{URL::to('admin/promocode/update-'.$getpromocode->id)}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.offer_name')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <input type="text" class="form-control" name="offer_name" value="{{$getpromocode->offer_name}}" id="offer_name" placeholder="{{trans('labels.offer_name')}}">

                                    @error('offer_name') <span class="text-danger">{{$message}}</span> @enderror

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.offer_code')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <input type="text" class="form-control" name="offer_code" value="{{$getpromocode->offer_code}}" id="offer_code" placeholder="{{trans('labels.offer_code')}}">

                                    @error('offer_code') <span class="text-danger">{{$message}}</span> @enderror

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.type')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <label class="col-form-label" for="">{{trans('labels.offer_type')}}</label>

                                            <select name="offer_type" class="form-control">

                                                <option value="" selected>{{trans('labels.select')}}</option>

                                                <option value="1" {{$getpromocode->offer_type == "1" ? 'selected' : ''}}>{{trans('labels.fixed')}}</option>

                                                <option value="2" {{$getpromocode->offer_type == "2" ? 'selected' : ''}}>{{trans('labels.percentage')}}</option>

                                            </select>

                                            @error('offer_type') <span class="text-danger">{{$message}}</span> @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label class="col-form-label" for="">{{trans('labels.usage_type')}}</label>

                                            <select name="usage_type" class="form-control">

                                                <option value="" selected>{{trans('labels.select')}}</option>

                                                <option value="1" {{$getpromocode->usage_type == "1" ? 'selected' : ''}}>{{trans('labels.once_time')}}</option>

                                                <option value="2" {{$getpromocode->usage_type == "2" ? 'selected' : ''}}>{{trans('labels.multiple_times')}}</option>

                                            </select>

                                            @error('usage_type') <span class="text-danger">{{$message}}</span> @enderror

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.date')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <label class="col-form-label" for="">{{trans('labels.start_date')}}</label>

                                            <input type="date" class="form-control" name="start_date" value="{{$getpromocode->start_date}}" id="start_date" placeholder="{{trans('labels.start_date')}}">

                                            @error('start_date') <span class="text-danger">{{$message}}</span> @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label class="col-form-label" for="">{{trans('labels.end_date')}}</label>

                                            <input type="date" class="form-control" name="expire_date" value="{{$getpromocode->expire_date}}" id="expire_date" placeholder="{{trans('labels.expire_date')}}">

                                            @error('expire_date') <span class="text-danger">{{$message}}</span> @enderror

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.amount')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <input type="text" class="form-control" name="offer_amount" value="{{$getpromocode->offer_amount}}" id="price" placeholder="{{trans('labels.amount')}}">

                                    @error('offer_amount') <span class="text-danger">{{$message}}</span> @enderror

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.min_amount')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <input type="text" class="form-control" name="min_amount" value="{{$getpromocode->min_amount}}" id="min_amount" placeholder="{{trans('labels.min_amount')}}">

                                    @error('min_amount') <span class="text-danger">{{$message}}</span> @enderror

                                </div>

                            </div>

                            <div class="form-group row">

                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.description')}} <span class="text-danger">*</span></label>

                                <div class="col-lg-6">

                                    <textarea class="form-control" name="description" rows="3" id="description" placeholder="{{trans('labels.description')}}">{{$getpromocode->description}}</textarea>

                                    @error('description') <span class="text-danger">{{$message}}</span> @enderror

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-lg-8 m-auto">

                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>

                                    <a href="{{URL::to('admin/promocode')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>

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