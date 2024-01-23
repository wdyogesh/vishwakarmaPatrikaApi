@if (count($getgalleries) > 0)
    <div class="row">
        @foreach ($getgalleries as $gallery)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="card text-center">
                <div class="card-header pb-0">
                    <img src="{{Helper::image_path($gallery->image)}}" class="img-fluid gallery-img rounded" alt="">
                </div>
                <div class="card-body py-2">
                    <a class="btn btn-sm btn-info" href="{{URL::to('admin/gallery-'.$gallery->id)}}" ><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="#" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="Delete('{{$gallery->id}}','{{URL::to('admin/gallery/delete')}}')" @endif ><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
@include('admin.nodata')
@endif