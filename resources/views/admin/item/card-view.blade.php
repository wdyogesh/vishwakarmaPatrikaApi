@if (count($getitem) > 0)
    <div class="row item-list-view">
        @foreach ($getitem as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2 d-flex">
                <div class="card card-section text-center w-100">
                    @if($item->addons_id != "" || count($item->variation) > 0)
                    <div class="ribbon"><span>{{trans('labels.customizable')}}</span></div>
                    @endif
                    @php
                        $i = 0;$j = 0;
                        $item->has_variation == 2 && $item->available_qty <= 0 ? $j++ : '' ;
                        if ($item->has_variation == 1) {
                            foreach ($item->variation as $key => $value){
                                $value->available_qty <= 0 ? $i++ : '' ;
                            }
                        }
                    @endphp
                    @if ($i > 0 || $j > 0)
                        <span class="item-detail-warning"><i class="text-danger fs-3 fa fa-bell"></i></span>  
                    @endif
                    <img src="{{@$item['item_image']->image_url}}" class="listing-view-image mx-auto" alt="...">
                    <div class="card-body py-3">
                        <h6 class="card-title fw-bold mb-2"> <img @if ($item->item_type == 1) src="{{ Helper::image_path('veg.svg') }}" @else src="{{ Helper::image_path('nonveg.svg') }}" @endif class="item-type-img" alt=""> {{$item->item_name}}</h6>
                        <div class="item-details px-2">
                            <p class="d-flex justify-content-between my-0">{{trans('labels.category')}} <span>{{@$item['category_info']->category_name}}</span></p>
                            <p class="d-flex justify-content-between my-0">{{trans('labels.preparation_time')}} <span>{{$item->preparation_time}}</span></p>
                            <p class="d-flex justify-content-between my-0">{{trans('labels.tax')}} <span>{{number_format($item->tax,2)}}%</span></p>
                        </div>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-center">
                            @if ($item->is_featured == 1)
                                <a class="btn px-2 text-success d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusFeatured('{{$item->id}}','2','{{URL::to('admin/item/featured')}}')" @endif><i class="fa fa-check"></i><small>{{trans('labels.featured')}}</small>
                                </a>
                            @else
                                <a class="btn px-2 text-danger d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusFeatured('{{$item->id}}','1','{{URL::to('admin/item/featured')}}')" @endif><i class="fa fa-close"></i><small>{{trans('labels.featured')}}</small>
                                </a>
                            @endif
                            @if ($item->item_status == 1)
                                <a class="btn px-2 text-success d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$item->id}}','2','{{URL::to('admin/item/status')}}')" @endif>
                                    <i class="fa fa-check"></i><small>{{trans('labels.status')}}</small>
                                </a>
                            @else
                                <a class="btn px-2 text-danger d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$item->id}}','1','{{URL::to('admin/item/status')}}')" @endif>
                                    <i class="fa fa-close"></i><small>{{trans('labels.status')}}</small>
                                </a>
                            @endif
                            <a class="btn px-2 text-info d-grid" href="{{URL::to('admin/item-'.$item->id)}}">
                                <i class="fa fa-edit"></i><small>{{trans('labels.update')}}</small>
                            </a>
                            <a class="btn px-2 text-danger d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$item->id}}','{{URL::to('admin/item/delete')}}')" @endif>
                                <i class="fa fa-trash"></i><small>{{trans('labels.delete')}}</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{$getitem->appends(request()->query())->links()}}
        </div>
    </div>
@else
@include('admin.nodata')
@endif