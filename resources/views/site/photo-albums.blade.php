@extends('layouts.site')
@section('title') {!! trans('frontend.home') !!} @endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/fancybox/jquery.fancybox.min.css') !!}">
@endpush
@section('content')

    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area photos_bg">
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
    <div class="pricing-table-wrapper module my_photo_albums_section">

        <div id="photos_list" class="photos_list">
            @include('site.photo-albums-paging')
        </div>

    </div>
    <!-------------------------------------- End wrapper  ------------------------------------->


@endsection
@push('js')

    <script src="{!! asset('site/assets/js/fancybox/jquery.fancybox.min.js') !!}"></script>

    <script type="text/javascript">
        $('.card-deck a').fancybox({
            caption: function (instance, item) {
                return $(this).parent().find('.card-text').html();
            }
        });

        /////////////////////////////////////////////////////////////////
        ///  photo albums Paging
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        });
        /////////////////////////////////////////////////////////////////
        ///  read Page
        function readPage(page) {
            $.ajax({
                url: '/photo-albums-paging/' + '?page=' + page,
                success: function (data) {

                    $('html').animate({
                        scrollTop: "540px"
                    }, 600);
                    setTimeout(function () {
                        $('#photos_list').html(data);
                    }, 1200);
                }
            })
        }// end readPage
    </script>
@endpush
