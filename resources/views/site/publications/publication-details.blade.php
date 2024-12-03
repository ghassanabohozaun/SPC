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

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}">

        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->

        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/headerPhoto.png') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        @if (Lang() == 'ar')
                            <h1>{{ __('site.details') .' ' . __('site.'.$publication->type)  }} </h1>
                        @else
                            <h1>{{ __('site.'.$publication->type) .' '. __('site.details')}} </h1>
                        @endif
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix justify-content-md-center">
                    <!-- left  -->
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="content-one">
                                <div class="upper-box">
                                    <span># {{ __('site.'.$publication->type)}} #</span>
                                    <h2>{{$publication->{'title_'.Lang()} }}</h2>
                                    <ul class="post-info clearfix">

                                        <li style="">
                                            <i class="far fa-eye"></i>
                                            {{$publication->views}}
                                        </li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img
                                        src="{!! asset('adminBoard\\uploadedImages\\publications\\'. $publication->photo) !!}"
                                        alt="">
                                    <span class="post-date">{{$publication->date}}</span>
                                </figure>
                                <div class="text">
                                    <p>{!! $publication->{'details_'.Lang()} !!}</p>
                                </div>


                                <br/> <br/>
                                <div class="lower-box clearfix">

                                    <div class="share-option pull-left">

                                        @if($publication->file != null)
                                            <a href="{!! asset('adminBoard/uploadedFiles/publications/'. $publication->file) !!}">
                                                <h5 class="my-h1">
                                                    <i class="fas fa-file-pdf"></i>
                                                    {!! __('general.download') !!}
                                                </h5>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- left end -->
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->

    </div>

@endsection
