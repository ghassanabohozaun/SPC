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
@section('content')
    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area services_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->

    <!-------------------------------------- Start wrapper  ------------------------------------->
    <div class="services-section services-page grey-bg dark-bg">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell my_service_div my_lead">
                <p> {!! $service->{'details_' . Lang()} !!}</p>
            </div>
        </div>
    </div>
    <!-------------------------------------- End wrapper  ------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
@push('js')
@endpush
