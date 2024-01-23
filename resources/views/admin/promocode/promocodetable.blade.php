<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('labels.offer_name')}}</th>
            <th>{{trans('labels.offer_code')}}</th>
            <th>{{trans('labels.amount')}}</th>
            <th>{{trans('labels.min_amount')}}</th>
            <th>{{trans('labels.from_to')}}</th>
            <th>{{trans('labels.description')}} </th>
            <th>{{trans('labels.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($getpromocode as $promocode)
        <tr id="dataid{{$promocode->id}}">
            <td>@php echo $i++; @endphp</td>
            <td>{{$promocode->offer_name}}</td>
            <td>{{$promocode->offer_code}}</td>
            <td>{{$promocode->offer_type == 1 ? Helper::currency_format($promocode->offer_amount) : $promocode->offer_amount.'%' }}</td>
            <td>{{Helper::currency_format($promocode->min_amount)}}</td>
            <td><span class="badge badge-success">{{Helper::date_format($promocode->start_date)}}</span><span class="badge badge-warning">{{Helper::date_format($promocode->expire_date)}}</span></td>
            <td><span data-toggle="tooltip" data-placement="top" data-original-title="{{$promocode->description}}">{{Str::limit($promocode->description,100)}}</span></td>
            <td>
                <a class="badge badge-success px-2 text-white" href="{{URL::to('admin/promocode-'.$promocode->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit_promocode')}}">
                    {{trans('labels.edit')}}
                </a>
                <a class="badge badge-danger px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$promocode->id}}','2','{{URL::to('admin/promocode/status')}}')" @endif >{{trans('labels.delete')}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>