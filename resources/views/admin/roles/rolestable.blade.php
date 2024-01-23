<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.name')}}</th>
            <th>{{trans('labels.system_modules')}}</th>
            <th>{{trans('labels.status')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach ($getroles as $role)
        <tr id="dataid{{$role->id}}">
            <td>@php echo $i++; @endphp</td>
            <td>{{$role->name}}</td>
            <td>{{$role->modules}}</td>
            <td>
                @if($role->is_available == 1)
                    <a class="badge badge-success px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$role->id}}','2','{{URL::to('admin/roles/status')}}')" @endif>{{trans('labels.active')}}</a>
                @else
                    <a class="badge badge-danger px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$role->id}}','1','{{URL::to('admin/roles/status')}}')" @endif>{{trans('labels.deactive')}}</a>
                @endif
            </td>
            <td>
                <a class="badge badge-warning px-2 text-white" data-toggle="tooltip" data-original-title="{{trans('labels.view')}}" href="{{URL::to('admin/roles-'.$role->id)}}" >
                    {{trans('labels.view')}}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>