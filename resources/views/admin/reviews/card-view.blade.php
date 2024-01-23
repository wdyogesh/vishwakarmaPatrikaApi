@if (count($getreview)>0)
    <div class="row">
        @foreach ($getreview as $reviews)
            <div class="col-lg-4 col-sm-6 mt-4 mb-2 d-flex">
                <div class="card w-100">
                    <div class="card-body pb-0">
                        <div class="media align-items-center mb-2">
                            <img class="rounded hw-50 mr-3" src="{{$reviews['user_info']->profile_image}}" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">{{$reviews['user_info']->name}} <small class="float-right"><i class="fa fa-star text-warning"></i> {{number_format($reviews->ratting,1)}}</small></h3>
                                <p class="text-muted mb-0">{{Helper::date_format($reviews->created_at)}}</p>
                            </div>
                        </div>
                        <p class="text-muted">{{$reviews->comment}}</p>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-around align-items-center">
                            <a class="btn text-danger d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="DeleteData('{{$reviews->id}}','{{URL::to('admin/reviews/destroy')}}')" @endif>
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
            {{$getreview->links()}}
        </div>
    </div>
@else
@include('admin.nodata')
@endif