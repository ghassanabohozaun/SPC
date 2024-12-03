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
                        <h1>{{ $project->{'title_'.Lang()} }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- event-details -->
        <section class="event-details centred">
            <div class="auto-container">
                <div class="row clearfix justify-content-md-center">
                    <div class=" col-lg-8 col-md-8 col-sm-8 content-side">
                        <div class="event-details-content">
                            <div class="upper-box">
                                <h2> {!! $project->{'title_'.Lang()} !!}</h2>
                                <ul class="events-info clearfix">
                                    <li><i class="far fa-calendar"></i>{!! $project->date !!}</li>
                                    <li><i class="far fa-eye"></i> {!! $project->views !!}</li>
                                </ul>
                                <figure class="image-box">
                                    <img class=""
                                         src="{!!  asset('adminBoard/uploadedImages/projects/'. $project->photo) !!}"
                                         alt="{!! $project->{'title_'.Lang()} !!}">
                                </figure>
                            </div>
                            <div class="tabs-box">

                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="overview-inner">
                                            <div class="content-one my-content-one">
                                                <p> {!! $project->{'details_'.Lang()} !!}</p>
                                            </div>

                                            <div class="single-item my-social-style  text-left">
                                                <ul class="my-download-link  clearfix  my-2">
                                                    @if($project->file != null)
                                                    <li>
                                                        <a href="" style="font-size: 20px">
                                                            <i class="fas fa-file-pdf"></i>
                                                            {!! __('index.pdf') !!}
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @if($project->word != null)
                                                        <li>
                                                            <a href="" style="font-size: 20px">
                                                                <i class="fas fa-file-word"></i>
                                                                {!! __('index.word') !!}
                                                            </a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- event-details end -->


        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
