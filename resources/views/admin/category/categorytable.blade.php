<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.image')}}</th>
            <th>{{trans('labels.category')}}</th>
            <th>{{trans('labels.status')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getcategory as $category)
        <tr id="dataid{{$category->id}}">
            <td>@php echo $i++; @endphp</td>
            <td><img src='{{Helper::image_path($category->image)}}' class='img-fluid rounded hw-50'></td>
            <td>{{$category->category_name}}</td>
            <td>
                @if($category->is_available == 1)
                    <a class="badge badge-success px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$category->id}}','2','{{URL::to('admin/category/status')}}')" @endif>{{trans('labels.active')}}</a>
                @else
                    <a class="badge badge-danger px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$category->id}}','1','{{URL::to('admin/category/status')}}')" @endif>{{trans('labels.deactive')}}</a>
                @endif
            </td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit_category')}}" href="{{URL::to('admin/category-'.$category->id)}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.delete')}}" href="javascript:void(0)" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$category->id}}','{{URL::to('admin/category/delete')}}')" @endif>{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>