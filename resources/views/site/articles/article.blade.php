@extends('layouts.site')
@section('title')
    {!! $article->{'title_' . Lang()} !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection
@section('content')
    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area articles_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $article->{'title_' . Lang()} !!}</h1>
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
                        <div class="large-12 medium-12 small-12 cell my_news_section">
                            <div class="left-post">
                                <img class="my_new_image" src="{!! asset('adminBoard/uploadedImages/articles/' . $article->photo) !!}" alt="{!! $article->{'title_' . Lang()} !!}" />
                                <div class="post-text">
                                    <div class="meta-tags">
                                        <i class="far fa-calendar-check"><span>{!! $article->publish_date !!}</span></i>
                                    </div>
                                    <h5>
                                        {!! $article->{'title_' . Lang()} !!}
                                    </h5>
                                    <div class="news-text my_lead">
                                        {!! $article->{'abstract_' . Lang()} !!}
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
                        @include('site.widget')
                    </div>
                    <!-- End Widget  -->


                    <!-- Start Widget  -->
                    <div class="widget my_latest_news_section">
                        @include('site.latest_news')
                    </div>
                    <!-- End Widget  -->

                </div>
                <!-- End Right /-->


            </div><!-- Grid Container /-->
        </div><!-- padding-between /-->
    </div>
    <!-------------------------------------- End Blog Section ------------------------------------------->


    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
