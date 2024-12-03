<!doctype html>
<html
    @if( LaravelLocalization::getCurrentLocale() =='ar')
    lang="ar" direction="rtl" dir="rtl" style="direction: rtl"
    @else
    lang="en"

    @endif
>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{__('general.print')}}</title>

    <!--begin::Global Theme Styles -->

@if( LaravelLocalization::getCurrentLocale() =='ar')


    <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{asset('adminBoard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}"
              rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('adminBoard/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('adminBoard/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
        <!--end::Global Theme Styles-->



        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"/>
        <style>
            body, html {
                font-family: 'Cairo', sans-serif;
            }
        </style>

@else
    <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{asset('adminBoard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('adminBoard/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('adminBoard/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <!--end::Global Theme Styles-->


    @endif
    <link href="{{asset('adminBoard/assets/css/print.css')}}" rel="stylesheet" type="text/css"/>


</head>
<body>


<header style="border-bottom: 2px solid #adaca9 ; margin-bottom: 20px; padding-bottom: 1px">

    <div class="container-fluid">

        <div class="col-lg-3" style="text-align: center">
            <img src="{!! asset(\Illuminate\Support\Facades\Storage::url(setting()->site_logo)) !!}"
                 style="width: 140px; height: 120px; border-radius: 5%">

        </div>
    </div>
</header>


@yield('content')


<footer id="printfooter">
    <div class="container-fluid" style="border-top: 2px solid #adaca9 ;
                          font-weight: bold; font-size: 15px; margin-top: 20px; padding-top: 20px">

        <p>
        <?php
        $splitAddress = explode('
', setting()->site_address_ar);

        for ($i = 0; $i < count($splitAddress); ++$i) {
            echo $splitAddress[$i] . '<br/>';
        }
        ?>



    </div>

</footer>


<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('adminBoard/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('adminBoard/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('adminBoard/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('adminBoard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>


<script type="text/javascript">
    $('document').ready(function () {

        //window.print();
        window.onafterprint = function () {
            window.close();
        }


    })
</script>
<!--end::Global Theme Bundle -->
</body>

</html>
