<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.image')}}</th>
            <th>{{trans('labels.category')}}</th>
            <th>{{trans('labels.item')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getbanner as $banner)
            @if($banner->section == $section)
            <tr id="dataid{{$banner->id}}">
                <td>@php echo $i++; @endphp</td>
                <td><img src='{{Helper::image_path($banner->image)}}' class='img-fluid rounded hw-50'></td>
                <td>@if($banner->type == "1") {{@$banner['category_info']->category_name}} @else -- @endif</td>
                <td>@if($banner->type == "2") {{@$banner['item_info']->item_name}} @else -- @endif</td>
                <td>
                    <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit')}}" href="{{URL::to('admin/banner-'.$banner->id)}}" >{{trans('labels.edit')}}</a>
                    <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.delete')}}" href="javascript:void(0)"  @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="DeleteData('{{$banner->id}}','{{URL::to('admin/banner/destroy')}}')" @endif>{{trans('labels.delete')}}</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>