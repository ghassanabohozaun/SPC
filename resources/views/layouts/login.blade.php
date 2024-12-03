<!DOCTYPE html>
<!---->
<html lang="en"
      @if( LaravelLocalization::getCurrentLocale() =='ar')
      lang="ar" direction="rtl" dir="rtl" style="direction: rtl"
      @else
      lang="en"
       @endif>
<!--begin::Head-->
<head>
    <base href="#">
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="description" content="Sing in page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->

    @if( LaravelLocalization::getCurrentLocale() =='ar')

        <!--begin::Page Custom Styles(used by this page)-->
            <link href="{{asset('adminBoard/assets/css/pages/login/login-4.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Page Custom Styles-->

            <!--begin::Global Theme Styles(used by all pages)-->
            <link href="{{asset('adminBoard/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Global Theme Styles-->


            <!--begin::Layout Themes(used by all pages)-->

            <link href="{{asset('adminBoard/assets/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Layout Themes-->
            <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"/>
            <style>
                body, html {
                    font-family: 'Cairo', sans-serif;
                }
            </style>

    @else

        <!--begin::Page Custom Styles(used by this page)-->
            <link href="{{asset('adminBoard/assets/css/pages/login/login-4.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Page Custom Styles-->

            <!--begin::Global Theme Styles(used by all pages)-->
            <link href="{{asset('adminBoard/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Global Theme Styles-->

            <!--begin::Layout Themes(used by all pages)-->

            <link href="{{asset('adminBoard/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('adminBoard/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
            <!--end::Layout Themes-->

@endif

    <link rel="shortcut icon" href="{{asset(\Illuminate\Support\Facades\Storage::url(setting()->site_icon))}}"/>

</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed subheader-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<!--begin::Main-->
<div class="d-flex flex-column flex-root">

    @yield('content')


</div>
<!--end::Main-->


<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('adminBoard/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('adminBoard/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->

@stack('css')

<!--begin::Page Scripts(used by this page)-->

<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
