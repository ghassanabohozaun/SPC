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
                        <h1>{!! __('index.our_photos_albums') !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- portfolio-section -->
        <section class="portfolio-section centred">

            @if($photosAlbums->isEmpty())
                <h1 class="my-h1 text-center">{!! __('index.no_data_found') !!}</h1>
            @else
                <div class="auto-container">
                    <div class="sortable-masonry">
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button"
                                    data-filter=".all">{!! __('index.view_all') !!}</li>
                                @foreach($photosAlbumsYears as $photosAlbumsYear)
                                    <li class="filter" data-role="button"
                                        data-filter=".{!! $photosAlbumsYear->year !!}">{!! $photosAlbumsYear->year !!}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="items-container row clearfix ">

                            @foreach($photosAlbums as $photosAlbum)

                                <div
                                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all {!! $photosAlbum->year !!}">
                                    <div class="portfolio-block-one">
                                        <div class="inner-box">
                                            <figure class="image">
                                                <a href="{{asset('adminBoard/uploadedImages/albums/'.$photosAlbum->main_photo)}}"
                                                   class="lightbox-image" data-fancybox="gallery">
                                                    <img
                                                        src="{{asset('adminBoard/uploadedImages/albums/'.$photosAlbum->main_photo)}}"
                                                        alt="{!! $photosAlbum->{'title_'.Lang()} !!}">
                                                </a>
                                            </figure>
                                            <div class="content-box">
                                                <div class="text">
                                                    <span>{!! $photosAlbum->year !!}</span>
                                                    <h3>
                                                        <a href="{!! route('photo-albums-details',slug($photosAlbum->{'title_'.Lang()}) ) !!}">
                                                            {!! $photosAlbum->{'title_'.Lang()} !!}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            @endif
        </section>
        <!-- portfolio-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->

    </div>
@endsection
