@extends('layouts.site')
@section('title')
    {!! $service->{'title_' . Lang()} !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
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
                        <h1>{!! $service->{'title_' . Lang()} !!}</h1>
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
