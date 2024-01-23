@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/category')}}">{{trans('labels.subcategories')}}</a></li>
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
                        <form action="{{URL::to('admin/sub-category/update-'.$subcatdata->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.subcategory')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" placeholder="{{trans('labels.subcategory')}}" value="{{$subcatdata->subcategory_name}}">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.category')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category">
                                        <option value="" selected>{{trans('labels.select')}}</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{$category->id}}" {{$subcatdata->cat_id == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/sub-category')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
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