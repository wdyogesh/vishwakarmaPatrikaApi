<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.image')}}</th>
            <th>{{trans('labels.title')}}</th>
            <th>{{trans('labels.description')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($gettutorials as $tutorial)
        <tr id="dataid{{$tutorial->id}}">
            <td>@php echo $i++; @endphp</td>
            <td><img src='{{Helper::image_path($tutorial->image)}}' class='img-fluid rounded hw-50'></td>
            <td>{{$tutorial->title}}</td>
            <td>{{$tutorial->description}}</td>
            <td>
                <a class="badge badge-success px-2 text-white" href="{{URL::to('admin/tutorial-'.$tutorial->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit')}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$tutorial->id}}','{{URL::to('admin/tutorial/delete')}}')" @endif>{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>