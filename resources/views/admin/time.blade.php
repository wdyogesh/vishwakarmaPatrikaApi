@extends('admin.theme.default')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('labels.dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ trans('labels.working_hours') }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ URL::to('admin/time/store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="form-group col-md-2 text-center mb-0">
                                        <label><strong>{{ trans('labels.opening_time') }}</strong></label>
                                    </div>
                                    <div class="form-group col-md-2 text-center mb-0">
                                        <label><strong>{{ trans('labels.break_start') }}</strong></label>
                                    </div>
                                    <div class="form-group col-md-2 text-center mb-0">
                                        <label><strong>{{ trans('labels.break_end') }}</strong></label>
                                    </div>
                                    <div class="form-group col-md-2 text-center mb-0">
                                        <label><strong>{{ trans('labels.closing_time') }}</strong></label>
                                    </div>
                                    <div class="form-group col-md-2 text-center mb-0">
                                        <label><strong>{{ trans('labels.is_closed') }}</strong></label>
                                    </div>
                                </div>
                                @foreach ($gettime as $time)
                                    <div class="form-row">
                                        @if (strtolower($time->day) == 'monday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.monday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'tuesday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.tuesday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'wednesday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.wednesday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'thursday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.thursday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'friday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.friday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'saturday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.saturday') }}</label>
                                        @endif
                                        @if (strtolower($time->day) == 'sunday')
                                            <label class="col-sm-2 col-form-label">{{ trans('labels.sunday') }}</label>
                                        @endif
                                        <input type="hidden" name="day[]" value="{{ strtolower($time->day) }}">
                                        @if ($time->always_close == '2')
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.opening_time') }}" id="open{{ strtolower($time->day) }}" name="open_time[]" value="{{ $time->open_time }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.break_start') }}" id="break_start{{ strtolower($time->day) }}" name="break_start[]" value="{{ $time->break_start }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.break_end') }}" id="break_end{{ strtolower($time->day) }}" name="break_end[]" value="{{ $time->break_end }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.closing_time') }}" id="close{{ strtolower($time->day) }}" name="close_time[]" value="{{ $time->close_time }}">
                                            </div>
                                        @else
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.opening_time') }}" id="open{{ strtolower($time->day) }}" name="open_time[]" value="closed" readonly="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.break_start') }}" id="break_start{{ strtolower($time->day) }}" name="break_start[]" value="closed" readonly="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.break_end') }}" id="break_end{{ strtolower($time->day) }}" name="break_end[]" value="closed" readonly="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" placeholder="{{ trans('labels.closing_time') }}" id="close{{ strtolower($time->day) }}" name="close_time[]" value="closed" readonly="">
                                            </div>
                                        @endif
                                        <div class="form-group col-md-2">
                                            <select class="form-control" name="always_close[]" id="always_close{{ strtolower($time->day) }}">
                                                <option value="" selected>{{ trans('labels.select') }}</option>
                                                <option value="1" @if ($time->always_close == '1') selected @endif> {{ trans('labels.yes') }}</option>
                                                <option value="2" @if ($time->always_close == '2') selected @endif> {{ trans('labels.no') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                                <button class="btn btn-primary" @if (env('Environment')=='sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
@section('script')

<script src="{{ url('storage/app/public/admin-assets/assets/js/jonthornton.jquery.timepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".timepicker").timepicker();
    });
</script>
@endsection