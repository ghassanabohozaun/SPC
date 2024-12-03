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
                        <h1>{{$project->{'title_'.Lang()} .' '. __('site.CaseStudy')}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->



        <section class="blog-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($publications as $publication)

                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">

                             <div class="inner-box">
                                <figure class="image-box">
                                    <a href="{{route('advertisement-details',slug($publication->{'title_'.Lang()}) )}}">
                                        <img src="{!! asset('adminBoard\\uploadedImages\\publications\\'. $publication->photo) !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text  my-word-break">
                                        <span class="post-date">{{$publication->date}}</span>

                                        <h3><a href="{{route('advertisement-details',slug($publication->{'title_'.Lang()}) )}}">{{$publication->{'title_'.Lang()} }}</a>
                                        </h3>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit(strip_tags($publication->{'details_'.Lang()} ),$limit = 50, $end = ' ...')!!}
                                        </p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details',slug($publication->{'title_'.Lang()}) ) !!}">{!! __('index.more_details') !!}</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach



                </div>
                <div class="more-btn centred"><a href="#" class="theme-btn btn-one">Load More</a></div>
            </div>
        </section>


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
