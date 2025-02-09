@extends('layouts.site')
@section('title')
    {!! Lang() == 'ar' ? setting()->site_title_ar : setting()->site_title_en !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! Lang() == 'ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords" content="{!! Lang() == 'ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en !!}" />
    <meta name="author" content="{!! Lang() == 'ar' ? setting()->site_name_ar : setting()->site_name_en !!}" />
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
    {{-- @include('site.includes.counters') --}}
    <!-------------------------------------- End Counters --------------------------------------->

    <!-------------------------------------- Start Tests Section -------------------------------->
    {{-- @include('site.includes.tests') --}}
    <!-------------------------------------- End Tests Section ---------------------------------->

    <!-------------------------------------- Start Book Section --------------------------------->
    @include('site.includes.about_doctor_Tawial')
    <!-------------------------------------- End Book Section ----------------------------------->

    <!-------------------------------------- Start Services Section ----------------------------->
    @include('site.includes.services')
    <!-------------------------------------- End Services Section ------------------------------->

    <!-------------------------------------- Start client opinions Testimonials ----------------->
    @include('site.includes.testimonials')
    <!-------------------------------------- End  client opinions Testimonials ------------------>

    <!-------------------------------------- Start Publications Section ------------------------->
    {{-- @include('site.includes.publications') --}}
    <!-------------------------------------- End Publications Section --------------------------->

    <!-------------------------------------- Start News Section --------------------------------->
    {{-- @include('site.includes.news') --}}
    <!-------------------------------------- End News Section ----------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------->
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action --------------------------------->
@endsection
<!--------------------------------------- End Content section ----------------------------------->
