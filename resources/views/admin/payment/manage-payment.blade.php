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
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$paymentdetails->payment_name}}</h4>
                    <div class="basic-form">
                        <form action="{{ URL::to('admin/payment/update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" class="form-control" value="{{$paymentdetails->id}}">
                            @if (in_array($paymentdetails->id,array(3,4,5,6)))
                                <div class="form-group">
                                    <label>{{trans('labels.environment')}}</label>
                                    <select id="environment" name="environment" class="form-control">
                                        <option selected="selected" value="">{{trans('labels.select')}}</option>
                                        <option value="0" {{$paymentdetails->environment == 0  ? 'selected' : ''}}>{{trans('labels.production')}}</option>
                                        <option value="1" {{$paymentdetails->environment == 1  ? 'selected' : ''}}>{{trans('labels.sandbox')}}</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>{{trans('labels.currency')}}</label>
                                        <input type="text" name="currency" id="currency_code" class="form-control" placeholder="{{trans('labels.currency')}}" value="{{$paymentdetails->currency}}">
                                    </div>
                                </div>
                                @if( strtolower($paymentdetails->payment_name) == 'flutterwave')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>{{trans('labels.encryption_key')}}</label>
                                        <input type="text" name="encryption_key" class="form-control" placeholder="{{trans('labels.encryption_key')}}" value="{{$paymentdetails->encryption_key}}">
                                    </div>
                                </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{trans('labels.test_public_key')}}</label>
                                        <input type="text" name="test_public_key" class="form-control" placeholder="{{trans('labels.test_public_key')}}" value="{{$paymentdetails->test_public_key}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{trans('labels.test_secret_key')}}</label>
                                        <input type="text" name="test_secret_key" class="form-control" placeholder="{{trans('labels.test_secret_key')}}" value="{{$paymentdetails->test_secret_key}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{trans('labels.live_public_key')}}</label>
                                        <input type="text" name="live_public_key" class="form-control" placeholder="{{trans('labels.live_public_key')}}" value="{{$paymentdetails->live_public_key}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{trans('labels.live_secret_key')}}</label>
                                        <input type="text" name="live_secret_key" class="form-control" placeholder="{{trans('labels.live_secret_key')}}" value="{{$paymentdetails->live_secret_key}}">
                                    </div>
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>{{trans('labels.image')}}</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image') <span class="text-danger"> {{ $message}} </span> <br> @enderror
                                    <img src="{{Helper::image_path($paymentdetails->image)}}" alt="" class='img-fluid rounded hw-50 mt-1'>
                                </div>
                            </div>
                            <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                            <a href="{{URL::to('admin/payment')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
                        </form>
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