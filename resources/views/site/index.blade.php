@extends('layouts.site')
@section('title')
    {!! setting()->{'site_name_' . Lang()} !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection
@push('css')
@endpush

<!--------------------------------------- Start Content section -------------------------------->
@section('content')
    <!-------------------------------------- Start Slider --------------------------------------->
    @include('site.includes.sliders')
    <!-------------------------------------- End Slider ----------------------------------------->

    <!-------------------------------------- Start About Section -------------------------------->
    @include('site.includes.about')
    <!-------------------------------------- End About Section ---------------------------------->

    <!-------------------------------------- Start offers Testimonials -------------------------->
    @include('site.includes.offers')
    <!-------------------------------------- End  offers Testimonials --------------------------->

    <!-------------------------------------- Start Counter -------------------------------------->
    @include('site.includes.counters')
    <!-------------------------------------- End Counters --------------------------------------->

    <!-------------------------------------- Start Tests Section -------------------------------->
    @include('site.includes.tests')
    <!-------------------------------------- End Tests Section ---------------------------------->

    <!-------------------------------------- Start Book Section --------------------------------->
    @include('site.includes.about_doctor_Tawial')
    <!-------------------------------------- End Book Section ----------------------------------->

    <!-------------------------------------- Start Services Section ----------------------------->
    @include('site.includes.services')
    <!-------------------------------------- End Services Section ------------------------------->

    <!-------------------------------------- Start other doctors Section ------------------------>
    @include('site.includes.other_doctors')

    <!-------------------------------------- End other doctors Section -------------------------->

    <!-------------------------------------- Start client opinions Testimonials ----------------->
    @include('site.includes.testimonials')
    <!-------------------------------------- End  client opinions Testimonials ------------------>

    <!-------------------------------------- Start News Section --------------------------------->
    @include('site.includes.latest_news')
    <!-------------------------------------- End News Section ----------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------->
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action --------------------------------->
@endsection
<!--------------------------------------- End Content section ----------------------------------->
