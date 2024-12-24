<!doctype html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif
    xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{!! Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en !!}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no,
             initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <link rel="icon" type="image/jpg" href="{!! asset(\Illuminate\Support\Facades\Storage::url(setting()->site_icon)) !!}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <meta name="application-name" content="" />
    <meta name="author" content="" />
    <link href="{!! asset('adminBoard/login/css/select2.min.css') !!}" rel="stylesheet">

    @if (Lang() == 'ar')
        <link href="{!! asset('adminBoard/login/css/style-ar.css') !!}" rel="stylesheet">
    @else
        <link href="{!! asset('adminBoard/login/css/style-en.css') !!}" rel="stylesheet">
    @endif
    <style>
        .left-background-login {
            background-image: url({!! asset('adminBoard/login/images/adminLogin2.jpg') !!});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>

<body>

    <section class="c-panel">
        <div>
            <div class="row mx-0 align-items-center">
                <div class="col-lg-6 px-0 left-background-login d-none d-lg-block">
                    <div class="img-left-login ">
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="title-block-login text-bold text-warning fs-24 text-center">
                                    @if (!empty(setting()->site_logo))
                                        <div class="mt-4">
                                            <img src="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_logo) !!}" style="width: 200px">
                                        </div>
                                    @else
                                        <div class="mt-4">
                                            <img src="{!! asset('adminBoard/login/images/logo.svg') !!}" style="width: 200px">
                                        </div>
                                    @endif

                                </div>



                                <form action="{{ route('admin.login') }}" method="POST"
                                    style=" display: table;margin: auto " class="col-lg-8">
                                    @csrf

                                    <div class="mt-4">
                                        @if (\Illuminate\Support\Facades\Session::has('error'))
                                            <div class="alert alert-danger font-weight-bold" role="alert">
                                                {{ \Illuminate\Support\Facades\Session::get('error') }}
                                            </div>
                                        @endif
                                    </div>



                                    <div class="form-group  mt-4">
                                        <label for="email">
                                            {!! __('login.email') !!}
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            autocomplete="off" placeholder="{!! __('login.enter_email') !!}">
                                        @error('email')
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="password">
                                            {!! __('login.password') !!}
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            autocomplete="off" placeholder="{!! __('login.enter_password') !!}">

                                        @error('password')
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="contact100-form-checkbox">
                                            <label>
                                                <input type="checkbox" name="rememberMe" id="rememberMe">
                                                <span style="margin-top: 10px;color: #999999">&nbsp;
                                                    {{ __('login.remember_me') }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark px-5 br-20">
                                            {!! __('login.login') !!}
                                        </button>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{!! asset('adminBoard/login/js/jquery.min.js') !!}"></script>

    <script src="{!! asset('adminBoard/login/js/uikit.min.js') !!}"></script>
    <script src="{!! asset('adminBoard/login/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('adminBoard/login/js/aos.js') !!}"></script>
</body>

</html>
