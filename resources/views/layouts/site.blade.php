<!DOCTYPE html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>

<head>

    <title> {{ !empty($title) ? $title : __('index.ethar') }} </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @yield('metaTags')

    <link rel="icon" type="image/jpg" href="{!! asset(Storage::url(setting()->site_icon)) !!}">
    <link rel="shortcut icon" href="{!! asset(Storage::url(setting()->site_icon)) !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset(Storage::url(setting()->site_icon)) !!}">

    <!-- Fav Icon -->
    <link rel="icon" href="{!! asset(Storage::url(setting()->site_icon)) !!}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{!! asset('site/assets/css/font-awesome-all.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/flaticon.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/owl.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/swiper.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/bootstrap.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/jquery.fancybox.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/jquery.bootstrap-touchspin.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/color.css') !!}" rel="stylesheet">

    @if (Lang() == 'ar')
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
            integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <link href="{!! asset('site/assets/css/rtl.css') !!}" rel="stylesheet">
    @else
        <link href="{!! asset('site/assets/css/ltr.css') !!}" rel="stylesheet">
    @endif
    <link href="{!! asset('site/assets/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/responsive.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/my-responsive.css') !!}" rel="stylesheet">
    <link href="{!! asset('site/assets/css/site-style.css') !!}" rel="stylesheet">

    @stack('styles')

</head>


<!-- page wrapper -->

<body>


    @yield('content')

    <!-- jquery plugins -->
    <script src="{!! asset('site/assets/js/jquery.js') !!}"></script>
    <script src="{!! asset('site/assets/js/popper.min.js') !!}"></script>
    <script src="{!! asset('site/assets/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('site/assets/js/owl.js') !!}"></script>
    <script src="{!! asset('site/assets/js/swiper.min.js') !!}"></script>
    <script src="{!! asset('site/assets/js/wow.js') !!}"></script>
    <script src="{!! asset('site/assets/js/validation.js') !!}"></script>
    <script src="{!! asset('site/assets/js/jquery.fancybox.js') !!}"></script>
    <script src="{!! asset('site/assets/js/appear.js') !!}"></script>
    <script src="{!! asset('site/assets/js/scrollbar.js') !!}"></script>
    <script src="{!! asset('site/assets/js/isotope.js') !!}"></script>
    <script src="{!! asset('site/assets/js/nav-tool.js') !!}"></script>
    <script src="{!! asset('site/assets/js/jquery.bootstrap-touchspin.js') !!}"></script>
    <script src="{!! asset('site/assets/js/countdown.js') !!}"></script>
    <script src="{!! asset('site/assets/js/plugins.js') !!}"></script>
    <script src="{!! asset('site/assets/js/text_animation.js') !!}"></script>
    <script src="{!! asset('site/assets/js/jquery.nice-select.min.js') !!}"></script>


    <!-- main-js -->
    <script src="{!! asset('site/assets/js/script.js') !!}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{!! asset('site/assets/css/my-sweet-alert-style.css') !!}" rel="stylesheet">


    @stack('scripts')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body><!-- End of .page_wrapper -->

</html>
