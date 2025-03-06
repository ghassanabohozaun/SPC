<!doctype html>
<html @if (Lang() == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>

<head>
    <!--title -->
    <title>{{ !empty($title) ? $title : __('site.spc') }}</title>

    <!-- meta Icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @yield('metaTags')

    <!-- Website Icon -->
    <link rel="icon" type="image/jpg" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="shortcut icon" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('adminBoard/uploadedImages/logos/' . setting()->site_icon) !!}">

    <!-- Bootstrap CSS File -->
    <link type="text/css" rel="stylesheet" href="{!! asset('site/assets/css/bootstrap.min.css') !!}">

    <!-- Theme Styles CSS File -->
    <link rel="stylesheet" type="text/css" href="{!! asset('site/style.css') !!}" media="all" />
    <link type="text/css" rel="stylesheet" href="{!! asset('site/assets/css/swiper.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('site/assets/css/my-carousel.css') !!}">

    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/style_rtl.css') !!}" media="all" />
        <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/media_rtl.css') !!}" media="all" />
        {{-- <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet" /> --}}
        <style>
            body,
            html {
                /* font-family: 'Cairo', sans-serif; */
            }
        </style>
    @else
        <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/style_ltr.css') !!}" media="all" />
        <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/media_ltr.css') !!}" media="all" />
    @endif

    @stack('css')
</head>

<body>
    <div class="main-container">
        <!-------------------------------------- Start Header ---------------------------------------->
        <div class="header header-tow">
            <!-------------------------------------- Start Top Bar ----------------------------------->
            @include('site.includes.top-header')
            <!-------------------------------------- End Top Bar ------------------------------------->
            <!-------------------------------------- Start Navbar ------------------------------------>
            @include('site.includes.navbar')
            <!-------------------------------------- End Navbar -------------------------------------->
        </div>

        <!-------------------------------------- Start content ---------------------------------------->
        @yield('content')
        <!-------------------------------------- end content ---------------------------------------->

        <!-------------------------------------- Start Footer ---------------------------------------->
        @include('site.includes.footer')
        <!-------------------------------------- End Footer ------------------------------------------>

        <!-- Main Container /-->

        <!-- Move to Top Icon Remove to Not Display /-->
        <a href="#" id="top" title="Go to Top">
            <i class="fas fa-arrow-alt-circle-up"></i>
        </a>

        <!-- Page Preloader Delete to Remove Preloader /-->
        <div class="preloader">
            <div class="spinner animated infinite fadeIn">
                <div class="preloader-img"></div>
            </div>
        </div><!-- Preloader /-->

        {{-- <div class="modal fadeIn" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Services - Language</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body  my_lead">
                        The team of SPC will be able to offer their assessment and therapeutic services in several
                        languages
                        such as English, Arabic, Italian, Urdu.
                    </div>
                </div>

            </div>
        </div> --}}

        <!-- Including Jquery so All js Can run -->
        <script src="{!! asset('site/assets/js/jquery.js') !!}"></script>

        <!-- Bootstrap JS File -->
        <script src="{!! asset('site/assets/js/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>

        <!-- Including Foundation JS so Foundation function can work. -->
        <script src="{!! asset('site/assets/js/foundation.min.js') !!}"></script>

        <!-- Carousel JS -->
        <script src="{!! asset('site/assets/js/owl.carousel.min.js') !!}"></script>

        <!-- Web full JS -->
        <script src="{!! asset('site/assets/js/template.js') !!}"></script>
        <script src="{!! asset('site/assets/js/sweetalert.min.js') !!}"></script>
        <script src="{!! asset('site/assets/js/swiper.min.js') !!}"></script>


        <!----------------------- Start Scripts ----------------------------------------->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <!----------------------- End Scripts ----------------------------------------->

        @stack('js')
</body>

</html>
