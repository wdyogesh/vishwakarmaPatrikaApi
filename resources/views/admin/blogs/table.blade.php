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
        @foreach ($getblogs as $blog)
        <tr>
            <td>@php echo $i++; @endphp</td>
            <td><img src='{{Helper::image_path($blog->image)}}' class='img-fluid rounded hw-50'></td>
            <td>{{$blog->title}}</td>
            <td>{{Str::limit($blog->description, 300)}}</td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit')}}" href="{{URL::to('admin/blogs-'.$blog->id)}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.delete')}}" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$blog->id}}','{{URL::to('admin/blogs/delete')}}')" @endif>{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>