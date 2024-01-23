<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.addons_name')}}</th>
            <th>{{trans('labels.price')}}</th>
            <th>{{trans('labels.status')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getaddons as $addons)
        <tr id="dataid{{$addons->id}}">
            <td>@php echo $i++; @endphp</td>
            <td>{{$addons->name}}</td>
            <td>{{Helper::currency_format($addons->price)}}</td>
            <td>
                @if ($addons->is_available == 1)
                    <a class="badge badge-success px-2 text-white" @if (env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$addons->id}}','2','{{ URL::to('admin/addons/status')}}')" @endif>{{trans('labels.active')}}</a>
                @else
                    <a class="badge badge-danger px-2 text-white" @if (env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$addons->id}}','1','{{ URL::to('admin/addons/status')}}')" @endif>{{trans('labels.deactive')}}</a>
                @endif
            </td>
            <td>
                <a class="badge badge-success px-2 text-white" href="{{URL::to('admin/addons-'.$addons->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit_addons')}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" @if (env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$addons->id}}','{{URL::to('admin/addons/delete')}}')" @endif>{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>