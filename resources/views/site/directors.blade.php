@extends('layouts.site')
@section('title')
    {!! Lang()=='ar' ? setting()->site_title_ar : setting()->site_title_en !!}
@endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
    <meta name="author" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
@endsection

@push('css')
@endpush
@section('content')

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-23.png') !!});">

        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->


        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/headerPhoto.png') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>{!! __('index.directors') !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        @if($directors->isEmpty())
            <!-- team-section -->
            <section class="team-section centred">
                <h1  class="my-h1">{!! __('index.no_data_found') !!}</h1>
            </section>
        @else
            <!-- team-section -->
            <section class="team-section centred">
                <div class="pattern-layer"
                     style="background-image: url({!! asset('site/assets/images/shape/shape-23.png') !!});"></div>
                <div class="fluid-container">
                    <div class="sec-title centred">
                        <span class="top-text">{!! __('index.meet_our_directors') !!}</span>
                    </div>
                    <div class="five-item-carousel owl-carousel owl-theme owl-nav-none">
                        @foreach($directors as $director)
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('adminBoard/uploadedImages/teams/'.$director->photo)}}"
                                             alt="{!! $director->{'name_'.Lang()} !!}">
                                    </figure>
                                    <div class="content-box">
                                        <div class="info">
                                            <span class="designation">{!! __('index.founder') !!}</span>
                                            <h3>{!! $director->{'name_'.Lang()} !!}</h3>
                                        </div>
                                        <figure class="thumb-box">
                                            <img src="{{asset('adminBoard/uploadedImages/teams/'.$director->photo)}}"
                                                 alt="{!! $director->{'name_'.Lang()} !!}">
                                        </figure>
                                        <div class="text">
                                            <p>{!! $director->{'description_'.Lang()} !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- team-section end -->
        @endif

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
