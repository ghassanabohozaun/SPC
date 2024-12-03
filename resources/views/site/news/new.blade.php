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
                        <h1>{{__('index.news')}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                     &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        @if( $news->isEmpty())
        <!-- team-section -->
        <section class="team-section centred">
            <h1 class="my-h1">{!! __('index.no_data_found') !!}</h1>
        </section>
        @else

        <section class="blog-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($news as $new )

                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="{!! route('new-details',slug($new->{'title_'.Lang()}) ) !!}">
                                        <img src="{{asset('adminBoard\\uploadedImages\\articles\\'. $new->photo)}}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text my-word-break">
                                        <span class="post-date">{{$new->publish_date}}</span>
                                        <h3><a  href="{!! route('new-details',slug($new->{'title_'.Lang()}) ) !!}">{{$new->{'title_'.Lang()} }}</a>
                                        </h3>
                                        <p > {!! \Illuminate\Support\Str::limit(strip_tags($new->{'abstract_'.Lang()}),$limit = 50, $end = ' ...')!!} </p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box {{Lang()=='ar'? 'pull-right': 'pull-left'}}"><a href="{!! route('new-details',slug($new->{'title_'.Lang()}) ) !!}">{!! __('index.more_details') !!}</a>
                                        </div>
                                        <div class="comment-box {{Lang()=='ar'? 'pull-left': 'pull-right'}}">
                                            <a href="#"><i class="far fa-comment"></i>{{$new->comments()->count()}} Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
             {{-- /   <div class="more-btn centred"><a href="#" class="theme-btn btn-one">Load More</a></div> --}}
                <div class="centred" >
                    {{  $news->links('vendor.pagination.my-bootstrap') }}
                </div>
            </div>
        </section>
        @endif


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
