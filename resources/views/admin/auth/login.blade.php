<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ @Helper::appdata()->title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{Helper::image_path(@Helper::appdata()->favicon)}}"><!-- Favicon icon -->
    <link href="{{ url('/storage/app/public/admin-assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/storage/app/public/admin-assets/assets/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
</head>
<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"><center><img src="{{Helper::image_path(@Helper::appdata()->logo)}}" height="100" width="100" alt=""></center></a>
                                <form method="POST" class="mt-5 mb-5 login-input" action="{{ URL::to('admin/check-login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required="" autocomplete="email" autofocus placeholder="{{trans('labels.email')}}" @if (env('Environment') == 'sendbox') value="admin@gmail.com" readonly="" @endif>
                                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{trans('labels.password')}}" @if (env('Environment') == 'sendbox') value="123456" readonly="" @endif>
                                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">{{ trans('labels.signin') }}</button>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{URL::to('admin/forgot-password')}}">{{trans('labels.forgot_password_q')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/storage/app/public/admin-assets/assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/js/custom.min.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/js/settings.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/js/gleek.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/js/styleSwitcher.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ url('/storage/app/public/admin-assets/assets/plugins/toastr/js/toastr.init.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.options = {
                "closeButton" : true,
                "progressBar" : true
            },
            toastr.success("{{ session('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.options ={
                "closeButton" : true,
                "progressBar" : true,
                "timeOut" : 10000
            },
            toastr.error("{{ session('error') }}");
        @endif
     </script>
</body>
</html>
