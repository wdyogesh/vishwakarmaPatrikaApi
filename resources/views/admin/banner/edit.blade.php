@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/banner')}}">{{trans('labels.banner')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.edit_banner')}}</a></li>
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
                        <form action="{{URL::to('admin/banner/update-'.$getbanner->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="section" value="{{$getbanner->section}}">
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="type">{{trans('labels.type')}}</label>
                                <div class="col-lg-6">
                                    <select name="type" class="form-control type" data-live-search="true" id="type">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        <option value="1" {{ old('type') == 1 ? 'selected' : ($getbanner->type == 1 ? 'selected' : '') }}>{{trans('labels.category')}}</option>
                                        <option value="2" {{ old('type') == 2 ? 'selected' : ($getbanner->type == 2 ? 'selected' : '') }}>{{trans('labels.item')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row 1 gravity @if($errors->has('cat_id')) @else @if($errors->has('item_id')) dn @else @if($getbanner->type == 1) @else dn @endif @endif @endif">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.category')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="cat_id" class="form-control selectpicker" data-live-search="true" id="cat_id">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{$category->id}}" {{$getbanner->cat_id == $category->id ? 'selected' : ''}} >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row 2 gravity @if($errors->has('item_id')) @else @if($errors->has('cat_id')) dn @else @if($getbanner->type == 2) @else dn @endif @endif @endif">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.item')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="item_id" class="form-control selectpicker" data-live-search="true" id="item_id">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getitem as $item)
                                            <option value="{{$item->id}}" {{$getbanner->item_id == $item->id ? 'selected' : ''}} >{{$item->item_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.image')}} (500x250) <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{$message}}</span> <br> @enderror
                                    <img src="{{Helper::image_path($getbanner->image)}}" alt="" class="img-fluid pt-2" style="max-height: 50px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a class="btn btn-dark" @if($getbanner->section == 0) href="{{URL::to('admin/banner')}}" @else href="{{URL::to('admin/bannersection-'.$getbanner->section)}}" @endif>{{trans('labels.cancel')}}</a>
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
<script src="{{url('resources/views/admin/banner/banner.js')}}"></script>
@endsection