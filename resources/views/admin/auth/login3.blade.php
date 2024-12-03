<!DOCTYPE html>
<html lang="en">
<head>
    <title>{!! __('login.sign_in') !!}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png"
          href="{!! asset(\Illuminate\Support\Facades\Storage::url(setting()->site_logo)) !!}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/vendor/bootstrap/css/bootstrap.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('adminBoard/gbLogin/vendor/animate/animate.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/vendor/css-hamburgers/hamburgers.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/vendor/animsition/css/animsition.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('adminBoard/gbLogin/vendor/select2/select2.min.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{!! asset('adminBoard/gbLogin/vendor/daterangepicker/daterangepicker.css') !!}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('adminBoard/gbLogin/css/util.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('adminBoard/gbLogin/css/main.css') !!}">
    <!--===============================================================================================-->
</head>
<body style="" @if(LaravelLocalization::getCurrentLocale() =='ar')  dir="rtl" @endif>
<style>

    input[type=checkbox] {
        -moz-appearance: none;
        -webkit-appearance: none;
        -o-appearance: none;
        outline: none;
        content: none;
    }

    input[type=checkbox]:before {
        font-family: "FontAwesome";
        content: "\f00c";
        font-size: 15px;
        color: transparent !important;
        border: 1px solid #999999;
        margin-right: 7px;
    }

    input[type=checkbox]:checked:before {

        color: black !important;
    }
</style>
@if(LaravelLocalization::getCurrentLocale() =='ar')
    <style>
        .label-input100 {
            padding-right: 24px;
        }
    </style>

@endif

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" action="{{route('admin.login')}}" method="POST">
                @csrf
                <div style="margin-bottom: 50px">
                    <img style=" display:block;margin:auto; width: 150px"
                         src="{!! \Illuminate\Support\Facades\Storage::url(setting()->site_logo )!!}">
                </div>


                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="alert alert-danger font-weight-bold" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('error')}}
                    </div>
                @endif

                <div class="wrap-input100">
                    <input class="input100" type="text" name="email" autocomplete="off">
                    <span class="focus-input100"></span>
                    <span class="label-input100">{!! __('login.email') !!}</span>
                </div>

                @error('email')
                <span class="text-danger font-weight-bold" style="font-size: 14px ;">{{$message}}</span>
                @enderror

                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" autocomplete="off">
                    <span class="focus-input100"></span>
                    <span class="label-input100">{!! __('login.password') !!}</span>
                </div>

                @error('password')
                <span class="text-danger font-weight-bold" style="font-size: 14px ;">{{$message}}</span>
                @enderror


                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <label>
                            <input type="checkbox" name="rememberMe" id="rememberMe">
                            <span style="margin-top: 10px;color: #999999">&nbsp; {{__('login.remember_me')}}</span>
                        </label>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        {!! __('login.sign_in') !!}
                    </button>
                </div>

            </form>

            <div class="login100-more"
                 style="background-image: url({!! asset('adminBoard/gbLogin/images/3.jpg') !!} );">
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/bootstrap/js/popper.js') !!}"></script>
<script src="{!! asset('adminBoard/gbLogin/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/select2/select2.min.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/daterangepicker/moment.min.js') !!}"></script>
<script src="{!! asset('adminBoard/gbLogin/vendor/daterangepicker/daterangepicker.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/vendor/countdowntime/countdowntime.js') !!}"></script>
<!--===============================================================================================-->
<script src="{!! asset('adminBoard/gbLogin/js/main.js') !!}"></script>

</body>
</html>
