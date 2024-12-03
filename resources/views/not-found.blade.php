<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>404 HTML Template by Colorlib</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="{!! asset('notFound/css/font-awesome.min.css') !!}"/>

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{!! asset('notFound/css/style.css') !!}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="notfound">

    @if(LaravelLocalization::getCurrentLocale() =='ar')
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>عذراً ! لم يتم العثور علي شئ</h2>
            <p>الصفحة التي تبحث عنها ربما تم ازالتها او تغير اسمها او غير متاحة حالياً
            </p>
            <p><a href="{!! route('index') !!}">العودة الي الصفحة الرئيسية</a></p>
            <div class="notfound-social">
                <a href="{!! setting()->site_facebook !!}"><i class="fa fa-facebook"></i></a>
                <a href="{!! setting()->site_twitter !!}"><i class="fa fa-twitter"></i></a>
                <a href="{!! setting()->site_instagram !!}"><i class="fa fa-instagram"></i></a>
                <a href="{!! setting()->site_youtube !!}"><i class="fa fa-youtube"></i></a>
                <a href="https://wa.me/{!! setting()->site_mobile !!}"><i class="fa fa-whatsapp"></i></a>
                <a href="mailto:{!! setting()->site_gmail !!}"><i class="fa fa-envelope"></i></a>

            </div>
        </div>
    @else
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Oops! Nothing was found</h2>
            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.
            </p>
            <p>
                <a href="{!! route('index') !!}">Return to homepage</a>
            </p>

            <div class="notfound-social">
                <a href="{!! setting()->site_facebook !!}"><i class="fa fa-facebook"></i></a>
                <a href="{!! setting()->site_twitter !!}"><i class="fa fa-twitter"></i></a>
                <a href="{!! setting()->site_instagram !!}"><i class="fa fa-instagram"></i></a>
                <a href="{!! setting()->site_youtube !!}"><i class="fa fa-youtube"></i></a>
                <a href="https://wa.me/{!! setting()->site_mobile !!}"><i class="fa fa-whatsapp"></i></a>
                <a href="mailto:{!! setting()->site_gmail !!}"><i class="fa fa-envelope"></i></a>

            </div>
        </div>
    @endif


</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
