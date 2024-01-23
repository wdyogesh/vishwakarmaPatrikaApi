@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/slider')}}">{{trans('labels.slider')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.edit_slider')}}</a></li>
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
                        <form action="{{URL::to('admin/slider/update-'.$getslider->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.title')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="title" placeholder="{{trans('labels.title')}}" value="{{$getslider->title}}">
                                    @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="type">{{trans('labels.type')}}</label>
                                <div class="col-lg-6">
                                    <select name="type" class="form-control type" data-live-search="true" id="type">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        <option value="1" {{ $getslider->type == 1 ? 'selected' : '' }}>{{trans('labels.category')}}</option>
                                        <option value="2" {{ $getslider->type == 2 ? 'selected' : '' }}>{{trans('labels.item')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row 1 gravity">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.category')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="cat_id" class="form-control selectpicker" data-live-search="true" id="cat_id">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{$category->id}}" {{$getslider->cat_id == $category->id ? 'selected' : ''}} >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row 2 gravity">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.item')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="item_id" class="form-control selectpicker" data-live-search="true" id="item_id">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getitem as $item)
                                            <option value="{{$item->id}}" {{$getslider->item_id == $item->id ? 'selected' : ''}} >{{$item->item_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.description')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <textarea name="description" class="form-control" rows="4" placeholder="{{trans('labels.description')}}">{{$getslider->description}}</textarea>
                                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.image')}} (600x200) <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{$message}}</span><br>@enderror
                                    <img src="{{Helper::image_path($getslider->image)}}" alt="" class="img-fluid pt-2 hw-50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/slider')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
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
    <script src="{{url('resources/views/admin/slider/slider.js')}}"></script>
@endsection
