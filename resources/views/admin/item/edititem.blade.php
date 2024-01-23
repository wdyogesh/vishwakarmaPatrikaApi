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
                    <h4 class="card-title">{{trans('labels.edit_item')}}</h4>
                    <p class="text-muted"><code></code></p>
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form method="post" action="{{ URL::to('admin/item/update')}}" name="about" id="about" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$getitem->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cat_id" class="col-form-label">{{trans('labels.category')}}</label>
                                                <select name="cat_id" class="form-control" id="cat_id" data-url="{{URL::to('admin/item/subcategories')}}">
                                                    <option value="" selected>{{trans('labels.select')}}</option>
                                                    @foreach ($getcategory as $category)
                                                        <option value="{{$category->id}}" {{$getitem->cat_id == $category->id ? 'selected' : ''}} data-id="{{$category->id}}">{{$category->category_name}}</option>
                                                        @endforeach
                                                        @error('get_cat_id')<span class="text-danger">{{ $message }}</span>@enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subcat_id" class="col-form-label">{{trans('labels.subcategory')}}</label>
                                                <select name="subcat_id" class="form-control" id="subcat_id">
                                                    <option value="" selected>{{trans('labels.select')}}</option>
                                                    @foreach($getsubcategory as $subcatdata)
                                                        <option value="{{$subcatdata->id}}" {{$getitem->subcat_id == $subcatdata->id ? 'selected' : ''}}>{{$subcatdata->subcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcat_id')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="getitem_name" class="col-form-label">{{trans('labels.item_name')}}</label>
                                        <input type="text" class="form-control" id="getitem_name" name="item_name" placeholder="{{trans('labels.item_name')}}" value="{{$getitem->item_name}}">
                                        @error('getitem_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="getaddons_id" class="col-form-label">{{trans('labels.addons')}}</label>
                                        <?php $selected = explode(",", $getitem->addons_id); ?>
                                        <select name="addons_id[]" class="form-control selectpicker" multiple data-live-search="true" id="getaddons_id">
                                            @foreach($getaddons as $supplier)
                                                <option value="{{ $supplier->id }}" {{ (in_array($supplier->id, $selected)) ? 'selected' : '' }}>{{ $supplier->name}}</option>
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
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="yes" value="1" @if($getitem->has_variation == 1) checked @endif>
                                                <label class="form-check-label" for="yes">{{trans('labels.yes')}}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="no" value="2" @if($getitem->has_variation == 2) checked @endif>
                                                <label class="form-check-label" for="no">{{trans('labels.no')}}</label>
                                            </div>
                                            @error('has_variation')<br><span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row @if($getitem->has_variation == 1) dn @endif" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">{{trans('labels.price')}}</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="{{trans('labels.price')}}" value="{{$getitem->price}}">
                                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">{{trans('labels.qty')}}</label>
                                        <input type="number" class="form-control" name="qty" min="0" placeholder="{{trans('labels.qty')}}" value="{{$getitem->available_qty}}">
                                        @error('qty')<span class="text-danger">{{ $message }}</span><br> @enderror
                                        @if ($getitem->available_qty <= 0)
                                            <span class="text-danger">{{ trans('labels.low_qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="@if($getitem->has_variation == 2) dn @endif" id="variations">
                                {{-- <div class="row"> --}}
                                    <div class="col-md-12 px-0">
                                        <div class="form-group">
                                            <label for="attribute" class="col-form-label">{{trans('labels.attribute')}}</label>
                                            <input type="text" class="form-control attribute" name="attribute" id="attribute" placeholder="{{trans('messages.enter_attribute')}}" value="{{$getitem->attribute}}">
                                            @error('attribute')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                {{-- </div> --}}
                                @foreach ($getvariation as $ky => $variation)
                                <div class="row panel-body" id="del-{{$variation->id}}">
                                    <input type="hidden" class="form-control" id="variation_id" name="variation_id[{{$ky}}]" value="{{$variation->id}}">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="variation" class="col-form-label">{{trans('labels.variation')}}</label>
                                            <input type="text" class="form-control variation" name="variation[{{$ky}}]" id="variation" placeholder="{{trans('labels.variation')}}" required="" value="{{$variation->variation}}">
                                            @if ($errors->has('variation.'.$ky))
                                                <span class="text-danger">{{ $errors->first('variation.'.$ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="product_price" class="col-form-label">{{trans('labels.product_price')}}</label>
                                            <input type="text" class="form-control product_price" id="product_price" name="product_price[{{$ky}}]" placeholder="{{trans('labels.product_price')}}" required="" value="{{$variation->product_price}}">
                                            @if ($errors->has('product_price.'.$ky))
                                                <span class="text-danger">{{ $errors->first('product_price.'.$ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">{{trans('labels.qty')}}</label>
                                            <input type="number" class="form-control" name="available_qty[]" min="0" placeholder="{{trans('labels.qty')}}" value="{{$variation->available_qty}}">
                                            @if ($errors->has('available_qty.'.$ky))
                                                <span class="text-danger">{{ $errors->first('available_qty.'.$ky) }}</span> <br>
                                            @endif
                                            @if ($variation->available_qty <= 0)
                                                <span class="text-danger">{{ trans('labels.low_qty') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4 d-none">
                                        <div class="form-group">
                                            <label for="sale_price" class="col-form-label">{{trans('labels.sale_price')}}</label>
                                            <input type="text" class="form-control sale_price" id="sale_price" name="sale_price[{{$ky}}]" placeholder="{{trans('labels.sale_price')}}" required="" value="{{$variation->sale_price}}">
                                            @if ($errors->has('sale_price.'.$ky))
                                                <span class="text-danger">{{ $errors->first('sale_price.'.$ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-btn pt-35">
                                                    <button class="btn btn-danger" type="button"  onclick="DeleteVariation('{{$variation->id}}','{{$getitem->id}}','{{URL::to('admin/item/deletevariation')}}')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $currentdata[] = array(
                                        "currentkey" => $ky
                                    );
                                ?>
                                @endforeach
                            </div>
                            <p id="counter" style="display: none;">@if($getitem->has_variation == 1) {{count(array_column(@$currentdata, 'currentkey'))-1}} @endif</p>
                            <div id="edititem_fields"></div>
                            <button class="btn btn-success btn-add-variations @if($getitem->has_variation == 2) dn @endif" type="button" onclick="edititem_fields();"> {{trans('labels.add_varation')}} + </button>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tax" class="col-form-label">{{trans('labels.tax')}} (%)</label>
                                                <input type="text" class="form-control" name="tax" id="tax" value="{{$getitem->tax}}" placeholder="{{trans('labels.tax')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">{{trans('labels.description')}}</label>
                                        <textarea class="form-control" rows="5" name="description" id="description" placeholder="{{trans('labels.description')}}">{{$getitem->item_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" @if(env('Environment')=='sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.update')}}</button>
                            <a href="{{URL::to('admin/item')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct" data-whatever="@addProduct">{{trans('labels.add_image')}}</button>
            <div id="card-display">
                <div class="row" style="margin-top: 20px;">
                    {{-- <div class="col-md-6 col-lg-3 dataid{{$getitem->id}}" id="table-image">
                        <div class="card">
                            <img class="img-fluid rounded edit-item-image" onClick="updateItemImage('{{$getitem->id}}','{{URL::to('admin/item/showimage')}}')" title="{{trans('labels.edit')}}" src='{{Helper::image_path($getitem->image)}}' >
                        </div>
                    </div> --}}
                    @foreach ($getitemimages as $itemimage)
                        <div class="col-lg-2 col-md-4 col-sm-6 my-card dataid{{$itemimage->id}}" id="table-image">
                            <img class="img-fluid rounded edit-item-image" src='{{Helper::image_path($itemimage->image)}}' >
                            <div class="actioncenter">
                                <a href="javascript:void(0)" class="badge badge-info" onClick="updateItemImage('{{$itemimage->id}}','{{URL::to('admin/item/showimage')}}')" title="{{trans('labels.edit')}}"><i class="fa fa-edit p-2" aria-hidden="true"></i> </a>
                                @if(count($getitemimages) > 1)
                                <a href="javascript:void(0)" class="badge badge-danger" @if(env('Environment')=='sendbox') type="button" onclick="myFunction()" @else onClick="deleteItemImage('{{$itemimage->id}}','{{$itemimage->item_id}}','{{URL::to('admin/item/destroyimage')}}')" @endif title="{{trans('labels.delete')}}"><i class="fa fa-trash p-2" aria-hidden="true"></i> </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Images -->
<div class="modal fade" id="EditImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" name="editimg" class="editimg" id="editimg" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="updateimageurl" value="{{URL::to('admin/item/updateimage')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabeledit">{{trans('labels.images')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <span id="emsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{trans('labels.images')}} (500x250) ({{trans('labels.png')}})</label>
                        <input type="hidden" id="idd" name="id">
                        <input type="hidden" class="form-control" id="old_img" name="old_img">
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        <input type="hidden" name="removeimg" id="removeimg">
                    </div>
                    <div class="galleryim"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btna-secondary" type="button" data-dismiss="modal">{{trans('labels.close')}}</button>
                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif >{{trans('labels.update')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Add Item Image -->
<div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" name="addproduct" class="addproduct" id="addproduct" enctype="multipart/form-data">
            <span id="msg"></span>
            <input type="hidden" id="storeimagesurl" value="{{URL::to('admin/item/storeimages')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('labels.images')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('labels.close')}}"><span aria-hidden="true">&times;</span></button>
                </div>
                <span id="iiemsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="colour" class="col-form-label">{{trans('labels.images')}}</label>
                        <input type="file" multiple="true" class="form-control" name="file[]" id="file" accept="image/*" required="">
                    </div>
                    <div class="gallery"></div>
                    <input type="hidden" name="itemid" id="itemid" value="{{request()->route('id')}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('labels.close')}}</button>
                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif >{{trans('labels.update')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- #/ container -->
@endsection
@section('script')
<script src="{{url('resources/views/admin/item/additem.js')}}"></script>
@endsection
