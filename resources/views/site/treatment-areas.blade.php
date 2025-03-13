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
    <div class="bradcam_area services_bg">
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


    <!-------------------------------------- Start Services Section ------------------------------>
    <div class="services-section services-page grey-bg dark-bg">

        <div class="padding-between services-wrap bottom-icon-transparent">

            @if ($treatmentAreas->isEmpty())
                <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_treatment_areas') !!}</h2>
            @else
                <div class="grid-container grid-x grid-padding-x grid-padding-y my_treatment_areas_section">
                    @foreach ($treatmentAreas as $treatmentArea)
                        <div class="large-4 medium-6 small-12 cell">
                            <div class="service-box">
                                <div class="service-icon">
                                    <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($treatmentArea->photo)) !!}" alt="{!! Lang() == 'ar' ? $treatmentArea->title_ar : $treatmentArea->title_en !!}">
                                </div>
                                <div class="service-text">
                                    <h4>
                                        <a href="#">{!! Lang() == 'ar' ? $treatmentArea->title_ar : $treatmentArea->title_en !!}</a>
                                    </h4>
                                    <p>{!! Lang() == 'ar' ? $treatmentArea->summary_ar : $treatmentArea->summary_en !!}</p>

                                    <a href="#" data-id="{!! $treatmentArea->id !!}"
                                        class="button secondary show_treatment_area_modal">
                                        {!! trans('site.read_more') !!}
                                    </a>


                                </div>
                            </div><!-- Service Box /-->
                        </div>
                    @endforeach
                    <!-- Cell /-->
                </div><!-- Grid Container /-->
            @endif

        </div><!-- Padding Between /-->
    </div>
    <!-------------------------------------- Start Services Section ------------------------------>

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->



    <div class="modal treatment_area_modal fade " id="treatment_area_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="treatment_area_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="treatment_area_photo"></div>
                    <p class="my_lead" id="treatment_area_details">
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal /-->

@endsection
@push('js')
    <script type="text/javascript">
        $('body').on('click', '.show_treatment_area_modal', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{!! route('get.treatment.area') !!}',
                data: {
                    id,
                    id
                },
                dataType: 'json',
                type: 'GET',
                success: function(data) {
                    if ('{!! Lang() == 'ar' !!}') {
                        $('#treatment_area_title').html(data.title_ar);
                        $('#treatment_area_details').html(data.details_ar);
                        $('#treatment_area_photo').html('<img  src="{!! asset(Storage::url('')) !!}' + '/' +
                            data.photo +
                            '" class="img-fluid img-thumbnail" style="width:100%; height:300px" >');
                        $('#treatment_area_modal').modal('show');
                    } else {
                        $('#treatment_area_title').html(data.title_en);
                        $('#treatment_area_details').html(data.details_en);
                        $('#treatment_area_photo').html('<img  src="{!! asset(Storage::url('')) !!}' + '/' +
                            data.photo +
                            '" class="img-fluid img-thumbnail" style="width:100%; height:300px" >');
                        $('#treatment_area_modal').modal('show');
                    }

                }
            })
        })
    </script>
@endpush
