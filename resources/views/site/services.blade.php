@extends('layouts.site')
@section('title')
    {!! $title !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection

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
        <div class="padding-between services-wrap bottom-icon-transparent">
            @if ($services->isEmpty())
                <h2 class="text-center text-capitalize text-warning">{!! trans('site.no_services') !!}</h2>
            @else
                <div class="grid-container grid-x grid-padding-x grid-padding-y my_services_section">
                    @foreach ($services as $service)
                        <!-- Start Cell /-->
                        <div class="large-4 medium-6 small-12 cell">
                            <div class="service-box">
                                @if (!empty($service->photo))
                                    <div class="service-icon">
                                        <img src="{!! asset('adminBoard/uploadedImages/services/' . $service->photo) !!}" alt="{!! $service->{'title_' . Lang()} !!}">
                                    </div>
                                @else
                                    <div class="service-icon">
                                        <img src="{!! asset('site/assets/images/backgrounds/services-3.jpg') !!}" alt="{!! $service->{'title_' . Lang()} !!}">
                                    </div>
                                @endif
                                <div class="service-text">
                                    <h4><a href="#">{!! $service->{'title_' . Lang()} !!}</a></h4>
                                    <p class="my_lead">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($service->{'summary_' . Lang()}), $limit = 100, $end = '...') !!}
                                    </p>
                                    <a href="{!! route('service', Lang() == 'ar' ? $service->title_ar_slug : $service->title_en_slug) !!}" class="button secondary">{!! trans('site.read_more') !!}
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
