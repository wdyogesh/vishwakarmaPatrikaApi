<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.image')}}</th>
            <th>{{trans('labels.title')}}</th>
            <th>{{trans('labels.category')}}</th>
            <th>{{trans('labels.item')}}</th>
            <th>{{trans('labels.description')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getslider as $slider)
        <tr id="dataid{{$slider->id}}">
            <td>@php echo $i++; @endphp</td>
            <td><img src='{{Helper::image_path($slider->image)}}' class='img-fluid rounded hw-50'></td>
            <td>{{$slider->title}}</td>
            <td>@if($slider->type == "1") {{@$slider['category_info']->category_name}} @else -- @endif</td>
            <td>@if($slider->type == "2") {{@$slider['item_info']->item_name}} @else -- @endif</td>
            <td>{{$slider->description}}</td>
            <td>
                <a class="badge badge-success px-2 text-white" href="{{URL::to('admin/slider-'.$slider->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit_slider')}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.delete')}}" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="DeleteData('{{$slider->id}}','{{ URL::to('admin/slider/destroy')}}')" @endif data-original-title="{{trans('labels.delete')}}">
                    {{trans('labels.delete')}}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>