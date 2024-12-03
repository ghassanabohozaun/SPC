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
                        <h1>{!! __('index.reports') !!} {!! $year !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- shop-details -->
        <section class="shop-details">
            <div class="auto-container">
                <div class="discription-inner">
                    <div class="row clearfix reports-section">
                        @foreach($reports as $report)
                            <div class="col-lg-6 col-md-6 col-sm-6 single-column">
                                <a href="{{asset('adminBoard/uploadedFiles/reports/'.$report->file)}}"
                                   class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>{!! $report->type =='Administrative' ? __('index.administrative') : __('index.financial')  !!}</h3>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </section>
        <!-- shop-details end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
