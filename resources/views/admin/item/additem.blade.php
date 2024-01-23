@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.items')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.add_new')}}</h4>
                    <p class="text-muted"><code></code></p>
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form method="post" action="{{ URL::to('admin/item/store')}}" name="about" id="about" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cat_id" class="col-form-label">{{trans('labels.category')}}</label>
                                                <select name="cat_id" class="form-control" id="cat_id" data-url="{{URL::to('admin/item/subcategories')}}">
                                                    <option value="" selected>{{trans('labels.select')}}</option>
                                                    @foreach ($getcategory as $category)
                                                        <option value="{{$category->id}}" data-id="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('cat_id')<span class="text-danger">{{ $message }}</span>@enderror
                                                <span class="emsg text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subcat_id" class="col-form-label">{{trans('labels.subcategory')}}</label>
                                                <select name="subcat_id" class="form-control" id="subcat_id">
                                                    <option value="" selected>{{trans('labels.select')}}</option>
                                                </select>
                                                @error('subcat_id')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_name" class="col-form-label">{{trans('labels.item_name')}}</label>
                                        <input type="text" class="form-control" name="item_name" id="item_name" placeholder="{{trans('labels.item_name')}}">
                                        @error('item_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="addons_id" class="col-form-label">{{trans('labels.addons')}}</label>
                                        <select name="addons_id[]" class="form-control selectpicker" multiple data-live-search="true" id="addons_id">
                                            <option value="" selected>{{trans('labels.select')}}</option>
                                            @foreach($getaddons as $addons)
                                                <option value="{{$addons->id}}">{{$addons->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="has_variation" class="col-form-label">{{trans('labels.item_has_variation')}}</label>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="yes" value="1" @if(old('has_variation') == 1) checked @endif>
                                                <label class="form-check-label" for="yes">{{trans('labels.yes')}}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="no" value="2" @if(old('has_variation') == 2) checked @endif>
                                                <label class="form-check-label" for="no">{{trans('labels.no')}}</label>
                                            </div>
                                            @error('has_variation')<br><span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row dn @if($errors->has('variants_name.*') || $errors->has('variants_price.*')) dn @endif @if(old('has_variation') == 2) d-flex @endif" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">{{trans('labels.price')}}</label>
                                        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" placeholder="{{trans('labels.price')}}">
                                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">{{trans('labels.qty')}}</label>
                                        <input type="number" class="form-control" name="qty" min="0" value="{{old('qty')}}" placeholder="{{trans('labels.qty')}}">
                                        @error('qty')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row panel-body dn @if($errors->has('variation.*') || $errors->has('product_price.*') || old('has_variation') == 1) d-flex @endif" id="variations">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="attribute" class="col-form-label">{{trans('labels.attribute')}}</label>
                                        <input type="text" class="form-control attribute" name="attribute" id="attribute" placeholder="{{trans('messages.enter_attribute')}}">
                                        @error('attribute')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="variation" class="col-form-label">{{trans('labels.variation')}}</label>
                                        <input type="text" class="form-control variation" name="variation[]" id="variation" placeholder="{{trans('labels.variation')}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="product_price" class="col-form-label">{{trans('labels.product_price')}}</label>
                                        <input type="text" class="form-control product_price" id="product_price" name="product_price[]" placeholder="{{trans('labels.product_price')}}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">{{trans('labels.qty')}}</label>
                                        <input type="number" class="form-control" name="available_qty[]" min="0" placeholder="{{trans('labels.qty')}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 d-none">
                                    <div class="form-group">
                                        <label for="sale_price" class="col-form-label">{{trans('labels.sale_price')}}</label>
                                        <input type="text" class="form-control sale_price" id="sale_price" name="sale_price[]" placeholder="{{trans('labels.sale_price')}}" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-btn pt-35">
                                                <button class="btn btn-info" type="button"  onclick="variation_fields();"> + </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="clear"></div>
                            </div>
                            <div id="more_variation_fields"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">{{trans('labels.image')}} (512x512) ({{trans('labels.png')}})</label>
                                        <input type="file" class="form-control" name="image[]" id="image" accept="image/*" multiple>
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        <div class="row pl-2 gallery"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tax" class="col-form-label">{{trans('labels.tax')}} (%)</label>
                                                <input type="text" class="form-control" name="tax" id="tax" value="0" placeholder="{{trans('labels.tax')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">{{trans('labels.description')}}</label>
                                        <textarea class="form-control" rows="5" name="description" id="description" placeholder="{{trans('labels.description')}}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" @if (env('Environment')=='sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                            <a href="{{URL::to('admin/item')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
@section('script')

<script src="{{url('resources/views/admin/item/additem.js')}}"></script>

@endsection
