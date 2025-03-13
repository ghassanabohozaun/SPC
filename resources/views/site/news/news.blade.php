@extends('layouts.site')
@section('title')
    {!! $title !!}
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

    <!-------------------------------------- Start Blog Section ----------------------------------------------->
    <div class="blog-section inner-pags blog-page module">
        <div class="padding-top-none">

            <div class="grid-container grid-x grid-padding-x my_blog_section">


                <!-- Start Left /-->
                <div class="large-9 medium-9 small-12 cell my_blog_div">
                    <div id="news_list">
                        @include('site.news.news-paging')
                    </div>
                </div>
                <!-- End Left /-->


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
    <!-------------------------------------- End Blog Section ----------------------------------------------->


    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
@push('js')
    <script type="text/javascript">
        /////////////////////////////////////////////////////////////////
        ///  posts Paging
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        }); // End Document On
        /////////////////////////////////////////////////////////////////
        ///  read Page
        function readPage(page) {
            $.ajax({
                url: '/news-paging/' + '?page=' + page,
                success: function(data) {
                    $('html').animate({
                        scrollTop: "420px"
                    }, 0);
                    setTimeout(function() {
                        $('#news_list').html(data);
                    }, 0);
                }
            })

        } // end readPage
    </script>
@endpush
