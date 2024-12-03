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
                        <h1>{!! $photoAlbum->{'title_'.Lang()} !!}</h1>
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
            <div class="auto-container">
                <div class="sortable-masonry">

                    @if($photos->isEmpty())
                        <h1 class="my-h1 text-center">{!! __('index.no_data_found') !!}</h1>
                    @else

                        <div class="items-container row clearfix">
                            @foreach($photos as $photo)

                                <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                                    <figure class="image-box">
                                        <a href="{{asset('adminBoard/uploadedImages/albums_photos/'.$photo->full_path_after_upload)}}"
                                           class="lightbox-image"
                                           data-fancybox="gallery">
                                            <img
                                                src="{{asset('adminBoard/uploadedImages/albums_photos/'.$photo->full_path_after_upload)}}"
                                                alt="">
                                        </a>
                                    </figure>
                                </div>
                            @endforeach
                        </div>

                    @endif
                </div>

            </div>
        </section>
        <!-- portfolio-section end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
