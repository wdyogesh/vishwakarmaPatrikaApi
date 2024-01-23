@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.terms_conditions')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.terms_conditions')}}</h4>
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form action="{{URL::to('admin/termscondition/update')}}" method="post">
                            @csrf
                            <textarea class="form-control" id="ckeditor" name="termscondition">{{$gettermscondition->termscondition_content}}</textarea>
                            @error('termscondition') <span class="text-danger">{{$message}}</span><br> @enderror
                            <button class="btn btn-primary my-2" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
</script>
@endsection