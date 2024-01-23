<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.title')}}</th>
            <th>{{trans('labels.description')}}</th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getfaqs as $faq)
        <tr id="dataid{{$faq->id}}">
            <td>@php echo $i++; @endphp</td>
            <td>{{$faq->title}}</td>
            <td>{{$faq->description}}</td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit')}}" href="{{URL::to('admin/faq-'.$faq->id)}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.delete')}}" href="javascript:void(0)" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="Delete('{{$faq->id}}','{{URL::to('admin/faq/delete')}}')" @endif>{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>