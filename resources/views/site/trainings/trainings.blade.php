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
    <div class="bradcam_area trainings_bg">
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

    <!-------------------------------------- Start Trainings  ------------------------------------->
    <div class="our-staff bottom-icon-transparent module ">
        <!-- Start trainings Container /-->
        <div id="trainings_list" class="trainings_list">
            @include('site.trainings.trainings-paging')
        </div>
        <!-- end trainings Container /-->
    </div>
    <!-------------------------------------- End  Trainings  --------------------------------------->



    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
@push('js')
    <script type="text/javascript">
        //  trainings Paging
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        }); // End Document On

        // read Page
        function readPage(page) {
            $.ajax({
                url: '/training-paging/' + '?page=' + page,
                success: function(data) {
                    $('html').animate({
                        scrollTop: "500px"
                    }, 0);
                    setTimeout(function() {
                        $('#trainings_list').html(data);
                    }, 0);
                }
            })

        } // end readPage
    </script>
@endpush
