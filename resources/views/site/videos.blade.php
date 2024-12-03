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
                        <h1>{!! __('index.our_videos') !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- events-page-section -->
        <section class="events-page-section">
            <div class="auto-container">

                @if($videos->isEmpty())
                    <h1 class="my-h1 text-center">{!! __('index.no_data_found') !!}</h1>
                @else
                    <div class="row clearfix">
                        @foreach($videos as $video)
                            <div class="col-lg-3 col-md-6 col-sm-12 events-block">
                                <div class="events-block-two">
                                    <div class="inner-box">
                                        <div class="post-date">
                                            <h3>{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->day !!}
                                                <span>
                                                    {!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->month !!}/{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->year !!}
                                                </span>
                                            </h3>
                                        </div>


                                        <figure class="image-box">
                                            @if($video->photo == null)
                                                <img src="http://img.youtube.com/vi/{{$video->link}}/0.jpg"
                                                     class="my-video-photo"
                                                     alt="{!! $video->{'title_'.Lang()} !!}"/>
                                            @else
                                                <img src="{{asset('adminBoard/uploadedImages/videos/'.$video->photo)}}"
                                                     alt="{!! $video->{'title_'.Lang()} !!}">
                                            @endif
                                        </figure>

                                        <div class="content-box">

                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>
                                                    {!! $video->duration !!}
                                                </li>
                                            </ul>

                                            <h3><a href="#">{!! $video->{'title_'.Lang()} !!}</a></h3>

                                            <div class="links">
                                                <a href="https://www.youtube.com/watch?v={!! $video->link !!}"
                                                   class="lightbox-image" data-caption="">
                                                    @if(Lang() === 'ar')
                                                        <i class="fas fa-caret-left my-fa-caret"></i>
                                                    @else
                                                        <i class="fas fa-caret-right my-fa-caret"></i>
                                                    @endif
                                                    {!! __('index.play_video') !!}
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--                <div class="more-btn centred"><a href="#" class="theme-btn btn-one">Load More</a></div>--}}
                @endif

                <div class="pagination-wrapper centred">
                    {{ $videos->links('vendor.pagination.my-bootstrap') }}
                </div>

            </div>
        </section>
        <!-- events-page-section -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
