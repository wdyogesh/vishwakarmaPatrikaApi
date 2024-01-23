@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.payment_methods')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.payment_methods')}}</h4>
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('labels.image')}}</th>
                                    <th>{{trans('labels.name')}}</th>
                                    <th>{{trans('labels.currency')}}</th>
                                    <th>{{trans('labels.status')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getpayment as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td><img src="{{Helper::image_path($payment->image)}}" alt="" class='img-fluid rounded hw-50'></td>
                                    <td>{{$payment->payment_name}}</td>
                                    <td>
                                        @if( strtolower($payment->payment_name) != 'cod' && strtolower($payment->payment_name) != 'wallet' )
                                            {{$payment->currency}}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->is_available == '1')
                                            <a class="badge badge-success px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$payment->id}}','2','{{URL::to('admin/payment/status')}}')" @endif>{{trans('labels.active')}}</a>
                                        @else
                                            <a class="badge badge-danger px-2 text-white" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$payment->id}}','1','{{URL::to('admin/payment/status')}}')" @endif>{{trans('labels.deactive')}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="badge badge-warning px-2 text-white" data-toggle="tooltip" href="{{URL::to('admin/payment-'.$payment->id)}}" data-original-title="{{trans('labels.view')}}">{{trans('labels.view')}}</a>
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
<!-- #/ container -->
@endsection
@section('script')
<script src="{{url('resources/views/admin/payment/payment.js')}}"></script>
@endsection