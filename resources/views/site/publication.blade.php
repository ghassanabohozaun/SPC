@extends('layouts.site')
@section('title') {!! trans('frontend.home') !!} @endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
@endsection
@section('content')

    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area publications_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->

    <!-------------------------------------- Start Blog Section ----------------------------------------->
    <div class="blog-section inner-pags blog-page module">
        <div class="padding-top-none">
            <div class="grid-container grid-x grid-padding-x my_blog_section">

                <!-- Start left /-->
                <div class="large-9 medium-9 small-12 cell">
                    <div class="grid-container grid-x grid-padding-x grid-padding-y">
                        <div class="large-12 medium-12 small-12 cell">
                            <div class="left-post">
                                <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($publication->photo)) !!}"
                                     alt="{!! Lang()=='ar'?$publication->title_ar:$publication->title_en !!}"/>
                                <div class="post-text">
                                    <div class="meta-tags">
                                        <i class="far fa-calendar-check"><span>{!! $publication->add_date !!}</span></i>
                                    </div>
                                    <h5>
                                        <a href="#">{!! Lang()=='ar'?$publication->title_ar:$publication->title_en !!}</a>
                                    </h5>
                                    <div class="news-text my_lead">
                                        {!! Lang()=='ar'?$publication->details_ar:$publication->details_en !!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- Left Post /-->
                        </div><!-- cell /-->
                    </div><!-- Grid Container -->
                </div>
                <!-- End left /-->

                <!-- Start Right /-->
                <div class="blog-sidebar sidebar medium-3 small-12 cell">

                    <!-- Start Widget  -->
                    <div class="widget">
                        <h6>{!! trans('site.publications') !!}</h6>
                        <div class="widget-content">
                            <ul class="menu vertical">
                                @foreach(\App\Models\Section::where('id', '<>', '4')->get() as $section)
                                    <li>
                                        <a href="{!! route('publications') !!}/{!! Lang()=='ar'? $section->title_ar: $section->title_en!!}">
                                            {!! Lang()=='ar'? $section->title_ar: $section->title_en!!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Widget  -->


                    <!-- Start Widget  -->
                    <div class="widget my_latest_news_section">
                        <h6>{!! trans('site.latest_news') !!}</h6>
                        <div class="widget-content ">
                            @foreach($latest_news as $latest_new)
                                <div class="popular-post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card h-100">
                                                <a href="{!! route('publication', Lang()=='ar' ? str_replace(' ','-',$latest_new->title_ar): str_replace(' ','-',$latest_new->title_en)) !!}">
                                                    <img
                                                        src="{!! asset(\Illuminate\Support\Facades\Storage::url($latest_new->photo)) !!}"
                                                        class="card-img-top"
                                                        alt="{!! Lang()=='ar'?$latest_new->title_ar:$latest_new->title_en !!}">
                                                </a>
                                                <div class="card-body">
                                                    <a href="{!! route('publication', Lang()=='ar' ? str_replace(' ','-',$latest_new->title_ar): str_replace(' ','-',$latest_new->title_en)) !!}">
                                                        <h5 class="card-title text-center">{!! Lang()=='ar'?$latest_new->title_ar:$latest_new->title_en !!}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Widget  -->

                </div>
                <!-- End Right /-->


            </div><!-- Grid Container /-->
        </div><!-- padding-between /-->
    </div>
    <!-------------------------------------- End Blog Section ------------------------------------------->


    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->


@endsection
@push('js')
@endpush
