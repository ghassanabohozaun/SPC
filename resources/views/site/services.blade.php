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

    <!-------------------------------------- Start Services Section ------------------------------>
    <div class="services-section services-page grey-bg dark-bg">
        <div class="section-title">
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
            <p></p>
        </div><!-- Section Title /-->
        <div class="padding-between services-wrap bottom-icon-transparent">

            @if ($services->isEmpty())
                <h2 class="text-center text-capitalize text-warning">{!! trans('site.no_services') !!}</h2>
            @else
                <div class="grid-container grid-x grid-padding-x grid-padding-y my_services_section">

                    @foreach ($services as $service)
                        <!-- Start Cell /-->
                        <div class="large-4 medium-6 small-12 cell">
                            <div class="service-box">
                                <div class="service-icon">
                                    <img src="{!! asset('adminBoard/uploadedImages/services/' . $service->photo) !!}" alt="{!! Lang() == 'ar' ? $service->title_ar : $service->title_en !!}" width="100%">
                                </div>
                                <div class="service-text">
                                    <h4><a href="#">{!! Lang() == 'ar' ? $service->title_ar : $service->title_en !!}</a></h4>
                                    <p>{!! Lang() == 'ar' ? $service->summary_ar : $service->summary_en !!}</p>
                                    <a href="{!! route(
                                        'service',
                                        Lang() == 'ar' ? str_replace(' ', '-', $service->title_ar) : str_replace(' ', '-', $service->title_en),
                                    ) !!}" class="button secondary">{!! trans('site.read_more') !!}
                                    </a>
                                </div>
                            </div><!-- Service Box /-->
                        </div>
                        <!-- End Cell /-->
                    @endforeach

                </div><!-- Grid Container /-->
            @endif


        </div><!-- Padding Between /-->
    </div>
    <!-------------------------------------- Start Services Section ------------------------------>

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->

@endsection
@push('js')
@endpush
