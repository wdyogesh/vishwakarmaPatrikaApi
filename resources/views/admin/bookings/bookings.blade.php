@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.bookings')}}</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.bookings')}}</h4>
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('labels.name')}}</th>
                                    <th>{{trans('labels.email')}}</th>
                                    <th>{{trans('labels.mobile')}}</th>
                                    <th>{{trans('labels.guests')}}</th>
                                    <th>{{trans('labels.date_time')}}</th>
                                    <th>{{trans('labels.reservation_type')}}</th>
                                    <th>{{trans('labels.message')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($getbookings as $booking)
                                <tr>
                                    <td>@php echo $i++; @endphp</td>
                                    <td>{{$booking->name}}</td>
                                    <td>{{$booking->email}}</td>
                                    <td>{{$booking->mobile}}</td>
                                    <td>{{$booking->guests}}</td>
                                    <td>{{$booking->date}} <br> {{$booking->time}} </td>
                                    <td>{{$booking->reservation_type}} </td>
                                    <td><span data-toggle="tooltip" data-placement="top" data-original-title="{{$booking->special_request}}">{{Str::limit($booking->special_request,50)}}</span></td>
                                    <td>
                                        @if($booking->status == 1)
                                            <a class="badge badge-success px-2 text-white open-table-modal" data-toggle="modal" data-id="{{$booking->id}}" data-target="#tablemodal">{{ trans('labels.accept') }}</a>
                                            <a class="badge badge-danger px-2 text-white" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$booking->id}}','3','{{URL::to('/admin/bookings/status')}}')" @endif>{{ trans('labels.reject') }}</a>
                                        @elseif($booking->status == 2)
                                            <span class="text-success">{{trans('labels.accepted')}}</span>
                                        @elseif($booking->status == 3)
                                            <span class="text-danger">{{trans('labels.rejected')}}</span>
                                        @else
                                            --
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal-add-table-number -->
<div id="tablemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bookingid" class="col-form-label">{{ trans('labels.booking') }}</label>
                        <input type="text" class="form-control" id="bookingid" name="bookingid" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">{{ trans('labels.table_number') }}</label>
                        <input type="tel" class="form-control" name="table_number" placeholder="{{trans('labels.table_number')}}" id="table_number" required="required">
                        <span class="table_error text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.close') }}</button>
                    <button type="button" class="btn btn-primary" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="set_table_number('2','{{URL::to('/admin/bookings/status')}}')" @endif>{{ trans('labels.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('resources/views/admin/bookings/bookings.js')}}"></script>
@endsection