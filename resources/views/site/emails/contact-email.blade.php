<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Email</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content" dir="ltr">
        <div class="title m-b-md">
            {{--$emailData['title']--}}
        </div>
        <p style="float: left;font-weight: bolder ;">
            <br/>
            <span style="color: #0a58ca;font-size: 16px;"> Full Name</span> : {{$emailData['communication_sender']}}
            <br/>
            <span style="color: #0a58ca;font-size: 16px;"> Mobile</span> : {{$emailData['communication_mobile']}}
            <br/>
            <span style="color: #0a58ca;font-size: 16px;">Message Details</span> : {{$emailData['communication_details']}}
        </p>

    </div>
</div>
</body>
</html>
