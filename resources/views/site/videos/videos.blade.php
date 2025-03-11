@extends('layouts.site')
@section('title')
    {!! setting()->{'site_title_' . Lang()} !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/fancybox/jquery.fancybox.min.css') !!}">
@endpush
@section('content')
    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area videos_bg">
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

    <!-------------------------------------- Start wrapper  ------------------------------------->
    <div class="pricing-table-wrapper module">
        <div id="videos_list" class="videos_list">
            @include('site.videos.videos-paging')
        </div>
    </div>

    <!-------------------------------------- End wrapper  ------------------------------------->
@endsection
@push('js')
    <script src="{!! asset('site/assets/js/fancybox/jquery.fancybox.min.js') !!}"></script>

    <script type="text/javascript">
        $('.card-deck a').fancybox({
            caption: function(instance, item) {
                return $(this).parent().find('.card-text').html();
            }
        });

        //  videos Paging
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        }); // End Document On


        //  read Page
        function readPage(page) {
            $.ajax({
                url: '/videos-paging/' + '?page=' + page,
                success: function(data) {

                    $('html').animate({
                        scrollTop: "540px"
                    }, 0);
                    setTimeout(function() {
                        $('#videos_list').html(data);
                    }, 0);
                }
            })

        } // end readPage
    </script>
@endpush
