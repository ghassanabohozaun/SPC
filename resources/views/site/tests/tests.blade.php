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
    <div class="bradcam_area tests_bg">
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

    <!-------------------------------------- Start Tests  ------------------------------------->
    <div class="testimonials testimonial-page module">


        <div class="tests_list" id="tests_list">
            @include('site.tests.tests-paging')
        </div>


    </div>
    <!-------------------------------------- End Tests  --------------------------------------->


    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->

@endsection
@push('js')
    <script type="text/javascript">

        /////////////////////////////////////////////////////////////////
        ///  posts Paging
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        }); // End Document On
        /////////////////////////////////////////////////////////////////
        ///  read Page
        function readPage(page) {
            $.ajax({
                url: '/tests-paging/' + '?page=' + page,
                success:function (data){

                    $('html').animate({
                        scrollTop: "520px"
                    }, 600);
                    setTimeout(function (){
                        $('#tests_list').html(data);
                    },1200);
                }
            })

        }// end readPage
    </script>
@endpush
